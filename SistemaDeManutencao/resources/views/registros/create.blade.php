@extends('administrativa.administrativa')

@section('tabela')
<form action="{{route('registros.store')}}" method="post">

    @csrf
    <div class="form-group">
        <label for="datalimite">Data limite</label>
        <input type="date" id="datalimite" name="datalimite">
    </div>
    <div class="form-group">
        <label for="equipamento_id">Nome do equipamento</label>
        <select name="equipamento_id" class="form-control" id="equipamento_id">
            @foreach($equipamentosTotais as $e)
                <option value="{{$e->id}}">{{$e->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="user_id">Nome do usuário</label>
        <select name="user_id" class="form-control" id="user_id">
            @foreach($usersTotais as $u)
                <option value="{{$u->id}}">{{$u->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tipo">Tipo da manutenção</label>
        <select name="tipo" class="form-control" id="tipo">
            <option value="1">1 - Preventiva</option>
            <option value="2">2 - Corretiva</option>
            <option value="3">3 - Urgente</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao" placeholder="Digite aqui a descrição da manutenção..."></textarea>
    </div>

    <div class="form-group">
        <a class="btn btn-warning" href="{{route('registros.index')}}">Voltar</a>
        <input type="submit" value="Cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-danger">
    </div>
</form>

@endsection