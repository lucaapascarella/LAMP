<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Costanti per la connessione al database
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'ES05_user');
        define('DB_PASSWORD', 'mia_password');
        define('DB_NAME', 'ES05');
        $html_out = "";
        try {
            // Connessione al database
            $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // Verifica della connessione
            if (!$conn) {
                //die("Connessione fallita: " . mysqli_connect_error());
                $html_out = "Attenzione! Connessione al database fallita." . mysqli_connect_error();
            }
            $html_out = "Connessione al database riuscita.";

            // Query
            $sql = "SELECT Username, Password FROM utente";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($_POST["username"] == $row["Username"] && $_POST["password"] == $row["Password"])
                {
                    $_SESSION["username"] = $row["Username"];
                    echo "<p>Login avvenuto con successo</p>";
                    echo "<a href ='riservata.php'>Area riservata</a><br>";
                    echo "<a href ='logout.php'>Logout</a>";
                    exit();
                }
                else
                {
                    $errore="credenziali errate";
                }
            }

            // Chiusura della connessione
            mysqli_close($conn);
        } catch (Exception $e) {
        $html_out = "Attenzione! Si è verificata un'eccezione. " . $e->getMessage();
        }
    }
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <h1>Login</h1>
    <?php
        if (isset($errore)) echo "<p style-'color: red;' >$errore</p>"
    ?>
    <form method="post">
        <label>Username: <input type="text" name="username"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <button type="submit">Accedi</button>
    </form>
    <a href="index.php">Home</a><br>
    </body>
</html>