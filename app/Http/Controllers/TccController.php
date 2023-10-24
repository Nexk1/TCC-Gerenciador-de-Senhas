<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;

class TccController extends Controller{
    public function index(){
        $users = Usuario::all();
        return view('gerenciador.index', ['user' => $users]);
    }

    public function create(){
        return view('gerenciador.create');
    }

    public function store(Request $request){
        $email = $request->input('email');
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        $confirm_senha = $request->input('confirm-senha');

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $verified = password_verify($senha, $senha_hash);


        // Verifique se a senha e a confirmação de senha são idênticas
        if ($senha === $confirm_senha && $verified) {
            // Crie um novo usuário com o email, nome de usuário e senha criptografada
            $novoUsuario = new User();
            $novoUsuario->email = $email;
            $novoUsuario->name = $usuario;
            $novoUsuario->password = $senha_hash;
            $novoUsuario->save();
    
            // Redirecione para a página de login
            return redirect()->route("tela-login");
        } else {
            // Senha e confirmação de senha não correspondem, redirecione de volta para o formulário de criação
            return redirect()->route("cadastro-create");
        }
    }

};
