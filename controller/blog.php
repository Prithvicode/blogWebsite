<?php


session_start();
//checks session logged in or not

if(!isset($_SESSION['loggedin'] )){
    //if session NOT set.
    header("location:http://localhost/blogWebsite/controller/login.php");
    echo $_SESSION['loggedin'];
    
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/writePost/style.css">
    <?php 
    
// require navbar
include '../view/navbar/nav.html'; 
?>
<style>
<?php include '../view/navbar/style.css'; ?>
<?php include '../view/writePost/style.css';?>
</style> 

<script>
    <?php include '../view/navbar/nav.js'; ?>
    // static navbar
    const nav =document.querySelector('.header');
    nav.style.position ='static';

</script> 
</head>
<body>
                <form action="" method = "POST" enctype = 'multipart/form-data'>
                    <div class="image">
                    <input type="file" name ='image' class ='blog-image'>
                    </div>

                    <div class="blog-content">
                        <div class="title">
                            <input type="text" name ="Title" placeholder= "enter blog title" class = "blog-title"><br>
                        </div>
                        <select name="blog_category" id="">
                        <option value="Education"> Education</option>
                        <option value="Sports">Sports</option>
                        <option value="Music">Music</option>
                        <option value="Personal Development">Personal Development</option>

                    </select><br>
                    
                        <div class="post">
                            <textarea placeholder= 'Start writing here' name="blog" id="" cols="30" rows="10" placeholder="enter you blog...">
                            </textarea>
                        </div>
                   

                    
           
                    
                    <input type="submit" name ="submit"><br>
                    </div>

                <div class="view">
                    <a href="viewPost.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display Posts </button></a>
                    <a href="myPosts.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display My Posts </button></a>
                </div>
                
                
                
                </form>
                    
                
   
    <?php
    include 'dbconnect.php';
    

    if(isset($_POST['submit'])){
        $title = $_POST['Title'];
        $blog =$_POST['blog'];
        $blog_post =mysqli_real_escape_string($conn,$blog);

        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../uploads/".$image;
        move_uploaded_file($temp,$folder);

        $blog_cat = $_POST['blog_category'];

        $user_id = $_SESSION['user_id'];

        $sql = "insert into blog_post(Title,Post,Image,Blog_category,Author_id) values('$title','".$blog_post."', '$folder','$blog_cat','".$user_id."');";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "inserted blog success";
        }
        else{
            echo 'insert failed';
        }

        // header("location:http://localhost/blogWebsite/dashboard.php");

       
        
    }
    ?>
</body>
</html>