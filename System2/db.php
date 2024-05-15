<?php
$servername = "mysql305.phy.lolipop.lan";
$username = "LAA1517492";
$password = "Pass0313";
$dbname = "LAA1517492-fuwaroke";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
