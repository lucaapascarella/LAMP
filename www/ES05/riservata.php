<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header ("Location: login.php");
        exit();
    }
?>
<html>
    <head>
        <title>Area riservata</title>
    </head>
    <body>
        <h1>Area riservata</h1>
        <p>Benvenuto <?= htmlspecialchars($_SESSION["username"]); ?></p><br>
        <a href="logout.php">Logout</a><br>
    </body>
</html>