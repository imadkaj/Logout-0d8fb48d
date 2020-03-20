<?PHP 

$host = '127.0.0.1';
$db   = 'netland';
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



?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<div id="form">

<h1 class="welkom">welkom</h1>

<div class="nav">
    <ul class="navi">
        <li class="nav"> <a href="inlog.php" title="naar het inlog scherm">inlog</a></li>
        <li class="nav"> <a href="aanmelden.php" title="naar het aanmeld scherm">aanmelden</a></li>
        <li class="nav"> <a href="submit.php" title="naar het submit scherm">submit</a></li>
    </ul>
</div>

</div>
    



<!-- <form action="index.php" method="GET" name="form">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" name="submit">
</form> -->

</body>
</html>