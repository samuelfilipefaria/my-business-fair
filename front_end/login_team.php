<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>My Business Fair - Login</title>
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
        <li class="nav-item">
          <a class="nav-link" href="register_team.php">Cadastro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login_team.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Sobre</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>
  <div class="row my-5 text-center justify-content-center">
    <div class="col-4">
      <h1 class="my-2">Login</h1>
      <form method="POST" action="../back_end/login_team.php">
        <input type="email" class="form-control mb-3" name="team_email" placeholder="E-mail">
        <input type="password" class="form-control mb-3" name="team_password" placeholder="Senha">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
  </div>
</body>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
</html>
