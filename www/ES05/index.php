<?php
    session_start();
?>
<html>
    <head>
        <title>sessioni</title>
    <head>
    <body>
        <h1>Benvenuto</h1>
        <?php if(isset($_SESSION["username"])): ?>
            <p>Login già effettuato, <a href="riservata.php">area riservata</a> - <a href="logout.php">logout</a></p>
        <?php else: ?>
            <a href="login.php">Login</a><br />
        <?php endif; ?>
    </body>
</html>