<?php


session_start();
//checks session logged in or not

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true ){
    //if session NOT set.
    header("location:http://localhost/blogWebsite/controller/login.php");
    
    
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Blog</title>
    <link rel="stylesheet" href="../view/writePost/style.css">
    <?php 
    
// require navbar
include '../view/navbar/logNav.php'; 
?>
<style>
<?php include '../view/navbar/style.css'; ?>
<?php include '../view/writePost/style.css';?>
</style> 

<script>
   
    // static navbar
    const nav =document.querySelector('.header');
    nav.style.position ='static';

   
</script> 

</head>
<body>
    <div class="container">
                <form action="" method = "POST" enctype = 'multipart/form-data'>
                
                <textarea type="text" class="title" placeholder="Blog title..." name ='Title' required></textarea> <br>
                        <div class="image">
                            <input type="file" name ='image' class ='blog-image'>
                         </div><br><br>
                        
                         <textarea type="text" class="article" placeholder="Start writing here..." name ='blog' required></textarea>
           
                        <select name="blog_category" id="">
                            <option value="Education"> Education</option>
                            <option value="Sports">Sports</option>
                            <option value="Music">Music</option>
                            <option value="Personal Development">Personal Development</option>

                        </select><br>
                    <input type="submit" value = "Publish" name ="submit" class = 'publish'><br><br><br>
                  
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
            echo "<script>"."alert('Published successfully')"."</script>";
        }
        else{
            echo 'insert failed';
        }


       
        
    }
    ?>

<script>
        const image_input = document.querySelector(".blog-image");

        var uploaded_image = "";

        image_input.addEventListener("change",function(){
           
            const reader = new FileReader();
            reader.addEventListener("load",()=>{
                uploaded_image = reader.result;
                document.querySelector(".image").style.backgroundImage = `url(${uploaded_image})`
                
            });
            reader.readAsDataURL(this.files[0]);
        })

</script>
</body>
</html>