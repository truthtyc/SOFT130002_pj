<?php
require "DatabaseConfig.php";
$conn = connectDatabase();

$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
$u = $_GET['u'] ?? '';

$user_sql = "select userID from users where name = '$u'";
$user_result = $conn->query($user_sql);
$userid = ($user_result->fetch_assoc())['userID'];

$find_same_sql = "select * from wishlist where userID = $userid and artworkID = $q";
$result = $conn->query($find_same_sql);

if ($result->num_rows == 0) {
    $sql = "insert into wishlist values(NULL, '$userid', $q)";
    $conn->query($sql);
    echo "success";
} else {
    echo "failed, you cannot add into wishlist twice";
}

$conn->close();