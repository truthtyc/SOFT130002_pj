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