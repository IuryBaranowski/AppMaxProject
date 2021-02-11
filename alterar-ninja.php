<?php
  include_once "Modelo/usuario.class.php";
  include_once "dao/usuariodao.class.php";

    if(isset($_GET['id'])){

    $usuario = new Usuario;
    $usuarioDAO = new UsuarioDAO;
    $usuarios = $usuarioDAO->filtrarNinja("id", $_GET['id']);
    $usuario = $usuarios[0];
  }
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Alterar Shinobi</title>
    <style>
      .jumbotron{
        text-align: center;
      }

    </style>
  </head>
  <body>
    <h1 class="jumbotron bg-info">Alteração de Ninja</h1>

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
           <?php
           if(isset($_SESSION['privateUser'])){
             $conta = unserialize($_SESSION['privateUser']);
             if($usuario->tipo =="Hokage"){
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
         </ul>
        </div>
     </nav>

    <form name="alterar" method="post" action="">
      <div class="form-group">
        <input type="text" name="idusuario" class="form-control" value="<?php echo $usuario->idUsuario ??"";?>" readonly hidden>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $usuario->nome ??"";?>">
      </div>

      <div class="form-group">
        <input type="number" class="form-control" name="idade" placeholder="Idade" value="<?php echo $usuario->idade ??"";?>">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="graduacao" placeholder="Graduacao" value="<?php echo $usuario->graduacao ??"";?>">
      </div>

      <div class="form-group">
         <select name="sexo" class="form-control">
           <option value="">Selecione o sexo:</option>
           <option value="Masculino" <?php echo $usuario->sexo == "Masculino" ? "selected" : ""; ?>>Masculino</option>
           <option value="Feminino" <?php echo $usuario->sexo == "Feminino" ? "selected" : ""; ?>>Feminino</option>
         </select>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="cla" placeholder="Clã" value="<?php echo $usuario->cla ??"";?>">
      </div>

      <div>
        <input type="submit" name="alterar" class="form-control btn btn-warning" value="Alterar">
      </div>

    </form>

    <?php

      if(isset($_POST['alterar'])){

      $usuario = new Usuario;
      $usuario->idUsuario = $_POST['idusuario'];
      $usuario->nome = $_POST['nome'];
      $usuario->idade = $_POST['idade'];
      $usuario->graduacao = $_POST['graduacao'];
      $usuario->idade = $_POST['idade'];
      $usuario->sexo = $_POST['sexo'];
      $usuario->cla = $_POST['cla'];

      $usuarioDAO = new UsuarioDAO;
      $usuarioDAO-> alterarNinja($usuario);
      echo "Ninja alterado com Sucesso";

    }
    ?>
  </body>
</html>
