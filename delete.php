<?php
require "DatabaseConfig.php";
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
$conn = connectDatabase();
$sql = "delete from wishlist where artworkID = " . $q . " and userID = 1;";
$conn->query($sql);
echo "success!";
$conn->close();
