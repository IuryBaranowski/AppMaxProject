<?php
require_once "Modelo/contas.class.php";
require_once "dao/contadao.class.php";

$contas = new Contas;
$contas->conta = $_POST['conta'];
$contas->senha = $_POST['senha'];
$contas->funcao = $_POST['funcao'];

$contaDAO = new ContaDAO;
$contaDAO->cadastrarContas($contas);
header("location: index.php");
echo "<br>Conta cadastrada com sucesso!";
