<?php
    session_start(); 
    if(!isset($_SESSION['login']['user'])){
        session_destroy();
        header('Location: index.php?nologin');
        exit;
    }
?>