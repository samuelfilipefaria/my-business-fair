<?php
$team_name = $_POST["team_name"];
$team_email = $_POST["team_email"];
$team_spreadsheet_link = $_POST["team_spreadsheet_link"];
$team_password = $_POST["team_password"];

$pdo = require_once '../config/connect_db.php';
$sql = 'INSERT INTO teams(name, email, spreadsheet_link, password) VALUES(:name, :email, :spreadsheet_link, :password)';

$statement = $pdo->prepare($sql);

$statement->execute([
	':name' => $team_name,
	':email' => $team_email,
	':spreadsheet_link' => $team_spreadsheet_link,
	':password' => $team_password,
]);

// $team_id = $pdo->lastInsertId();

echo "<script>window.location.href='/'</script>";
?>
