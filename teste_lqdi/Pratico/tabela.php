<?php 
    require_once('conexao_bd.php');
    
    $consulta = $pdo->query("SELECT Nome, Email FROM newslatter;");
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Área Administrativa</title>
 </head>
 <body>
    <div class="container"><div class="container">
        <div class="row">
            <div class="span12">
                <div class="thumbnail center well well-small text-center">
                    <h2>Cadastrar Adm</h2> 
                    
                    <form action="inserir_adm.php" method="post">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" id="email" name="email" placeholder="adm@email.com">
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="bi bi-file-earmark-lock2"></i></span>
                            <input type="password" id="senha" name="senha" placeholder="Senha">
                        </div>
                        <div>
                            <input type="submit" value="Cadastrar!" class="btn btn-large">
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    
        <table class="table table-striped table-hover">
            <?php 
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>{$linha['Nome']}</td> <td>{$linha['Email']}</td><td><input type='submit' value='Enviar!' class='btn btn-large'></td></tr>";
                } 
            ?>
        </table>

        <a class='btn btn-large' href="index.php">Retornar</a>
    </div>
    
 </body>
 </html>