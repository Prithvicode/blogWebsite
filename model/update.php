<html>
    <head>
    <link rel="stylesheet" href="../view/writePost/style.css">
    </head>
<body>
            <?php 
            // require navbar
            include '../view/navbar/nav.html'; 
            ?>
            <style>
            <?php include '../view/navbar/style.css'; ?>
            </style>
       <script>
            <?php include '../view/navbar/nav.js'; ?>
            // static navbar
            const nav =document.querySelector('.header');
            nav.style.position ='static';
            //hide hero section
            const hero = document.querySelector('.hero-box');
            hero.remove();

        </script>
<!-- FORM WITH PRE FILLED DATA FROM DB -->
<?php
include "../controller/dbconnect.php";


$Id = $_GET['Id'];
$sql = "Select * from blog_post where Id ='$Id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>
<form action="" method = "POST" enctype = 'multipart/form-data'>

    <!-- image prefilled data click change to then only update  -->

    <div class="image">
        
        <input type="file" name ='image'><br>
    </div>

    <div class="blog-content">
            <input type="text" name ="Title" placeholder= "enter blog title"value ="<?php echo $row['Title']?>"><br>
            <!-- default blog_category can be change w -->
            <select name="blog_category" id="blog_cat">

                <option value="Education"> Education</option>
                <option value="Sports">Sports</option>
                <option value="Music">Music</option>
                <option value="Personal Development">Personal Development</option>

            </select><br>

            <textarea name="blog" id="" cols="30" rows="10" placeholder="enter you blog..." >
            <?php echo $row['Post']?>
            </textarea><br>
            
            
            <input type="submit" name ="submit"><br>
            </div>
    <div class="view">
    <a href="viewPost.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display Posts </button></a>
    <a href="http://localhost/blogWebsite/controller/myPosts.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display My Posts </button></a>
    
   </div>
    
</form>
   
    <?php
    include '../controller/dbconnect.php';
   
    if(isset($_POST['submit'])){
        $title = $_POST['Title'];
        $blog =$_POST['blog'];
        $blog_post =mysqli_real_escape_string($conn,$blog);

        $blog_cat = $_POST['blog_category'];
        $blog_id = $_GET['Id'];

        if($_FILES['image']['name'] != NULL)  {

        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder2 = "../uploads/".$image;
        move_uploaded_file($temp,$folder2);
        $sql = "update blog_post set Title = '".$title."' ,Post ='".$blog_post."',Image = '".$folder2."', Blog_category = '".$blog_cat."' where Id = $blog_id ;";

        }else{

        // -----------------------UPDATE QUERY---------------------------------------------------------->

        $sql = "update blog_post set Title = '".$title."' ,Post ='".$blog_post."', Blog_category = '".$blog_cat."' where Id = $blog_id ;";
        }
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "Updated blog success";
            }
            else{
                echo 'Update failed';
            }
       

        // header("location:http://localhost/blogWebsite/dashboard.php");

       
        
    }
    ?>
</body>
</html>