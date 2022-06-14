@extends('layouts.main')

@section('titulo', 'Suporte')

@section('conteudo')

<h1>Suporte</h1>

    <a class="btn btn-primary" href="{{route('suporteListaEquipamentos')}}">Lista de Equipamentos</a>
    <a class="btn btn-primary" href="{{route('suporteManutencaoEquipamentos')}}">Lista de EquipamentosManutenções</a>
    
    @yield('tabela')


@endsection