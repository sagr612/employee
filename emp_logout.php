<?php
    session_start();
    if( $_SESSION['e_login']){
        $_SESSION['e_login']=false;
        header("Location:index.php");
        exit();
    }
?>  