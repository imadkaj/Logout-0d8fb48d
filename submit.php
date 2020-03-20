<html>
<head>
<title>PHP insertion</title>
<link href="css/insert.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<div class="maindiv">
<!--HTML Form -->
<div class="form_div">
<div class="title">
<div class="nav">
    <ul class="navi">
        <li class="nav"> <a href="index.php" title="terug">terug</a></li>
    </ul>
</div>
<h2>Insert Data In Database Using PHP.</h2>
</div>
<form action="submit.php" method="post">
<!-- Method can be set as POST for hiding values in URL-->
<h2>Form</h2>
<label>Naam:</label><br>
<input class="input" name="naam" type="text" value=""><br>
<label>Vraag:</label><br>
<input class="input" name="vraag" type="text" value=""><br>
<input class="submit" name="submit" type="submit" value="Insert">
</form>
</div>
</div>
</body>
</html>

<?php

$host = '127.0.0.1';
$db   = 'vragen';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$naam = $_POST['naam'];
$vraag = $_POST['vraag'];

if ($naam != '' || $vraag != ''){
    $query = $pdo->query("insert into vragen(naam, vraag) values ('$naam', '$vraag')");
} else {
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

?>