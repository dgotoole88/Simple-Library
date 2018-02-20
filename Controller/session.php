<?php 
    if(!isset($_SESSION)){
        session_start();
}
    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
    }
    if(!isset($_SESSION['currentUser']))
    {
        // not logged in
        header('Location: ../../index.php');
        exit();
    }
?>