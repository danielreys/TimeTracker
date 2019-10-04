<?php
$servername = "localhost";
$username = "root";        // sql params
$password = "50138013";

try {
    $conn = new PDO("mysql:host=$servername;dbname=time_tracker", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    console.log("Connection failed: " . $e->getMessage());
    alert('connection failed');
}

function sumarHoras($horas) {
    $total = 0;
    foreach($horas as $h) {
        $parts = explode(":", $h);
        $total += $parts[2] + $parts[1]*60 + $parts[0]*3600;        
    }   
    return gmdate("H:i:s", $total);
}
?>