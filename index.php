<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Daily Time Tracker</title>
        <meta name="description" content="Una guía interactiva de primeros pasos para Brackets.">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

        <h1>Time Tracker</h1>
        <h2> Press Start to begin!</h2>
        <p>
            <?php echo "XDD" ?>
        </p>

    </body>
</html>

<?php

$servername = "localhost";
$username = "root";        // of course, you need to change this to have it working fine.
$password = "50138013"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>