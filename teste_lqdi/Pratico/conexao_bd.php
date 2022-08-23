<?php
$servidor = '127.0.0.1';
$usuario = 'root';
$banco = 'newslatter';
$senha = '';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
		echo "<h2>Erro ao conectar com o banco de dados.</h2>" .$e;
	}
?>