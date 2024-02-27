<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>My Business Fair - Planejamento</title>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet"/>
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

  iframe {
    width: 90%;
    height: 790px;
    box-shadow:
      0px 0px 1.2px rgba(0, 0, 0, 0.023),
      0px 0px 2.7px rgba(0, 0, 0, 0.034),
      0px 0px 4.6px rgba(0, 0, 0, 0.042),
      0px 0px 6.9px rgba(0, 0, 0, 0.049),
      0px 0px 10px rgba(0, 0, 0, 0.055),
      0px 0px 14.2px rgba(0, 0, 0, 0.061),
      0px 0px 20.1px rgba(0, 0, 0, 0.068),
      0px 0px 29.2px rgba(0, 0, 0, 0.076),
      0px 0px 45px rgba(0, 0, 0, 0.087),
      0px 0px 80px rgba(0, 0, 0, 0.11);
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
            echo "<script>window.location.href='/'</script>";
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register_team.php">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login_team.php">Login</a>
              </li>
            ');
          } else if($_SESSION['adm']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout_team.php">Sair</a>
              </li>
            ');
          }else {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="planning.php">Planejamento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="media.php">Mídia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="guide.php">Guia</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout_team.php">Sair</a>
              </li>
            ');
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Sobre</a>
        </li>
        <?php
          if($_SESSION['adm']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="adm.php">Área do administrador</a>
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
  <div class="row my-5 text-center justify-content-center">
    <div class="col-12">
        <?php
          $pdo = require_once '../config/connect_db.php';
          $sql = 'SELECT google_drive_folder_link FROM teams WHERE id = :id';

          $statement = $pdo->prepare($sql);
          $statement->bindParam(':id', $_SESSION['team'], PDO::PARAM_INT);
          $statement->execute();
          $team = $statement->fetch(PDO::FETCH_ASSOC);
          $team_google_drive_folder_link = $team['google_drive_folder_link'];
          $google_drive_folder_id = substr($team_google_drive_folder_link, 39, -12);

          echo "
            <a href='$team_google_drive_folder_link' target='_blank'><button class='btn animate__animated animate__bounceIn' style='background-color: #38ff98; color: #000;'>Acessar repositório de mídia <i class='ri-arrow-right-up-line'></i></button></a>
            <br> <br> <br> <br>
            <h2>Arquivos já enviados</h2>
            <br>
            <iframe src='https://drive.google.com/embeddedfolderview?id=$google_drive_folder_id#grid' class='animate__animated animate__fadeInUp'></iframe>
          ";
        ?>
    </div>
  </div>
</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
</html>

