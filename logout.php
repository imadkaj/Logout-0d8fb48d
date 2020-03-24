<?php

if(isset($_POST['submit']))
{
    unset($_COOKIE['loggedInUser']);
    $deleted = setcookie('loggedInUser', '', time() - 3600);
    header("Location: login.php");
}

?>