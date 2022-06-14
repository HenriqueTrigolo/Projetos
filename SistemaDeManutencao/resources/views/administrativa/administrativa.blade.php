@extends('layouts.main')

@section('titulo', 'Administrativa')

@section('conteudo')

<h1>Área administrativa</h1>

    <a class="btn btn-primary" href="{{route('equipamentos.index')}}">Equipamentos</a>
    <a class="btn btn-primary" href="{{route('registros.index')}}">Manutenções</a>
    <a class="btn btn-primary" href="{{route('users.index')}}">Relatório Usuários</a>
    <a class="btn btn-primary" href="{{route('administrativaManutencao')}}">relatório Manutenções</a>

    @yield('tabela')



@endsection

