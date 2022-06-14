@extends('administrativa.administrativa')

@section('tabela')

<table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do equipamento</th>
                <th>Tipo da manutenção</th>
                <th>Descrição da manutenção/problema</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $r)
            <tr>
                <th>{{$r->equipamento->nome}}</th>
                <th>{{$r->tipo}}</th>
                <th>{{$r->descricao}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>    
@endsection