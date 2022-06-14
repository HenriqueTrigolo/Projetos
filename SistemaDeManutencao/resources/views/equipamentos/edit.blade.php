@extends('administrativa.administrativa')

@section('tabela')

<form action="{{route('equipamentos.update', $equipamento->id)}}" method="post">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="{{$equipamento->nome}}">
    </div>
    <div class="form-group">
        <a class="btn btn-warning" href="{{route('equipamentos.index')}}">Voltar</a>
        <input type="submit" value="Atualizar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-danger">
    </div>
</form>

@endsection