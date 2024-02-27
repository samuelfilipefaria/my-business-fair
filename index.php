<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>My Business Fair</title>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<style>
* {
  font-family: "Roboto", sans-serif;
  font-weight: 400;
  font-style: normal;
}
</style>

<nav class="navbar navbar-expand-lg fixed-top" style="background: rgb(56,255,152); background: linear-gradient(90deg, rgba(56,255,152,1) 0%, rgba(12,246,125,1) 50%, rgba(19,232,122,1) 100%);">
  <div class="container-fluid">
    <a class="navbar-brand" href="/" style="font-family: 'Jost', sans-serif;'">My Business Fair</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
          if(!$_SESSION['team']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/register_team.php">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/login_team.php">Login</a>
              </li>
            ');
          } else if($_SESSION['adm']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/logout_team.php">Sair</a>
              </li>
            ');
          }else {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/planning.php">Planejamento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/media.php">Mídia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/guide.php">Guia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/logout_team.php">Sair</a>
              </li>
            ');
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="front_end/about.php">Sobre</a>
        </li>
        <?php
          if($_SESSION['adm']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="front_end/adm.php">Área do administrador</a>
              </li>

            ');
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

<br> <br>

<body>
  <?php
    if(!$_SESSION['team']) {
      echo('
        <div class="row justify-content-center mt-5">
          <h1 class="col-10 text-center fw-bold">
            Olá! 👋️
          </h1>
        </div>
        <br> <br>
      ');

      echo('
        <div class="row justify-content-center mt-5">
          <h5 class="col-7 text-left fw-bold">
            Tudo certo? Sei que essa feira de negócios provavelmente será bem desafiadora,
            mas é uma experiência enriquecedora que não se encontra em qualquer escola,
            então aproveitem! O sistema está aqui para auxiliar um pouquinho neste processo,
            crie seu cadastro ou acesse seu time na página de login.
          </h5>
        </div>
        <br> <br>
      ');
    } else if ($_SESSION['adm']) {
      echo('
        <div class="row justify-content-center mt-5">
          <h1 class="col-10 text-center fw-bold">
            Olá administrador! 👋️
          </h1>
        </div>
        <br> <br>
      ');
    }else {
      $pdo = require_once 'config/connect_db.php';
      $sql = 'SELECT * FROM teams WHERE id = :id';

      $statement = $pdo->prepare($sql);
      $statement->bindParam(':id', $_SESSION['team'], PDO::PARAM_INT);
      $statement->execute();
      $team = $statement->fetch(PDO::FETCH_ASSOC);
      $team_name = $team['name'];

      echo('
        <div class="row justify-content-center mt-5">
          <h1 class="col-10 text-center fw-bold">
            Olá equipe '.$team_name.'! 👋️
          </h1>
        </div>
        <br> <br>
      ');

      echo('
        <div class="row justify-content-center mt-5">
          <h5 class="col-7 text-left fw-bold">
            Tudo certo? Sei que essa feira de negócios provavelmente será bem desafiadora,
            mas é uma experiência enriquecedora que não se encontra em qualquer escola,
            então aproveitem! O sistema está aqui para auxiliar um pouquinho neste processo,
            acesse os dados do seu time na página de planejamento no menu do topo.
          </h5>
        </div>
        <br> <br>
      ');
    }
  ?>
</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
</html>

