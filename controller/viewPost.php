

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/readPost/style.css">
    <!-- fav-icon -- -- -->
    <link rel="shortcut icon " href="images/fav-icon.svg">

    <!-- poppins ------------------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    
    

    <!-- BLog Section -->

    <section id ="blog">

        <!-- heading -->
        <div class="blog-heading">
            <span>My recent Posts</span>
            <h3>My Blogs</h3>
        </div>

        <!--========== PHP to select blogs from database=====================================-->
        <?php
        include 'dbconnect.php';
        session_start();
        
        $user_id = $_SESSION['user_id'];

        $sql = "select * from blog_post where Author_id = $user_id";
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num >0 ){

        echo "<div class='blog-container'>";

            
            
                while($row =mysqli_fetch_assoc($result))
                {
                    echo "<div class='blog-box'>";

                        echo '<div class="blog-img">';
                            echo "<img src=".$row['Image'] ." alt='Blog' height ='400px'>";
                        echo "</div>";

                        echo '<div class="blog-text">';
                            echo "<span>" .$row['Published_date']."</span>";
                            echo '<a href="#" class="blog-title">'.$row["Title"].'</a>';
                            echo '<p>'. $row['Post'].'</p>';
                            ?>
                            
                            <?php
                        //    echo '<a href="./dashboard.php" class ="button" target="_blank">Read More'.'</a>';

                        echo '</div>';
                    echo '</div>';


        
            
             }    
            ?></div>
            <?php
            }
            ?>
            <button></button>
        
    </section>
</body>
</html>