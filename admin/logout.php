<?php 
    session_start();
    unset($_SESSION['s_user']);
    header('location: login.php');
?>