<?php
session_start();
ob_start();

require_once "Modelo/usuario.class.php";
require_once "dao/usuariodao.class.php";
 ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busca Shinobi</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
      body{
        background-image: url('images/Image2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <a class="navbar-brand" href="index.php">KONOHA</a>
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

         </ul>
        </div>
     </nav>

     <?php
     $usuarioDAO = new UsuarioDAO;
     $usuario = $usuarioDAO->buscarUsuario();

     if(count($usuario) == 0){
       echo "<h2>Não há ninjas cadastrados</h2>";
       echo "</body>";
       echo "</html>";
       die();
     }
      ?>

      <form name="pesquisa"  method="post" action="">
        <div class="row">
          <div class="form-group col-md-6">
            <input type="text" name="pesquisa" class="form-control" placeholder="Digite sua pesquisa">
        </div>
        <div class="form-group col-md-6">
          <select name="filtro" class="form-control">
            <option value="todos">Todos</option>
            <option value="idusuario">Código</option>
            <option value="nome">Nome</option>
            <option value="idade">Idade</option>
            <option value="graduacao">Graduação</option>
            <option value="sexo">Sexo</option>
            <option value="cla">Clã</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-block">
      </div>
      </form>

        <?php
        if(isset($_POST['filtrar'])) {
          $usuarioDAO = new UsuarioDAO;
          $usuario = $usuarioDAO->filtrarNinja($_POST['filtro'], $_POST['pesquisa']);
          unset($_POST['filtrar']);
          if(count($usuario) == 0){
            echo "<h2>Sem Ninjas</h2>";
            echo "</body>";
            echo "</html>";
            die();
          }
        }
      ?>

      <div class="tavle-responsive">
        <table class="table table-striped table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>Graduação</th>
              <th>Sexo</th>
              <th>Clã</th>
              <th>Alterar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tfoot>
              <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Graduação</th>
                <th>Sexo</th>
                <th>Clã</th>
                <th>Alterar</th>
                <th>Excluir</th>
              </tr>
          </tfoot>
          <tbody>
            <?php
            foreach($usuario as $usuario){
              echo "<tr>";
                echo "<td>$usuario->idUsuario</td>";
                echo "<td>$usuario->nome</td>";
                echo "<td>$usuario->idade</td>";
                echo "<td>$usuario->graduacao</td>";
                echo "<td>$usuario->sexo</td>";
                echo "<td>$usuario->cla</td>";
                echo "<td><a href='alterar-ninja.php?id=$usuario->idUsuario'class='btn btn-warning'>Alterar</a></td>";
                echo "<td><a href='buscar-ninja.php?id=$usuario->idUsuario'class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }
             ?>
          </tbody>

        </table>
      </div>

      <?php
      if(isset($_GET['id'])){
      $usuarioDAO = new UsuarioDAO;
      $usuarioDAO->excluirNinja($_GET['id']);
      header("location:buscar-ninja.php");
    }

      ?>

  </body>
</html>
