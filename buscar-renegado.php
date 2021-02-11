<?php
session_start();
ob_start();

require_once "Modelo/renegado.class.php";
require_once "dao/renegadodao.class.php";
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
          background-image: url('images/renegado.png');
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
$renegadoDAO = new renegadoDAO;
$renegado = $renegadoDAO->buscarRenegado();

if (count($renegado) == 0)
{
    echo "<h2>Não há renegados</h2>";
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
              <option value="idrenegado">Código</option>
              <option value="nome">Nome</option>
              <option value="idade">Idade</option>
              <option value="graduacao">Graduação</option>
              <option value="sexo">Sexo</option>
              <option value="cla">Clã</option>
              <option value="vila">Vila</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-block">
        </div>
        </form>

          <?php
if (isset($_POST['filtrar']))
{
    $renegadoDAO = new renegadoDAO;
    $renegado = $renegadoDAO->filtrarRenegado($_POST['filtro'], $_POST['pesquisa']);
    unset($_POST['filtrar']);
    if (count($renegado) == 0)
    {
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
                <th>Vila</th>
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
                  <th>Vila</th>
                  <th>Alterar</th>
                  <th>Excluir</th>
                </tr>
            </tfoot>
            <tbody>
              <?php
foreach ($renegado as $renegado)
{
    echo "<tr>";
    echo "<td>$renegado->idRenegado</td>";
    echo "<td>$renegado->nome</td>";
    echo "<td>$renegado->idade</td>";
    echo "<td>$renegado->graduacao</td>";
    echo "<td>$renegado->sexo</td>";
    echo "<td>$renegado->cla</td>";
    echo "<td>$renegado->vila</td>";
    echo "<td><a href='alterar-renegado.php?id=$renegado->idRenegado'class='btn btn-warning'>Alterar</a></td>";
    echo "<td><a href='buscar-renegado.php?id=$renegado->idRenegado'class='btn btn-danger'>Excluir</a></td>";
    echo "</tr>";
}
?>
            </tbody>

          </table>
        </div>

        <?php
if (isset($_GET['id']))
{
    $renegadoDAO = new renegadoDAO;
    $renegadoDAO->excluirRenegado($_GET['id']);
    header("location:buscar-renegado.php");
}
?>

    </body>
  </html>
