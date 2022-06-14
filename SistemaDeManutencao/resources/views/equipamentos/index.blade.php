@extends('administrativa.administrativa')

@section('tabela')

<table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Exibir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $e)
            <tr>
                <th>{{$e->id}}</th>
                <th>{{$e->nome}}</th>
                <th><a class="btn btn-info" href="{{route('equipamentos.show', $e->id)}}">Exibir</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-success" href="{{route('equipamentos.create')}}">Cadastrar</a>
    </div>
    
@endsection