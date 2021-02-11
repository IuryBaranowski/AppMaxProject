<?php
session_start();
ob_start();

include_once "Modelo/contas.class.php";
include_once "dao/contadao.class.php";
 ?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style>
      .jumbotron {
        text-align: center;
        background-color: black;
      }

      h1 {
        color: red;
      }

      h2 {
        text-align: center;
      }

      body {
        background-color: rgb(0, 209, 0);
      }
    body {font-family: Arial, Helvetica, sans-serif;}
    form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: inherit;
  padding: 10px 524px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 50px 0 12px 0;
}

img.avatar {
  width: 12%;
  border-radius: 10%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
  </head>
  <body>

    <h1 class="jumbotron">SISTEMA DE KONOHA</h1>

      <?php
      if(isset($_SESSION['privateUser'])){
        $conta = unserialize($_SESSION['privateUser']);
        if($conta->funcao == "hokage" || $conta->funcao == "auxhokage" || $conta->funcao == "anbu"){
       ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a class="navbar-brand" href="#">KONOHA</a>
           <button class="navbar-toggler" type="button"  data-toggler="collapse" data-target="#navbarNav" ria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="cadastro.php">Cadastro de ninja</a>
              </li>

              <li class="nav-item active">
                 <a class="nav-link" href="buscar-ninja.php">Buscar Shinobis<span class="sr-only">
                 </span>
               </a>
               </li>

               <?php
               if(isset($_SESSION['privateUser'])){
                 $conta = unserialize($_SESSION['privateUser']);
                 if($conta->funcao =="hokage"){
                ?>

               <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                   <li class="nav-item">
                   <a class="nav-link" href="cadastro-renegado.php">Cadastro de Renegado</a>
                 </li>

               <li class="nav-item active">
                  <a class="nav-link" href="buscar-renegado.php">Buscar Renegado<span class="sr-only">
                  </span>
                </a>
                </li>

                <li class="nav-item active">
                   <a class="nav-link" href="cadastro-contas.php">Cadastrar contas<span class="sr-only">
                   </span>
                 </a>
                 </li>

         <?php
               }
             }
        ?>

        <form name="deslogar" method="post" action="">
           <div class="form-group">
        <input type="submit" name="deslogar" value="Sair" class="btn btn-primary">
           </div>
        </form>

        <?php
               if(isset($_POST['deslogar'])){
                 unset($_SESSION['privateUser']);
                 header("location:index.php");
               }
           }
         }
        ?>

             </ul>
            </div>
         </nav>

      <h2>BEM VINDO!</h2>

      <form action="index.php" method="post">
        <div class="imgcontainer">
          <img src="images/hkg.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <input type="text" placeholder="Usuario" name="conta" required>

            <input type="password" placeholder="Senha" name="senha" required>

            <select class="container" name="funcao">
              <option value="">Selecione um cargo</option>
              <option value="hokage">Hokage</option>
              <option value="auxhokage">Aux. Hokage</option>
              <option value="anbu">Líder Anbu</option>
            </select>

          <button type="submit" name="entrar">Entrar</button>

        </div>
      </form>

        <?php
            if(isset($_POST['entrar'])){
              include_once 'modelo/contas.class.php';
              include_once 'dao/contadao.class.php';

              $contas = new Contas;
              $contas->conta = $_POST['conta'];
              $contas->senha = $_POST['senha'];
              $contas->funcao = $_POST['funcao'];

              $contaDAO = new ContaDAO();
              $contas = $contaDAO->verificarConta($contas);


              if($contas == null){
                echo "<h2>Usuário/senha/função inválido(s)!</h2>";
              }else{
                echo "<h2>LOGADO</h2>";
                $_SESSION['privateUser'] = serialize($contas);
               header("location:index.php");
              }
            }
         ?>
      </body>
      </html>
