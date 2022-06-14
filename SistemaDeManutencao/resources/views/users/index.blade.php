@extends('administrativa.administrativa')

@section('tabela')

<table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <th>{{$u->name}}</th>
                <th>{{$u->email}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection