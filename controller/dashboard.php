

    <style>
        body{
            position:relative;
            padding:2rem;
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
        require '../view/navbar/logNav.php';
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


    <?php
    // footer
    include '../view/footer/footer.html';
    ?>
    <script>
        // navbar Js
        <?php include '../view/navbar/nav.js'; ?>
    </script>




</body>


