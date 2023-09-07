

    <style>
        body{
            position:relative;
        }
    </style>
</head>
<body>
    

    <?php 
    session_start();
    if(( !isset($_SESSION['loggedin'] ) )){
        //navbar 
        require '../view/navbar/nav.html';

        //hero
        require '../view/hero/hero.html';
        
    }else{
        //navbar 
        require '../view/navbar/logNav.html';
    }
         
        

         //Popular Posts
         require '../model/popularPost.php';
         
         //recent posts
         require '../model/recentPost.php';
         ?>
         
    <style>
        /* nabar Css */
        <?php include '../view/navbar/style.css'; ?>
    </style> 
    <script>
        // navbar Js
        <?php include '../view/navbar/nav.js'; ?>
    </script>




<a href="blog.php"><button type ='button'>Write Blog</button></a><br>
<a href="logout.php"><button>Log Out</button></a>

</body>


