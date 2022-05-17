<?php
    require_once('conexao_banco_dados.php');

    $vagas = $pdo->query("SELECT ID FROM vaga");
    $aux = $vagas->fetchAll();

    $array[] = 0;
    for($index = 0; $index < count($aux); $index++){
        $array[$index] = $aux[$index][0];
    }
    $array = json_encode($array);
    
    session_start();
    $usuario = $_SESSION['usuario'];
?>

<script>
    function limparSelect(campo){
        while(campo.length > 1){
            campo.remove(1);
        }
    }

    function carregaVagas(){
        let vagas = document.getElementById("vagaLivre");
        limparSelect(vagas);

        let index;
        var arrayJs = <?php echo $array?>;
        
        for(index = 1; index <= 50; index++){
            if(arrayJs.includes(`${index}`) == false){
                let option = document.createElement("option");
                option.value = index;
                option.innerHTML = "Vaga "+ index;
                vagas.appendChild(option); 
            }
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
<body onload="iniciaRelogio(), carregaVagas()">
   <h1>Usuário(a): <?php echo $usuario?></h1>
        <form action="verificacao.php" method="post" class="row g-3">
            <div class="col-md-12">
                <label for="nomeProprietario" class="form-label">Nome do Proprietário</label>
                <input type="text" name="nomeProprietario" class="form-control" id="nomeProprietario">
            </div>
            <div class="col-md-4">
                <label for="marca" class="form-label">Marca do Veículo</label>
                <select id="marca" name="marca" class="form-select" onchange="carregarModelo(this.value)">
                    <option value="null" selected>Selecione a marca</option>
                </select>
                <input type="button" class="CB" value="Carregar Marcas" onclick="carregarMarca()">
            </div>
            <div class="col-md-4">
                <label for="modelo" class="form-label">Modelo</label>
                <select id="modelo" name="modelo" class="form-select">
                    <option value="null" selected>Selecione o modelo</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa do veículo" style="text-transform:uppercase">
            </div>
            <div class="col-4">
                <label for="horaEntrada" class="form-label">Hora de Entrada</label>
                <input type="text" class="form-control timer" id="horaEntrada" name="hora" disabled>
            </div>
            <div class="col-md-4">
                <label for="vagaLivre" class="form-label">Vagas livres</label>
                <select id="vagaLivre" name="vaga" class="form-select">
                    <option selected>Selecione uma vaga disponível</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="valorHora" class="form-label">Valor da Hora (R$)</label>
                <input type="number" class="form-control" id="valorHora" name="valorHora">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar Veículo</button>
            </div>
        </form>
</body>
</html>


