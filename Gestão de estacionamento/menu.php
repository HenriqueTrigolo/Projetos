<?php
    session_start();
    $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="BS.css">
    <script src="api.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <div class="sombra2">
        <div class="menu">
            <div class="logotipo">
                <img src="./imagem/Logo_HPARK.png" alt="Logo HPark" class="HPark">
            </div>
            <div class="BVusuario">
                <h2>Bem vindo(a) <?php echo $usuario?></h2>
            </div>
            <div class="botoes">
                <form action="dados_veiculo.php" method="post" class="form-menu">
                    <input type="submit" class="btnMenu" value="Adicionar veículo">
                </form>
                <form action="retirar.php" method="post" class="form-menu">
                    <input type="submit" class="btnMenu" value="Retirar veículo">
                </form>
            </div>
        </div>
    </div>
</body>
</html>