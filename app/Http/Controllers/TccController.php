<?php

namespace App\Http\Controllers;

use App\Models\SenhaUser;
use App\Models\User;
use App\Models\notasuser;
use App\Mail\verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class TccController extends Controller{
    public function index(){
        $fundo = "fundo";
        return view('gerenciador.index', ["fundo" => $fundo]);
    }

    public function create(){
        $fundo = "fundo";
        return view('gerenciador.create', ["fundo" => $fundo]);
    }

    public function esqueceu_senha(){
        $fundo = "fundo";
        return view('gerenciador.esqueceu', ["fundo" => $fundo]);
    }

    public function recuperar_senha(Request $request){

        $email = $request -> input('esq-email');

        $valor_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        echo "Código {$valor_aleatorio}";


        return view("gerenciador.rec-senha", ["fundo" => "fundo", "valor_aleatorio" => $valor_aleatorio, "email" => $email]);
    }

    public function recuperar_senha_store(Request $request, $valor_aleatorio, $email){
        $codigo = $request->input('rec-senha');


        if ($valor_aleatorio == $codigo) {
            return view('gerenciador.nova_senha', ["email" => $email, "valor_aleatorio" => $valor_aleatorio, "fundo" => "fundo"]);
        } else {
            return redirect()->route('tela-login')->with('error', 'Código de recuperação inválido.');
        }

    }

    public function new_pass_store(Request $request, $valor_aleatorio, $email){
        $senha = $request->input("Att-senha");
        $confirm_senha = $request->input("Att-senha-confirm");
    
        $user = User::where('email', $email)->first();
        
    
        // Verifique se o usuário existe
        if (!$user) {
            return redirect()->route("cadastro-create")->with('error', 'Usuário não encontrado.');
        }
    
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $verified = password_verify($senha, $senha_hash);
    
        // Verifique se a senha e a confirmação de senha são idênticas
        if ($senha == $confirm_senha && $verified) {
            // Atualize a senha no modelo existente
            $user->password = $senha_hash;
            $user->save();
    
            return redirect()->route("tela-login")->with('success', 'Senha atualizada com sucesso.');
        } else {
            return redirect()->route("cadastro-store")->with('error', 'Senhas não correspondem.');
        }
    }

    public function store(Request $request){
        $email = $request->input('email');
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        $confirm_senha = $request->input('confirm-senha');

        $fundo = "fundo";

        $page_id = Str::uuid()->toString();

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $verified = password_verify($senha, $senha_hash);


        // Verifique se a senha e a confirmação de senha são idênticas
        if ($senha == $confirm_senha && $verified) {
            // Crie um novo usuário com o email, nome de usuário e senha criptografada
            $existingEmail = User::where('email', $email)->first();

            if ($existingEmail) {
                echo "<script>";
                echo "alert('Este email já existe')";
                echo "</script>";

                return view("gerenciador.create",["fundo" => $fundo]);
            } 
            else {
                $novoUsuario = new User();
                $novoUsuario->email = $email;
                $novoUsuario->name = $usuario;
                $novoUsuario->password = $senha_hash;
                $novoUsuario->page_id = $page_id;
                $novoUsuario->save();

                return redirect()->route("tela-login");
            } 
        }
        else {
            // Senha e confirmação de senha não correspondem, redirecione de volta para o formulário de criação
            return redirect()->route("cadastro-create");
        }}
    
    public function login_process(Request $request) {
        $email = $request->input('email');
        $senha = $request->input('senha');
    
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            echo "<script>";
            echo "alert('Senha ou usuário invalido!')";
            echo "</script>";
            return redirect()->route("tela-login",["fundo" => "fundo"]);
        }
    
        $senha_hash = $user->password;
        $verified = password_verify($senha, $senha_hash);
    
        if ($verified) {
            // Redirect to the login route with the user's ID as an argument
            return redirect()->route("login", ['page_id' => $user->page_id]);
        } else {
            echo "<script>";
            echo "alert('Senha ou usuário invalido!')";
            echo "</script>";
            return view("gerenciador.index",["fundo" => "fundo"]);
        }
    }

    public function login(Request $request, $page_id){
        $pesquisa = $request -> input('pesquisar');
        $fundo = "inicio";
        $user = User::where('page_id', $page_id)->first();
    
        if (!$user) {
            return redirect()->route("tela-login");
        }
        
        if($pesquisa == ""){
            $username = $user->name;

            $senhas = SenhaUser::where('page_id', $page_id)->get();

            return view("gerenciador.logado", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id, "senhas" => $senhas]);
        }else{

            $username = $user->name;

            $senhas = SenhaUser::where('page_id', $page_id)->where('local',$pesquisa)
            ->get();

            return view("gerenciador.logado", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id, "senhas" => $senhas]);;
        }

    }


    public function add_sen($page_id){
        $user = User::where('page_id', $page_id)->first();

        $username = $user -> name;
     

        $fundo = "mudar_pass";

        return view("gerenciador.addpassuser", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $page_id]);
    }

    public function add_sen_store(Request $request, $page_id){
        $user = User::where('page_id', $page_id)->first();
    
        $fundo = "inicio";
        $username = $user -> name;

        $local = $request->input('local');
        $senha_user = $request->input('senha');
        $action = $request->input('action');
        
        
    
    if($action == "Senha Gerada"){


        $senha = Str::random(12);

        $existingSenha = SenhaUser::where('page_id', $page_id)
        ->where('local', $local)
        ->first();

        if ($existingSenha) {
            $existingSenha->senha = $senha;
            $existingSenha->save();

        } else {
            $novasenha = new SenhaUser();
            $novasenha->local = $local;
            $novasenha->senha = $senha;
            $novasenha->page_id = $page_id;
            $novasenha->save();
        }

        $senhas = SenhaUser::where('page_id', $page_id)->get();
        return redirect()->route("login", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id, "senhas" => $senhas]);

    }
    elseif($action == "Cadastro"){

        if($senha_user == ""){
            echo '<script>';
            echo 'alert("Coloque a senha que deseja antes");';
            echo '</script>';
            $fundo = "mudar_pass";
            return view("gerenciador.addpassuser", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id,]);
        }
        else{
            $existingSenha = SenhaUser::where('page_id', $page_id)
            ->where('local', $local)
            ->first();

            if ($existingSenha) {
                $existingSenha->senha = $senha_user;
                $existingSenha->save();

                $senhas = SenhaUser::where('page_id', $page_id)->get();

                return redirect()->route("login", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id, "senhas" => $senhas]);
            } else {
                $novasenha = new SenhaUser();
                $novasenha->local = $local;
                $novasenha->senha = $senha_user;
                $novasenha->page_id = $page_id;
                $novasenha->save();

                $senhas = SenhaUser::where('page_id', $page_id)->get();

                return redirect()->route("login", ["user" => $user, "username" => $username, "fundo" => $fundo, "page_id" => $user -> page_id, "senhas" => $senhas]);
            }
        }
    }
    }

    public function notas_seguras($page_id){
        $fundo = "inicio";
        $notas = notasuser::where('page_id', $page_id)->get();

        return view('gerenciador.notas-seguras',["page_id" => $page_id, "fundo" => $fundo, "notas" => $notas]);

        
    }

    public function add_notas(Request $request, $page_id){
        $user = User::where('page_id', $page_id)->first();
        $fundo = "inicio";

        $username = $user -> name;

        $titulo = $request->input('titulo');
        $texto = $request->input('texto');

        $existingnota = notasuser::where('page_id', $page_id)
        ->where('titulo', $titulo)
        ->first();

        if ($existingnota) {
            $existingnota->texto = $texto;
            $existingnota->save();

        } else {
            $novanota = new notasuser();
            $novanota->titulo = $titulo;
            $novanota->texto = $texto;
            $novanota->page_id = $page_id;
            $novanota->save();

        }

        $notas = notasuser::where('page_id', $page_id)->get();

        return view('gerenciador.notas-seguras',["page_id" => $page_id, "fundo" => $fundo, "notas" => $notas]);
    }


};
