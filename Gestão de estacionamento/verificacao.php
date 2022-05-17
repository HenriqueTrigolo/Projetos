<?php
    $nomeProprietario = $_POST["nomeProprietario"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $placa = $_POST["placa"];
    $vaga = $_POST["vaga"];
    date_default_timezone_set('America/Sao_Paulo');    
    $entrada = date('H:i:s');
    $valorHora = $_POST["valorHora"];

    session_start();
    $_SESSION['nomeProprietario'] = $nomeProprietario;
    $_SESSION['marca'] = $marca;
    $_SESSION['modelo'] = $modelo;
    $_SESSION['placa'] = $placa;
    $_SESSION['vaga'] = $vaga;   
    $_SESSION['entrada'] = $entrada;
    $_SESSION['valorHora'] = $valorHora;
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
    <form action="inserir.php">
        <h1>
            Etapa de Confirmação
        </h1>
        <p>
            Nome do Proprietário: <?php echo $nomeProprietario?> <br>
            Marca do Veículo: <?php echo $marca?><br>
            Modelo do Veículo: <?php echo $modelo?><br>
            Placa do Veículo: <?php echo $placa?><br>
            Vaga Ocupada: <?php echo $vaga?><br>
            Hora de Entrada: <?php echo $entrada?><br>
            Valor da Hora: <?php echo $valorHora?><br>
        </p>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required="required">
                <label class="form-check-label" for="gridCheck">
                    Confirmação de verificação
                </label>
            </div>
        </div>
        <input type="submit" value="enviar">
    </form>
</body>
</html>