<?php

function getError()
{
    if(isset($_GET['error']))
    {
        return 'Incorrect Username or Password';
    }

    return '';    
}

?>

<h2>Netland Admin Panel</h2>
<form action="process_login.php" method="post">
<label for="username">Username</label>
<input type="text" name="username" placeholder="Username">
<br></br>
<label for="password">Password</label>
<input type="password" name="password" placeholder="Password">
<h3 style="color: red;"><?php echo getError(); ?></h3>
<input type="submit" name="login" value="Login">
</form>