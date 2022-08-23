<?php
    require_once('conexao_bd.php');
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $verificado = 0;

    $verifica = $pdo->query("SELECT Email, Senha FROM administradores");

    while ($linha = $verifica->fetch(PDO::FETCH_ASSOC)) {
        if($linha['Email'] == $email && $linha['Senha'] == $senha){
            $verificado = 1;
            require('tabela.php');
        }
    }

    if($verificado == 0){
        require('index.php');
    }
?>