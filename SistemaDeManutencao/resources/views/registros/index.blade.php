@extends('administrativa.administrativa')

@section('tabela')

<table class="table table-striped">
        <thead>
            <tr>
                <th>Data limite</th>
                <th>Nome do equipamento</th>
                <th>Nome do usuário</th>
                <th>Tipo da manutenção</th>
                <th>Descrição da manutenção/problema</th>
                <th>Exibir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $r)
            <tr>
                <th>{{$r->datalimite}}</th>
                <th>{{$r->equipamento->nome}}</th>
                <th>{{$r->user->name}}</th>
                <th>{{$r->tipo}}</th>
                <th>{{$r->descricao}}</th>
                <th><a class="btn btn-info" href="{{route('registros.show', $r->id)}}">Exibir</a></th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-success" href="{{route('registros.create')}}">Cadastrar</a>
    </div>
@endsection