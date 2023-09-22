
<?php
// session start 
session_start();

if(isset($_SESSION['views']))
	$_SESSION['views'] = $_SESSION['views']+1;
else
	$_SESSION['views']=1;
	



// require navbar
if(isset( $_SESSION['user_id'])){
    include '../navbar/logNav.php'; 
}
else{
    include '../navbar/nav.html'; 
}

?>
<style>
<?php include '../navbar/style.css'; ?>

h1{
    font-size:40px;
    font-weight:600;

}
.blog-container{
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    padding:1rem;
}
.content{
    display:flex;
    flex-direction:column;
    justify-content:center;
    gap:1rem;
    width:700px;
    flex-wrap :wrap;
}
.blog-image {
    height: 400px;
    width:500px;
    border:1px solid black;
    overflow:hidden;
}

.blog-image img{
    width:500px;
    height:400px;
    object-fit:cover;
    
}
.like-button {
            background-color: #3498db; /* Button background color */
            color: #fff; /* Text color */
            border: none; /* Remove the button border */
            padding: 10px 20px; /* Padding inside the button */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Change cursor to a pointer on hover */
        }

        /* Style for the like button when hovered */
.like-button:hover {
            background-color: #2980b9; /* Change background color on hover */
        }

        .liked{
            display:none;
        }
    
        .article{
         
            font-weight: 400;
        }
        

</style>
<script>
    <?php 
   
    include '../navbar/nav.js'; 
    ?>
    // static navbar
    // const nav =document.querySelector('.header');
    // nav.style.position ='static';
    //hide hero section
//    const hero = document.querySelector('.hero-box');
//     hero.remove();

    //like button
   var like_value = 0;
    function like(){
       like_value = 1;
        
    }

   

</script>



<?php
include '../../controller/dbconnect.php';
$id = $_GET['Id'];
$sql = "select * from blog_post where Id =".$id;

$result = mysqli_query($conn, $sql);

$nums = mysqli_num_rows($result);
if($nums> 0){
    $row = mysqli_fetch_assoc($result);
    
}

//author info
$sql2 = "select * from user where Id =".$row['Author_id'];

$result2 = mysqli_query($conn, $sql2);

$nums = mysqli_num_rows($result2);
if($nums> 0){
    $auth = mysqli_fetch_assoc($result2);
    
}
// nav for save and submit (sticky)

?>

<div class="blog-container">
    <div class="author">
       
    </div>
  
    <div class="content">

        <h1><?php echo $row['Title']?></h1>
        <hr>  
         <span><?php echo $row['Published_date']?></span>
         <span>Published by: <?php echo $auth['First_name']."  ". $auth['Last_name']?></span>
         <hr>
         
       
         <!-- Blog image -->
         <?php if($row['Image'] !='../uploads/' ){?>
            <div class="blog-image">
            <img src="../<?php echo $row['Image']?>" alt="">
            </div><?php
        }
        ?>
            <!-- BLog post -->
            <p class='article'>
           <?php 
            echo nl2br($row["Post"]);
            ?>
            </p>
            <br>
            <br>
           <form action="" method ="POST">
           <button type ='submit' name ='like' class='like-button' >Like</button> <p class="liked">You liked this.</p>
           </form>
           
        
    </div>
    <script>

</script>
    
    
</div>



<?php
if (isset($_POST['like'])) {

        $like = 1;
        $likes = $like + $row['Likes'];
        $sql = "update blog_post set Likes ='".$likes."' where id=".$id;
        $result = mysqli_query($conn,$sql);
        if(!$result){
        echo "insertion failed.";
        }else{?>
            <style>
            .liked{
                display:inline;
            }
            </style>
     <?php   }
        
}
$db_views = $row['Views'];

$views = $_SESSION['views'] + $db_views;

$sql = "update blog_post set Views ='".$views."'  where id=".$id;
$result = mysqli_query($conn,$sql);
if(!$result){
   echo "insertion failed.";
}
unset($_SESSION['views']);


//require footer



?>
