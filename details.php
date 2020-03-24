<head>
  <link rel="stylesheet" href="style.css">
</head>

<nav>
<form action="logout.php" method="post">
<input class="logout" type="submit" name="submit" value="Logout">
</form>
</nav>

<a href="index.php">Terug</a>

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

$id = $_GET['id'];


$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);


$sql = "SELECT * FROM media WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$data = $stmt->fetch(PDO::FETCH_OBJ);

if($data->type == "serie")
{
    displaySerieTitle($data);
    displaySeries($data);
}
else
{
    displayFilmTitel($data);
    displayFilms($data);
}

function displayFilmTitel($data)
{
    echo 
    '<h2>' . $data->title . " - " . $data->duration .  "</h2>";
}

function displayFilms($data)
{
    echo 
    '<table>'.
    '<tr>' . 
        '<th>' . 'Datum van uitkomst' . '</th>' .
        '<td>' . $data->date   . '</td>' .
    '</tr>' .
    '<tr>' . 
        '<th>' . 'Land' . '</th>' .
        '<td>' . $data->country   . '</td>' .
    '</tr>' .
    '</table>' .
    "<p>$data->description</p>". 
    "<iframe width='420' height='320'" .
    "src='https://www.youtube.com/embed/" . $data->trailer_id . "'" . "></iframe>";
     
}

function displaySeries($data)
{
    echo 
    '<table>'.
    '<tr>' . 
        '<th>' . 'awards won' . '</th>' .
        '<td>' . $data->awards   . '</td>' .
    '</tr>' .
    '<tr>' . 
        '<th>' . 'seasons' . '</th>' .
        '<td>' . $data->seasons   . '</td>' .
    '</tr>' .
        '<tr>' . 
        '<th>' . 'country' . '</th>' .
        '<td>' . $data->country   . '</td>' .
    '</tr>' .
        '<tr>' . 
        '<th>' . 'language' . '</th>' .
        '<td>' . $data->language   . '</td>' .
    '</tr>' .
    '</table>' .
    "<p>$data->description</p>";
}

function displaySerieTitle($data)
{
    echo 
    '<h1>' . $data->title . " - " . $data->rating .  "</h1>";
}


?>

<form action="edit.php" method="get">
<input type="hidden" name="id" value=<?php echo $id; ?>>
<input type="hidden" name="type" value=<?php echo $data->type; ?>>
<input type="submit" value="wijzig" name="submit">
</form>


