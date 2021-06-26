<?php
require "DatabaseConfig.php";
$u = $_GET["u"] ?? "";

$conn = connectDatabase();
$sql = "select * from users where name = '$u'";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
    echo "Name conflict, failure";
} else {
    $p = $_GET["p"] ?? "";
    $tel = $_GET["tel"] ?? "";
    $ad = $_GET["ad"] ?? "";
    $em = $_GET["em"] ?? "";
    $sql = "insert into users(name, email, password, tel, address, balance) values('$u', '$em', '$p', '$tel', '$ad', 0)";
    $conn->query($sql);
    echo "Success";
}
$conn->close();