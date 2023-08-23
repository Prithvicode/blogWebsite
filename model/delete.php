<?php
include "../controller/dbconnect.php";

$Id = $_GET['Id'];
$sql = "delete from blog_post where Id=$Id";

$result = mysqli_query($conn, $sql);

if($result){
    header("Location:http://localhost/blogWebsite/controller/myPosts.php");
    
}


?>