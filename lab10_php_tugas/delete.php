<?php
require_once 'database.php';
$database = new database();
$Nim = $_GET["Nim"];
echo $Nim;

if (isset($_GET["Nim"])) {
    $database->delete("tb_latihan", "where Nim=" . $Nim);
    header("location: data.php");
}
