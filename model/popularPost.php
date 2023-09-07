
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
            
        }
        .recent-row{
            display:flex;
            width:100%;
            justify-content:center;
            flex-wrap:wrap;
            gap:2rem;

            
            
        }
        .blog-car img{
            border-radius:  10px ;
        }
        .blog-card{
            width:300px;
            height:450px;
            overflow:hidden;
            border-radius:10px;
            /* background-color: aliceblue; */
            box-shadow: 5px  0px 5px #9b9b9b;
            justify-content:center;
            text-align:center;
            

        }
        .blog-text{
            padding: 10px;
            height:120px;
        }
        .blog-text span{
            font-weight:700;
            color:darkgray;
        }
        .blog-text a{
            text-decoration: none;
            color:black;
        }
        .blog-text a:hover{
            
            color:rgb(75, 72, 72);
            text-decoration: underline;
        }
        hr{
            border-color:aliceblue;
            opacity: 0.2;
        }
        .stats{
            display:flex;
            height:80px;
            
            align-items:center;
            justify-content:center;
            gap:2rem;
        }
        .stats div{
            display:flex;
            gap:7px;
            align-items:center;
            justify-content:center;
            height:100%;
        }
        .stats span{
            font-weight:500;
            color:darkgray;
        }
        .blog-card .blog-pic{
            height:250px;
             width:300px;
            overflow:hidden;
        }
        .blog-text{
            overflow:hidden;
        }
    
        .blog-card .pic{
            height:250px;
             width:300px;
            overflow:hidden;
            transition: .3s ;
        }
        .blog-card .pic:hover{
           height: 300px;
           width: 350px;


           /* object-fit: content; */
           /* overflow:hidden; */
           

        }
    </style>
</head>

<h2 align ='center'>Popular Posts</h2>
<br><br>
<?php
include "../controller/dbconnect.php";



$sql = "SELECT * FROM `blog_post`order by Views  Desc limit 4;";
$result = mysqli_query($conn, $sql );
$nums = mysqli_num_rows($result);

if($nums>0){
    echo "<div class ='recent-row'>";
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="blog-card">
            <div class="blog-pic">
            <img class='pic' src="<?php echo $row['Image'];?>" alt=""  >
            </div>
            <div class="blog-text">
                <span><?php echo $row['Blog_category'];?></span>
                <h4><a href="../view/readPost/read.php?Id=<?php echo $row['Id'];?>"><?php echo $row['Title'];?></a></h4>
                
                
            </div>
            <hr>
            <div class="stats">
            <div><span ><img src="../images/favorite_black_24dp.svg" alt=""> </span><span> <?php echo $row['Likes']?>  Likes</span></div>
            
            <div><span class="material-symbols-outlined">visibility</span><span> <?php echo $row['Views']?> Views</span></div>
                
                
            </div>
        </div>
        

<?php
    }
    echo "</div>";
    echo "<br>";
    echo "<br>";
}

?>
















