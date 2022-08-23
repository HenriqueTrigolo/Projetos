<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Newslatter</title>
</head>
<body>


<div class="container">
	<div class="row">
        <div class="span12">
    		<div class="thumbnail center well well-small text-center">
                <h2>Boletim de Notícias</h2>
                
                <p>Inscreva-se no nosso boletim semanal de notícias para sempre estrar por dentro dos acontecimento do mundo!</p>
                
                <form action="inserir.php" method="post">
                    <div class="input-prepend">
                        <span class="add-on"><i class="bi bi-file-person"></i></span>
                        <input type="text" id="nome" name="nome" placeholder="Nome completo">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="text" id="email" name="email" placeholder="seu@email.com">
                    </div>
                    <div>
                        <input type="submit" value="Inscreva-se Já!" class="btn btn-large">
                    </div>
              </form>
            </div>    
        </div>
	</div>
</div>

<div class="container">
	<div class="row">
        <div class="span12">
    		<div class="thumbnail center well well-small text-center">
                <h2>Login Adm</h2> 
                
                <form action="verificacao.php" method="post">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="text" id="email" name="email" placeholder="seu@email.com">
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="bi bi-file-earmark-lock2"></i></span>
                        <input type="password" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <div>
                        <input type="submit" value="Logar!" class="btn btn-large">
                    </div>
              </form>
            </div>    
        </div>
	</div>
</div>


</body>
</html>