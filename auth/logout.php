<!-- LOGOUT PAGE, handles when users log out of their account. Take them back to the main page index.php -->

<?php
session_start();
unset($_SESSION['login']);
header("Location: ../index.php");