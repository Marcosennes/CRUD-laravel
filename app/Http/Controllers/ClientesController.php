<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\storeClienteRequest;
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
    
    public function salvar(storeClienteRequest $request){
        
        //Forma que dá certo mas envia todos os campos do request de uma vez
        /*
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());
        */

        // ---------------------------------------------------------------------------------------------
        //Forma para enviar campo a campo para o banco e validar dados separadamente
       
        /*
        * Validação dos dados da forma menos recomendada. O recomendado é utilizar o comando
        * php artisan make:request nomeDoArquivoDaValidaçãoDoRequest
        * muda o return do authorize pra true e dita as regras no rules
        * o arquivo fica armazenado em app/Http/Requests
        * Para as regras valerem, no parametro da função a variável request que veio no html deve ser da classe que foi criada
        * Nesse caso fica assim: storeClienteRequest $request. Por fim é só importar a classe
        */

        /*
        $request->validate([
            'foto' => 'nullable|image',
        ]);
        */

        $data=[
            'nome'      => $request->nome,
            'email'      => $request->email,
            'endereco'  => $request->endereco,
            'numero'    => $request->numero,
        ];
        
        Cliente::create($data);
        $cliente = Cliente::where('email','=',$request->email)->firstOrFail();
        
        if( ($cliente != null) &&  ($request->file('foto') != null) ){
            
            if( $request->file('foto')->isValid() ){
                
                $nameFile = $cliente['id'] .  '_profile_picture.' . $request->file('foto')->extension();
                $request->file('foto')->storeAs('profile_photos', $nameFile);
                $cliente['profilePicture'] = $nameFile;
                $cliente->update();
            }
        }
        // ---------------------------------------------------------------------------------------------
        // Forma que talvez desse certo
        /*
        $cliente->nome      = $request->nome;
        $cliente->endereco  = $request->endereco;
        $cliente->numero    = $request->numero;
        $cliente = $cliente->create($request->all());
        */

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
