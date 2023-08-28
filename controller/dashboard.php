<?php


session_start();
//checks session logged in or not

if(!isset($_SESSION['loggedin'] )){
    //if session NOT set.
    header("location:http://localhost/blogWebsite/controller/login.php");
    echo $_SESSION['loggedin'];
    
}

 ?>

    <?php 
         //navbar 
         require '../view/navbar/nav.html';?>
    <style>
        /* nabar Css */
        <?php include '../view/navbar/style.css'; ?>
    </style> 
    <script>
        // navbar Js
        <?php include '../view/navbar/nav.js'; ?>
    </script>


<h3>Welcome -<?php echo $_SESSION['username'] .$_SESSION['user_id']?></h3> <br>
<a href="blog.php"><button type ='button'>Write Blog</button></a><br>
<a href="logout.php"><button>Log Out</button></a>



