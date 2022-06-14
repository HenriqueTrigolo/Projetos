@extends('administrativa.administrativa')

@section('tabela')

<h1>Dados da Manutenção</h1>
<p>Data limite : {{$registro->datalimite}}</p>
<p>Nome do equipamento : {{$registro->equipamento->nome}}</p>
<p>Nome do usuário : {{$registro->user->name}}</p>
<p>Tipo da manutenção : {{$registro->tipo}}</p>
<p>Descrição da manutenção/problema : {{$registro->descricao}}</p>


<a class="btn btn-primary" href="{{route('registros.edit', $registro->id)}}">Editar</a>

<a class="btn btn-warning" href="{{route('registros.index')}}">Voltar</a>

<form name="frmDelete" action="{{route('registros.destroy', $registro->id)}}" method="post">
    @csrf
    @method('DELETE')

    <input class="btn btn-danger" type="submit" value="Excluir">
</form>

@endsection