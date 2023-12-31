

<!-- $user_id = $_SESSION['user_id']; -->
<?php
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    echo"no session id";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/style.css">
    <!-- fav-icon -- -- -->
    <link rel="shortcut icon " href="images/fav-icon.svg">

    <!-- poppins ------------------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>
    .blog-container{
        display:flex;
        flex-direction:column;
        
        
    }
    .blog-box{
        display:flex;
        width:800px;
        height:300px;
        padding:0 1rem;
        flex-direction:row-reverse;

    }
    .tools{
        width:100%;
        display:flex;
        justify-content: flex-start;
        margin-top:1rem;
        gap:1rem;

    }
    .blog-img{
        flex-basis:30%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .blog-img img{

        height:200px;
    }
    
    .blog-text{
        flex-basis:80%;
        
    }
    .tools button{
        width:100px;
        height:40px;
        border-radius:8px;
        border: 1px solid;
        transition: 0.3s;
    }

    #edit{
        border: 1px solid #008CBA;
        background-color:white;

        
    }
    #edit:hover{
        background-color:#008CBA;
    }
    #delete{
        border: 1px solid #f44336;
        background-color:white;
       
    }
    #delete:hover{
        background-color:#f44336;
    }
    .blog-text{
        overflow:hidden;
    }
  
    <?php require '../view/navbar/style.css'?>
</style>
<script>
    <?php include '../view/navbar/nav.js'; ?>
    // static navbar
    const nav =document.querySelector('.header');
    nav.style.position ='static';
  

</script> 

</head>
<body>
    <?php require "../view/navbar/logNav.php";?>

    <!-- BLog Section -->

    <section id ="blog">

        <!-- heading -->
        <div class="blog-heading">
            
            <h3>My Blogs</h3>
        </div>

        <!--========== PHP to select blogs from database=====================================-->
        <?php
        include 'dbconnect.php';
     
        $sql = "select * from blog_post where Author_id =".$user_id;
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num >0 ){

        echo "<div class='blog-container'>";
            
                while($row =mysqli_fetch_assoc($result))
                {
                    echo "<div class='blog-box' name ='".$row['Id']."'>";
                        //variable for blog_id
                        
                        echo '<div class="blog-img">';
                            echo "<img src=".$row['Image'] ." alt='Blog' >";
                        echo "</div>";

                        echo '<div class="blog-text">';
                            echo "<span>" .$row['Published_date']."</span>";
                            echo '<a href="http://localhost/blogWebsite/view/readPost/read.php?Id='.$row['Id'].'" class="blog-title">'.$row["Title"].'</a>';
                            echo '<p>'. $row['Post'].'</p>';
                            echo '<a href="../view/readPost/read.php?Id='.$row['Id'].'">Read More'.'</a>';
                            echo "<div class ='tools'>";
                            echo '<a href="../model/update.php?Id='.$row['Id'].'"><button type ="button" id="edit">Edit</button></a>';
                            echo '<a href="../model/delete.php?Id='.$row['Id'].'"><button type ="button" id= "delete">Delete</button></a>';
                            echo "</div>";

                        echo '</div>';
                    echo '</div>';

        
            
             }    
            ?></div>
            <?php
        }
            ?>
        
    </section>
</body>
</html>