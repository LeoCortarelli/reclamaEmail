<?php
$servidor = "localhost";
$username = "root";
$passwold = "";
$dbname = "reclamaemail";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname", $username, $passwold);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $th) {
    echo $th->getMessage();
    exit;
}
?>