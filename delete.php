<?php
require "DatabaseConfig.php";
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
$userID = isset($_GET["u"]) ? intval($_GET["u"]) : '';
$conn = connectDatabase();
$sql = "delete from wishlist where artworkID = " . $q . " and userID = $userID;";
$conn->query($sql);
echo "success!";
$conn->close();
