<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;
//use App\Http\ActionDispatch::Flash;

class ClientesController extends Controller{

    public function index(){

        $clientes = Cliente::get();
        return view('clientes.formulario', ['clientes' => $clientes]);
    }

    public function novo(){
    
        return view ('clientes.novo_cliente');
    }
    
    public function salvar(Request $request){
        
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());
        
        $request->session()->flash('mensagem_sucesso', 'Cliente foi cadastrado com sucesso!');
        
        return Redirect::to('clientes/novo');
    }

    public function editar($id){
                    
    $cliente = Cliente::findOrFail($id);
                    
    return view ('clientes.novo_cliente', ['cliente' => $cliente]);
    }

    public function atualizar($id, Request $request){

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('main');

    }

    public function deletar($id){

        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('main');

    }
}
