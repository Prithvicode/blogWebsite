

<?php
// session start 
session_start();

if(isset($_SESSION['views']))
	$_SESSION['views'] = $_SESSION['views']+1;
else
	$_SESSION['views']=1;
	



// require navbar
include '../navbar/nav.html'; 
?>
<style>
<?php include '../navbar/style.css'; ?>
.blog-container{
    display:flex;
    width:100%;
    flex-direction:;
    align-items: start;
    gap:2rem;
}

.content{
    float:right;
    width:600px;
    
}
.blog-image {
    height: 500px;
    width:200px;
    
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

// nav for save and submit (sticky)

?>

<div class="blog-container">
  
    <div class="content">

        <h1><?php echo $row['Title']?></h1>
       

         <span><?php echo $row['Published_date']?></span>
         <br><br>
       
           <?php 
            
            echo nl2br($row["Post"]);
            ?>
            <br>
            <br>
           <form action="" method ="POST">
           <button type ='submit' name ='like'>Like</button>
           </form>
           
        
    </div>
    
    <?php if($row['Image'] !='../uploads/' ){?>
        <div class="blog-image">
        <img src="../<?php echo $row['Image']?>" height = '200px' width='250px' alt="">
        </div><?php
    }
    ?>
</div>





<?php
if (isset($_POST['like'])) {

        $like = 1;
        $likes = $like + $row['Likes'];
        $sql = "update blog_post set Likes ='".$likes."' where id=".$id;
        $result = mysqli_query($conn,$sql);
        if(!$result){
        echo "insertion failed.";
        }
}
$db_views = $row['Views'];

$views = $_SESSION['views'] + $db_views;

$sql = "update blog_post set Views ='".$views."'  where id=".$id;
$result = mysqli_query($conn,$sql);
if(!$result){
   echo "insertion failed.";
}
unset($_SESSION['views']);
session_destroy();

//require footer



?>