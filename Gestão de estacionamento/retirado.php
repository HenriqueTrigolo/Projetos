<?php 
require_once('conexao_banco_dados.php');

    $vaga = $_POST['vaga'];

    $pesquisar = $pdo->query("SELECT Hora_Entrada FROM vaga WHERE `vaga`.`ID` = $vaga ");
    $aux = $pesquisar->fetchAll();
    $hora_entrada = $aux[0][0];
    
    $pesquisar = $pdo->query("SELECT Valor_Hora FROM vaga WHERE `vaga`.`ID` = $vaga ");
    $rows = $pesquisar->fetchAll();
    $valor_hora = $rows[0][0];

    date_default_timezone_set('America/Sao_Paulo');    
    $hora_atual = date('H:i:s');

    $entrada = $hora_entrada;
    $saida = $hora_atual;
    $hora1 = explode(":",$entrada);
    $hora2 = explode(":",$saida);
    $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
    $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
    $resultado = $acumulador2 - $acumulador1;
    $hora_ponto = floor($resultado / 3600);
    $resultado = $resultado - ($hora_ponto * 3600);
    $min_ponto = floor($resultado / 60);
    $resultado = $resultado - ($min_ponto * 60);
    $secs_ponto = $resultado;
    $tempo = $hora_ponto.":".$min_ponto.":".$secs_ponto;
    
    if($min_ponto > 0){
        $total_pagar = ($hora_ponto + 1) * $valor_hora;
    }else{
        $total_pagar = $hora_ponto * $valor_hora;
    }
    
    $deletar = $pdo->prepare("DELETE FROM `vaga` WHERE `vaga`.`ID` = $vaga ");
    $deletar->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="BS.css">
    <script src="api.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <div class="sombra4">
        <div class="telaRetirado">
            <form action="menu.php">
            <div class="sucesso">
                <h1>Veículo retirado com sucesso!!</h1>
            </div>
            <div class="aPagar">
                <h2>
                    Período de permanencia: <?php echo $tempo?>
                </h2>
                <h2>
                    Total a pagar: R$<?php echo $total_pagar?>,00
                </h2>
            </div>
            <div class="botaoRetirado">
                <input type="submit" value="Inicio" class="inicio">
            </div>
        </form>
        </div>
    </div>
    
</body>
</html>
