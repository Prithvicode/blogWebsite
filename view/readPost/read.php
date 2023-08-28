<?php 
// require navbar
include '../navbar/nav.html'; 
?>
<style>
<?php include '../navbar/style.css'; ?>

.blog-container{
    
}

</style>
<script>
    <?php include '../navbar/nav.js'; ?>
    // static navbar
    const nav =document.querySelector('.header');
    nav.style.position ='static';
    //hide hero section
   const hero = document.querySelector('.hero-box');
    hero.remove();

    
    
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


// nav for save and submit (sticky)

?>
//blog title

<div class="blog-container">

    <div class="blog-image">
       <?php  echo '<h1>' .$row['Title'].'</h1>'; ?>

    </div>
    <div class="blog-title">

    </div>
    <div class="blog-post">

    </div>
</div>
//blog post





<?php
//require footer



?>