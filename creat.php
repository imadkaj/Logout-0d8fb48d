<head>
  <link rel="stylesheet" href="style.css">
</head>

<nav>
<form action="logout.php" method="post">
<input class="logout" type="submit" name="submit" value="Logout">
</form>
</nav>

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

$type = $_GET['type'];

$sql = "SELECT * FROM media WHERE type = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$type]);

$array = $stmt->fetch(PDO::FETCH_OBJ);

?>
<h1>Add <?php echo $type ?></h1>
<form action="insert.php"method="post">
<?php 
    foreach ($array as $key => $value) 
    {
        if(($key != 'id') && ($key != 'type'))
        {
            echo 
            "<label for='$key'>$key</label>" .
            "<input type='text' name='$key'>" .
            "<br><br>";
        }
    }
?>
<input type="hidden" name="type" value=<?php echo $type?>>
<input type="submit" name="submit" value="Save">
</form>