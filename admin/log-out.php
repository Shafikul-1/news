<?php 
include "config.php";
session_start();

if ($_SESSION['username']) {
    session_destroy();
    session_unset();

    header("location: {$mainUrl}admin/");
} else {
    header("location: {$mainUrl}admin?lo=failed");
}
?>