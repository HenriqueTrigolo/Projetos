@extends('administrativa.administrativa')

@section('tabela')
<form action="{{route('equipamentos.store')}}" method="post">

    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <div class="form-group">
        <a class="btn btn-warning" href="{{route('equipamentos.index')}}">Voltar</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-danger">
    </div>
</form>

@endsection