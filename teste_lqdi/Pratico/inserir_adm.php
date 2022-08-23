<?php 
require_once('conexao_bd.php');
 
    $email = $_POST['email'];
    $senha = $_POST['senha'];
       
    $inserir = $pdo->prepare("INSERT INTO administradores set Email = :email, Senha = :senha");
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":senha", $senha);

    if($inserir->execute()){
        
    }else{
        echo "Erro ao inscrever-se";
        //require('ocupada.html');
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área administrativa</title>
</head>
<body>
    <div class="container">
        <h1>Administrador inserido com sucesso!</h1>
        <a class='btn btn-large' href="tabela.php">Retornar</a>
    </div>
</body>
</html>
 