<?php
    session_start();
    if(isset($_SESSION['inadmin'])){
        
    }else{
        header('Location: index.php');
    }
?>