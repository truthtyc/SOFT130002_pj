<?php
session_start();

if(isset($_GET['u'])){
    unset($_SESSION['u']);
    header("Location: Homepage.php");
}