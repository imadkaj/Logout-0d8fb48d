<?php

$host = 'localhost';
$dbname = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT * FROM gebruikers";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$gebruikers = $stmt->fetchAll(PDO::FETCH_OBJ);

$username = $_POST['username'];
$password = $_POST['password'];

foreach ($gebruikers as $key => $value) 
{
    if(($value->username == $username) && ($value->wachtwoord == $password))
    {
        setcookie('loggedInUser', $value->id);
        header("Location: index.php");
    }
    else
    {
        header("Location: login.php?error=true");
    }
}

?>