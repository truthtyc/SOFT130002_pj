<?php
const HOST = "localhost";
const USER = "root";
const PASS = "123456";
const DBNAME = "artstore";

function connectDatabase(): mysqli
{
    $conn = mysqli_connect(HOST, USER, PASS, DBNAME) or
    die("Connection failed: " . mysqli_connect_error());
    return $conn;
}
//$sql = "select * from artworks where artworkID <=  20";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    while ($row = $result->fetch_assoc()) {
//        echo "artworkID: " . $row["artworkID"] . "-artist: " . $row["artist"] . "<br/>";
//    }
//} else {
//    echo "0 result";
//}
//$conn->close();