<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contacts extends Controller
{
    public function index(){
        return view('contacts', [
            'texto' => 'Lista de Usuários',
            'usuarios' => ['usuario1', 'usuario2', 'usuario3','usuario4'],
            ]);
    }
}
