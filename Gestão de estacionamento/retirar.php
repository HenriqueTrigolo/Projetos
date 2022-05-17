<?php 
    require_once('conexao_banco_dados.php');

    $vagas = $pdo->query("SELECT ID FROM vaga");
    $aux = $vagas->fetchAll();

    $array;
    
    if(count($aux) == 0){
        $array = "";
    }
    
    for($index = 0; $index < count($aux); $index++){
        $array[$index] = $aux[$index][0];
    }
    
    $array = json_encode($array);
?>

<script>
    function limparSelect(campo){
        while(campo.length > 1){
            campo.remove(1);
        }
    }

    function carregaVagas(){
        let vagas = document.getElementById("vagas");
        limparSelect(vagas);

        let index;
        var arrayJs = <?php echo $array?>;
    
        for(index = 0; index < arrayJs.length; index++){

            let option = document.createElement("option");
            option.value = arrayJs[index];
            option.innerHTML = "Vaga "+ arrayJs[index];
            vagas.appendChild(option);
        }
    }
</script>

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
<body onload="carregaVagas()">
<div class="sombra3">
    <div class="retirar">
        <form action="retirado.php" method="post" >
            <div class="labelRetirar">
                <h2>Qual vaga sera liberada?</h2>
            </div>
            <div class="selectRetirar">
                <select name="vaga" id="vagas" class="slctRetirar">
                    <option>Selecione uma</option>
                </select>
            </div>
            <div class="botaoRetirar">
                <input type="submit"  value="Enviar" class="btnRetirar">
            </div>
        </form>
    </div>
</div>
</body>
</html>
