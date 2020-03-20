<head>
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<div id="form">
<div class="nav">
    <ul class="navi">
        <li class="nav"> <a href="index.php" title="terug">terug</a></li>
    </ul>
</div>
<h1>welkom op het display beheerpaneel</h1>

<table>
    <h2>lijst</h2>
    <tr>
        <th>naam</th>
        <th>vraag</th>
    </tr>
    </div>
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

 $stmt = $pdo->query('SELECT * FROM vragen');
 while ($row = $stmt->fetch())
 {
     ?>
    <tr>
        <td><?= $row['naam']?></td>
        <td><?= $row['vraag']?></td>
    </tr>
     <?php
     //echo $row['title']. $row['rating']. "\n";
 }
    ?>
</table>