<?php
include_once "Modelo/renegado.class.php";
include_once "dao/renegadodao.class.php";

if (isset($_GET['id']))
{

    $renegado = new Renegado;
    $renegadoDAO = new renegadoDAO;
    $renegados = $renegadoDAO->filtrarRenegado("id", $_GET['id']);
    $renegado = $renegados[0];


}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alterar Renegado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
      .jumbotron{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1 class="jumbotron bg-info"> Alterar Renegado</h1>

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

    <form class="form-group" action="" method="post">
      <div class="form-group">
        <input type="text" name="idrenegado" class="form-control" value="<?php echo $renegado->idRenegado??""; ?>" readonly hidden>
      </div>

      <div>
        <input type="text" name="nome" placeholder="Nome" class="form-control" autofocus value="<?php echo $renegado->nome??""; ?>">
      </div>

      <div>
        <input type="number" name="idade" placeholder="Idade" class="form-control" value="<?php echo $renegado->idade??""; ?>">
      </div>

      <div>
        <input type="text" name="graduacao" placeholder="Graduação" class="form-control" value="<?php echo $renegado->graduacao??""; ?>">
      </div>

      <div class="form-group">
         <select name="sexo" class="form-control">
           <option value="">Selecione o sexo:</option>
           <option value="Masculino" <?php echo $renegado->sexo == "Masculino" ? "selected" : ""; ?>>Masculino</option>
           <option value="Feminino" <?php echo $renegado->sexo == "Feminino" ? "selected" : ""; ?>>Feminino</option>
         </select>
      </div>

      <div class="">
        <input type="text" name="cla" class="form-control" placeholder="Clã" value="<?php echo $renegado->cla??""; ?>">
      </div>

      <div class="">
        <input type="text" name="vila" class="form-control" placeholder="Vila" value="<?php echo $renegado->vila??""; ?>">
      </div>

      <div class="form-group">
        <input type="submit" name="alterar" class="form-control btn btn-warning" value="Alterar">
      </div>
    </form>

    <?php
if (isset($_POST['alterar']))
{

    $renegado = new Renegado;
    $renegado->idRenegado = $_POST['idrenegado'];
    $renegado->nome = $_POST['nome'];
    $renegado->idade = $_POST['idade'];
    $renegado->graduacao = $_POST['graduacao'];
    $renegado->sexo = $_POST['sexo'];
    $renegado->cla = $_POST['cla'];
    $renegado->vila = $_POST['vila'];
    echo $renegado;
    
    $renegadoDAO = new RenegadoDAO;
    $renegadoDAO->alterarRenegado($renegado);
    echo "Renegado alterado com sucesso!";

    header("location:buscar-renegado.php");
}
?>
  </body>
</html>
