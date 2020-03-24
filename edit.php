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

$id = $_GET['id'];

$host = 'localhost';
$dbname = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT * FROM media WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$media = $stmt->fetch(PDO::FETCH_OBJ);


?>

<form action="update.php" method="post">
<?php
foreach ($media as $key => $value) 
{
    if($key != "id")
    {
        echo "<label for='$key'>$key</label>" . "<input type='text' name='$key' value='$value'>" . "<br><br>";
    }
}
?>
<input type="hidden" name="id" value=<?php echo $id;?>>
<input type="submit" value="save" name="submit">
</form>