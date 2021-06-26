<?php
require "DatabaseConfig.php";
session_start();
$u = $_POST["u"] ?? "";
$p = $_POST["p"] ?? "";

$conn = connectDatabase();
$sql = "select * from users where name = '$u' and password='$p'";
$result = $conn->query($sql);
if (!$result) {
    echo "Wrong password or wrong username";
} else {
    $_SESSION["u"] = $u;
    echo "Success";
}
$conn->close();