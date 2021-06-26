<?php
session_start();
require "DatabaseConfig.php";
$u = $_GET["u"];
$p = $_GET["p"];

$conn = connectDatabase();
$sql = "select * from users where name = '$u' and password='$p'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "Wrong password or wrong username";
} else {
    $_SESSION["u"] = $u;
    echo "Success";
}
$conn->close();