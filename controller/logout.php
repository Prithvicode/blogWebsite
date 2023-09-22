<?php
session_start();

if(isset($_SESSION['loggedin'])){
    // if session log is set 
    session_unset();
    session_destroy();
    header("location: dashboard.php");

}else{
    // if session not set
    header("location: login.php");
}



?>