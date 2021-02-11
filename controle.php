<?php
require_once "Modelo/usuario.class.php";
require_once "dao/usuariodao.class.php";

$usuario =  new Usuario;
$usuario->nome = $_POST['nome'];
$usuario->idade = $_POST['idade'];
$usuario->graduacao = $_POST['graduacao'];
$usuario->sexo = $_POST['sexo'];
$usuario->cla = $_POST['cla'];
echo $usuario;

$usuarioDAO = new UsuarioDAO;
$usuarioDAO->cadastrarUsuario($usuario);
header("location: buscar-ninja.php");
echo "<br>Shinobi cadastrado com sucesso!";
