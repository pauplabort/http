<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "admin";
$password = "12345";
$dbname = "estadistics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
    echo "Error en connectar a MySQL: " . $conn->connect_error;
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO registre(ip) VALUES ('$ip')";
if (!$conn->query($sql)) {
    echo "Error en inserir la IP: " . $conn->error;
    exit;
}

$sql = "SELECT COUNT(*) FROM registre";
$resultat = $conn->query($sql);

if ($resultat) {
    $row = $resultat->fetch_array();
    echo $row[0]; 
} else {
    echo "Error en obtenir el recompte: " . $conn->error;
}

$conn->close();
?>
