@extends('administrativa.administrativa')

@section('tabela')

<h1>Dados dos Equipamento</h1>
<p>Id: {{$equipamento->id}}</p>
<p>Nome: {{$equipamento->nome}}</p>


    <a class="btn btn-primary" href="{{route('equipamentos.edit', $equipamento->id)}}">Editar</a>

    <a class="btn btn-warning" href="{{route('equipamentos.index')}}">Voltar</a>

    <form name="frmDelete" action="{{route('equipamentos.destroy', $equipamento->id)}}" method="post">
        @csrf
        @method('DELETE')

        <input type="submit" class="btn btn-danger" value="Excluir">
    </form>

@endsection