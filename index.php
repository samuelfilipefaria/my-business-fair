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
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">My Business Fair</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
          if(!$_SESSION['team']) {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="front_end/register_team.php">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/login_team.php">Login</a>
              </li>
            ');
          } else {
            echo('
              <li class="nav-item">
                <a class="nav-link" href="front_end/planning.php">Planejamento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="front_end/midia.php">Mídia</a>
              </li>
            ');
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="front_end/about.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
  <?php
    if(!$_SESSION['team']) {
      echo('
      <div class="row justify-content-center mt-5">
        <h1 class="col-10 text-left fw-bold">
          Olá estudante! Tudo certo? Sei que essa feria de negócios provavelmente será bem desafiadora, mas é uma experiência enriquecedora que não se encontra em qualquer escola, então aproveitem, o sistema está aqui para auxiliar um pouquinho neste processo, crie seu cadastro ou acesse seu time na página de login.
        </h1>
      </div>
      ');
    } else {
      echo('
        <li class="nav-item">
          <a class="nav-link" href="front_end/planning.php">Planejamento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="front_end/midia.php">Mídia</a>
        </li>
      ');
    }
  ?>
</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
</html>

<?php
  session_destroy();
?>
