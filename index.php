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

$localhost = 'localhost';
$db = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$localhost;dbname=$db;charset=$charset";

try 
{
    $pdo = new PDO($dsn, $user, $pass);
} 
catch (\PDOException $e)
{
    echo 'error connecting to database :( on line : ' . $e->getMessage();
}



$sql = "SELECT * FROM media";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$media = $stmt->fetchAll(PDO::FETCH_OBJ);

function displaySeries($key)
{
    echo 
    '<tr>' .
        '<td>' . $key->title . '</td>' .
        '<td>' . $key->rating . '</td>' .
        '<td>' . "<a href='details.php?id=$key->id'>details</a>" . '</td>' .
    '</tr>';
}

function displayFilms($key)
{
    echo 
    '<tr>' .
        '<td>' . $key->title . '</td>' .
        '<td>' . $key->duration . '</td>' .
        '<td>' . "<a href='details.php?id=$key->id'>details</a>" . '</td>' .
    '</tr>';
}



function display($type,$callback)
{
    global $media;
    foreach ($media as $key) 
    {
        if($key->type == $type)
        {
            $callback($key);
        }
    }
}





?>

<table>
<h3>Series</h3>
<tr>
<th>Title</th>
<th>Rating</th>
</tr>
<tr>
<?php display('serie', 'displaySeries'); ?>
</tr>
</table>

<br>

<form action="create.php" method="get">
<input type="hidden" name="type" value="serie">
<input type="submit" name="submit" value="Add serie">
</form>

<br>

<table>
<h3>Films</h3>
<tr>
<th>Title</th>
<th>Duur</th>
</tr>
<tr>
<?php display('film', 'displayFilms'); ?>
</tr>
</table>

<br>

<form action="create.php" method="get">
<input type="hidden" name="type" value="film">
<input type="submit" name="submit" value="Add film">
</form>




