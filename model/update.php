
<?php
session_start();
include "../controller/dbconnect.php";


$Id = $_GET['Id'];
$sql = "Select * from blog_post where Id ='$Id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if($_SESSION['user_id'] != $row['Author_id']){
    echo "<script>"."alert('Access Denied. Go Back.')"."</script>";
    
}else{
?>

<html>
    <head>
        <title>Update Blog</title>
    <link rel="stylesheet" href="../view/writePost/style.css">
    </head>
     <?php 
            // require navbar
            include '../view/navbar/logNav.php'; 
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
    </head>
 <body>
       
<!-- FORM WITH PRE FILLED DATA FROM DB -->


?>

<div class="container">
                <form action="" method = "POST" enctype = 'multipart/form-data'>
                
                <textarea type="text" class="title" name ='Title'><?php echo $row['Title']?></textarea> <br>
                        <div class="image" style="background-image:url(' <?php echo $row['Image']; ?> ');">
                            <input type="file" name ='image' class ='blog-image' value =" <?php echo $row['Image'];?> ">
                         </div><br><br>
                        
                         <textarea type="text" class="article"  name ='blog'> <?php echo $row['Post']?> </textarea>
           
                        <select name="blog_category" id="">
                            <option value="Education"> Education</option>
                            <option value="Sports">Sports</option>
                            <option value="Music">Music</option>
                            <option value="Personal Development">Personal Development</option>

                        </select><br>
                    <input type="submit" value = "Update" name ="submit" class = 'publish'> <br><br><br>
                    <?php  

?>
    </div>
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
            
            if(!$result){
                echo 'Update failed';
            }else{?>
            <script>
            alert("updated successfully");
            </script>
            <?php
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
<?php
}
?>