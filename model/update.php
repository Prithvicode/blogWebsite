<html>
<body>
        
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
    <input type="file" name ='image' src="<?php echo $row['Image']?>"><br>
    <input type="text" name ="Title" placeholder= "enter blog title"value ="<?php echo $row['Title']?>"><br>
    <textarea name="blog" id="" cols="30" rows="10" placeholder="enter you blog..." >
    <?php echo $row['Post']?>
    </textarea><br>
    <!-- default blog_category can be change w -->
    <select name="blog_category" id="blog_cat">

        <option value="Education"> Education</option>
        <option value="Sports">Sports</option>
        <option value="Music">Music</option>
        <option value="Personal Development">Personal Development</option>

    </select><br>

    
    <input type="submit" name ="submit"><br>
   <a href="viewPost.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display Posts </button>
   <a href="http://localhost/blogWebsite/controller/myPosts.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display My Posts </button>
   
</a>
    
</form>
   
    <?php
    include '../controller/dbconnect.php';
   
    if(isset($_POST['submit'])){
        $title = $_POST['Title'];
        $blog =$_POST['blog'];

        $blog_cat = $_POST['blog_category'];
        $blog_id = $_GET['Id'];

        if(isset($_POST['image'])){

        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../uploads/".$image;
        move_uploaded_file($temp,$folder);
        $sql = "update blog_post set Title = '$title' ,Post ='$blog',Image = '$folder', Blog_category = '$blog_cat' where Id = $blog_id ;";

        }else{

        // -----------------------UPDATE QUERY---------------------------------------------------------->

        $sql = "update blog_post set Title = '$title' ,Post ='$blog', Blog_category = '$blog_cat'where Id = $blog_id ;";
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