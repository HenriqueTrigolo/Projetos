@extends('suporte.suporte')

@section('tabela')

<table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipamentos as $e)
            <tr>
                <th>{{$e->id}}</th>
                <th>{{$e->nome}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection