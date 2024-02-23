<?php
session_start();
echo $_SESSION['username'] . "<br>";
echo $_SESSION['role'] . "<br>";
echo $_SESSION['password'] . "<br>";
echo $_SESSION['id'] . "<br>";
?>
<div contenteditable="true" name="description" class="contentAbleDiv"></div>

<style>
    .submitBtn {
        padding: 0.5rem 3rem;
        font-weight: 700;
        font-size: 20px;
    }
</style>