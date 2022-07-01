<?php
    session_start();
    if( $_SESSION['a_login']){
        $_SESSION['a_login']=false;
        header("Location:admin.php");
        exit();
    }
  

?> 