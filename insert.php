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

$title = $_POST['title'];
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

$sql = "INSERT INTO media (type, title, rating, awards, seasons, country, language, description, duration, date, trailer_id)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$stmt = $pdo->prepare($sql);
$stmt->execute([$type, $title, $rating, $awards, $seasons, $country, $lang, $description, $duration, $date, $trailer_id]);

header("Location: index.php");

?>