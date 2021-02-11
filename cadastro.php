<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Cadastro Shinobi</title>
    <style>
      .jumbotron{
        text-align: center;
        background-color: SlateBlue;
      }

      body{
        background-image: url('images/Konoha.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: bottom;
        background-size: 100% 70%;
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

    <h1 class="jumbotron">Cadastro de Ninja</h1>

    <form class="cadastro" action="controle.php" method="post">
      <div class="form-group">
        <input type="text"  class="form-control" name="nome" placeholder="Nome" pattern="[a-zA-Z]+" required>
      </div>

      <div class="form-group">
        <input type="number" class="form-control" name="idade" placeholder="Idade" pattern="[0-9]+" required>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="graduacao" placeholder="Graduacao" required>
      </div>

      <div class="form-group">
         <select name="sexo" class="form-control" required>
           <option value="">Selecione o sexo</option>
           <option value="Masculino">Masculino</option>
           <option value="Feminino">Feminino</option>
         </select>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" name="cla" placeholder="Clã" required>
      </div>

      <div>
        <input type="submit" class="form-control btn btn-primary" value="Cadastrar">
      </div>

    </form>

  </body>
</html>
