<?php
$nome = $_GET["nome"];

$salario = $_GET["salario"];
$salario = intval ($salario);

$total_vendas = $_GET["total_vendas"];
$total_vendas = floatval ($total_vendas);

$total_receber = ($total_vendas *15/100) + $salario;
$total_receber = number_format($total_receber, 2);

$array_final = array("Nome"=>$nome, "Salario"=>$salario, "Total de vendas"=>$total_vendas, "Total a Receber"=>$total_receber);

$json_final = json_encode($array_final);

echo "$json_final";
?>