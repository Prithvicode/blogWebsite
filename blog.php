<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method = "POST">
    <input type="text" name ="Title" placeholder= "enter blog title"><br>
    <textarea name="blog" id="" cols="30" rows="10" placeholder="enter you blog...">

    </textarea><br>
    <input type="submit" name ="submit">
   <a href="http://localhost/blogWebsite/dashboard.php" target ="_blank"> <button style ="padding: 20px"> Display Posts </button>
</a>
    
</form>
   
    <?php
    include 'dbconnect.php';
    if(isset($_POST['submit'])){
        $title = $_POST['Title'];
        $blog =$_POST['blog'];

        $sql = "insert into blog_post(Title,Post,Published_date) values('$title','$blog','2023-09-09');";
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