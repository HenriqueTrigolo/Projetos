<?php 
require_once('conexao_bd.php');

    
    $nome = $_POST['nome'] ;
    $email = $_POST['email'];
    $cadastro = false;

    $verifica = $pdo->query("SELECT Email FROM newslatter");

    while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
        if($linha['Email'] == $email){
            $cadastro = true;
        }
    }


    if($cadastro == false){
        $inserir = $pdo->prepare("INSERT INTO newslatter set Nome = :nome, Email = :email");
        $inserir->bindValue(":nome", $nome);
        $inserir->bindValue(":email", $email);
    
        if($inserir->execute()){
            
            echo "Inscrição realizada com sucesso! ";
            $array = array("Nome"=>$nome, "Email"=>$email);
            $json = json_encode($array);
    
            echo "$json";
        }else{
            echo "Erro ao inscrever-se";
        }
    }else{
        echo "Email já cadastrado!";
    }
    

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newslatter</title>
</head>
<body>
    <div>
        <a class='btn btn-large' href="index.php">Retornar</a>
    </div>
</body>
</html>
 