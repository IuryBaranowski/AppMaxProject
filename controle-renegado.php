<?php
include_once "Modelo/renegado.class.php";
include_once "dao/renegadodao.class.php";

$renegado = new Renegado;
$renegado->nome = $_POST['nome'];
$renegado->idade = $_POST['idade'];
$renegado->graduacao = $_POST['graduacao'];
$renegado->sexo = $_POST['sexo'];
$renegado->cla = $_POST['cla'];
$renegado->vila = $_POST['vila'];
echo $renegado;

$renegadoDAO = new RenegadoDAO;
$renegadoDAO->cadastrarRenegado($renegado);
header("location: buscar-renegado.php");
echo "<br>Renegado cadastrado com sucesso!";
