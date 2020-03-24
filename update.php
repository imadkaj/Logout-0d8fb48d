<?php

if(!isset($_COOKIE['loggedInUser']))
{
header("Location: login.php");
}

$host = 'localhost';
$dbname = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);

$id = $_POST['id'];
$type = $_POST['type'];
$title = $_POST['title'];
$rating = $_POST['rating'];
$awards = $_POST['awards'];
$seasons = $_POST['seasons'];
$country = $_POST['country'];
$lang = $_POST['language'];
$description = $_POST['description'];
$duration = $_POST['duration'];
$date = $_POST['date'];
$trailer_id = $_POST['trailer_id'];

$sql = "UPDATE media SET title = ?, rating = ?, awards = ?, seasons = ?, country = ?, 
language = ?, duration = ?, date = ?, trailer_id = ?
WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $rating, $awards, $seasons, $country, $lang, $duration, $date, $trailer_id, $id]);

header("Location: details.php?id=$id");

?>