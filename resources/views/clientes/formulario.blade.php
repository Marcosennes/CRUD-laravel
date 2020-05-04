@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a  href = "{{url('clientes/novo')}}">Novo Cliente</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead style="background: darkgray; ">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Número</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                            <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->endereco }}</td>
                            <td>{{ $cliente->numero }}</td>
                            <td>
                                <a class="btn btn-default btn-outline-info" style="height: 35px; " href="/clientes/{{ $cliente->id }}/editar">Editar</a>
                                {!!Form::open(['method' => 'DELETE', 'url' => '/clientes/'.$cliente->id.'/deletar', 'style' => 'display:inline;']) !!}
                                <button type="submit" class="btn btn-outline-danger" style="height: 35px;">Excluir</button>
                                {!! Form::close() !!}
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
