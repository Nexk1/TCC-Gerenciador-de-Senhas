<?php

namespace App\Http\Controllers;

use App\Models\SenhaUser;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function store(Request $request){
        $email = $request->input('email');
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        $confirm_senha = $request->input('confirm-senha');

        $page_id = Str::uuid()->toString();

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $verified = password_verify($senha, $senha_hash);


        // Verifique se a senha e a confirmação de senha são idênticas
        if ($senha == $confirm_senha && $verified) {
            // Crie um novo usuário com o email, nome de usuário e senha criptografada
            $novoUsuario = new User();
            $novoUsuario->email = $email;
            $novoUsuario->name = $usuario;
            $novoUsuario->password = $senha_hash;
            $novoUsuario->page_id = $page_id;
            $novoUsuario->save();
    
            // Redirecione para a página de login
            return redirect()->route("tela-login");
        } else {
            // Senha e confirmação de senha não correspondem, redirecione de volta para o formulário de criação
            return redirect()->route("cadastro-create");
        }
    }
    
    public function login_process(Request $request) {
        $email = $request->input('email');
        $senha = $request->input('senha');
    
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->route("tela-login");
        }
    
        $senha_hash = $user->password;
        $verified = password_verify($senha, $senha_hash);
    
        if ($verified) {
            // Redirect to the login route with the user's ID as an argument
            return redirect()->route("login", ['page_id' => $user->page_id]);
        } else {
            return redirect()->route("tela-login");
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

};
