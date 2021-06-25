<?php
require "DatabaseConfig.php";
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
$conn = connectDatabase();
$sql = "select * from wishlist where artworkID = " . $q;
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "insert into wishlist values(NULL, 1, " . $q . ")";
    $conn->query($sql);
    echo "success";
} else {
    echo "failed, you cannot add into wishlist twice";
}

mysqli_free_result($result);
$conn->close();