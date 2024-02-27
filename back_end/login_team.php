<?php
session_start();

$team_email = $_POST["team_email"];
$team_password = $_POST["team_password"];

$pdo = require_once '../config/connect_db.php';
$sql = 'SELECT id FROM teams WHERE email = :email AND password = :password';

$statement = $pdo->prepare($sql);
$statement->bindParam(':email', $team_email, PDO::PARAM_STR);
$statement->bindParam(':password', $team_password, PDO::PARAM_INT);
$statement->execute();
$team = $statement->fetch(PDO::FETCH_ASSOC);

if($team_email == "adm@gmail.com" && $team_password == "789") {
	$_SESSION['adm'] = true;
	$_SESSION['team'] = 1;
	echo "<script>window.location.href='/'</script>";
} else {
	if ($team) {
		$team_id = $team['id'];
		$_SESSION['team'] = $team_id;
		echo "<script>window.location.href='/'</script>";
	} else {
		$_SESSION['team'] = false;
		session_destroy();
		echo "<script>window.location.href='/front_end/login_error.php'</script>";
	}
}


?>