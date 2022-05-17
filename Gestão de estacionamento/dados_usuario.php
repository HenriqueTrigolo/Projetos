<?php
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    
    header('Location: menu.php');
?>