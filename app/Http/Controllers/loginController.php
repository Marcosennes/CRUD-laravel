<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index(){

        return view('login_register.index');
    }

    public function salvar(Request $request){
        
        $usuario = new Usuario();
        $usuario = $usuario->create($request->all());
        /*  $usuario = Usuario::findOrFail($email);
        
        $usuario = Usuario::where('email', '==', $email)
        ->firstOr(['email'], function () {
            echo "email já registrado no sistema";
        });
        */        
        
        /*
        $usuario_register = new Usuario();
        $usuario_register->username = $request->nome_cadastro;
        $usuario_register->email = $request->email_cadastro;
        $usuario_register->password = $request->password_cadastro;        
        $usuario_register->save();
        */
        
        
        /*
        $usuario_register->username = $request->input('nome_cadastro');
        $usuario_register->email = $request->input('email_cadastro');
        $usuario_register->password = $request->input('password_cadastro');
        $usuario_register->save();
        */


            $retorno = 1;
            echo json_encode($retorno);
            
        //return view('login_register.request', ['request' => $request]);
        return Redirect::to('clientes/novo');
    }
}
