<?php


session_start();
//checks session logged in or not

if(!isset($_SESSION['loggedin'] )){
    //if session NOT set.
    header("location:http://localhost/blogWebsite/controller/login.php");
    echo $_SESSION['loggedin'];
}

 ?>



<h3>Welcome -<?php echo $_SESSION['username']?></h3> <br>

<a href="logout.php"><button>Log Out</button></a>

