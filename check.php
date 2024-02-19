<?php 
session_start();
echo $_SESSION['username']."<br>";
echo $_SESSION['role']."<br>";
echo $_SESSION['password']."<br>";
?>