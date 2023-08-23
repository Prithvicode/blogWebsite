<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method = "POST" enctype = 'multipart/form-data'>
    <input type="file" name ='image'><br>
    <input type="text" name ="Title" placeholder= "enter blog title"><br>
    <textarea name="blog" id="" cols="30" rows="10" placeholder="enter you blog...">

    </textarea><br>
    <select name="blog_category" id="">
        <option value="Education"> Education</option>
        <option value="Sports">Sports</option>
        <option value="Music">Music</option>
        <option value="Personal Development">Personal Development</option>

    </select><br>
    <input type="submit" name ="submit"><br>
   <a href="viewPost.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display Posts </button>
   <a href="myPosts.php" target ="_blank"> <button type ='button'style ="padding: 20px"> Display My Posts </button>
   
</a>
    
</form>
   
    <?php
    include 'dbconnect.php';
    session_start();

    if(isset($_POST['submit'])){
        $title = $_POST['Title'];
        $blog =$_POST['blog'];

        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../uploads/".$image;
        move_uploaded_file($temp,$folder);

        $blog_cat = $_POST['blog_category'];

        $user_id = $_SESSION['user_id'];

        $sql = "insert into blog_post(Title,Post,Image,Blog_category,Author_id) values('$title','$blog', '$folder','$blog_cat','".$user_id."');";
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