<?php 
require_once('conexao_banco_dados.php');

    session_start();

    $vaga_ocupada = $_SESSION['vaga'] ;
    $marca = $_SESSION['marca'];
    $modelo = $_SESSION['modelo'];
    $placa = $_SESSION['placa'];
    $nome_proprietario = $_SESSION['nomeProprietario'];
    $hora_entrada = $_SESSION['entrada'];
    $valor_hora = $_SESSION['valorHora'];    

    $inserir = $pdo->prepare("INSERT INTO vaga set ID = :id, Marca = :marca, Modelo = :modelo, Placa = :placa,  Nome_Proprietario = :nome_proprietario, Hora_Entrada = :hora_entrada, Valor_Hora = :valor_hora");
    $inserir->bindValue(":id", $vaga_ocupada);
    $inserir->bindValue(":marca", $marca);
    $inserir->bindValue(":modelo", $modelo);
    $inserir->bindValue(":placa", $placa);
    $inserir->bindValue(":nome_proprietario", $nome_proprietario);
    $inserir->bindValue(":hora_entrada", $hora_entrada);
    $inserir->bindValue(":valor_hora", $valor_hora);

    if($inserir->execute()){
        require('confirmacao.html');
    }else{
        require('ocupada.html');
    }
 ?>

 