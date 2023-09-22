<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loggedin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    
}
    .wrapper{
        display:flex;
        height:100vh;
     
        justify-content:center;
        align-items:center;
        background: linear-gradient(30deg, rgba(215,232,244,1) 35%, rgba(103,159,195,1) 100%);
        
    }
    
    form{
      
        display:flex;
        gap:1rem;
        width:400px;
        border:1px solid white;
        /* padding:30px; */
        padding:20px 0px;
        justify-content:center;
        align-items:baseline;
        border-radius:12px;
        /* background:transparent; */
        backdrop-filter:blur(100px);
        box-shadow:0 0 30px rgba(0,0,0,.5);

        
       

    }
    .login{
        /* background-color:blue; */
        padding:0;
        
        flex-basis:70%;
        width:100%;
        height:100%;
        display:flex;
        flex-direction:column;
        justify-content:center;
       
        
        
    }
    .login input{
    font-size:20px;
    height: 40px;
    width: 100%;
    
    outline: none;
    font-size: 0.95rem;
    padding: 0 15px;
    border: 1px solid whitesmoke;
    border-radius: 3px;
    }
    .login input:focus{
        border:3px solid #0099cc;

    }
    .submit{
        color:white;
        background-color: #176dee;
        border:none;
      }
      .submit:hover{
        color:white;
        opacity: 0.3;
        border:1px solid black;

      }
    
      .signup{
        text-decoration:underline;

      }
      p{
        font-size:15px;
      }
      h3{
        font-size:30px;
      }
  </style>
</head>
<body>
    <div class="wrapper">

    <form action="" method ="POST">
      
        <div class="login">
        <h3 align='center'>Login</h3><br>
    <label for="username">Username: </label>
        <input type="text" name="Username" placeholder='Enter Username'><br>
        <label for="Pass">Password: </label>
        <input type="password" name ="Pass" placeholder ='Enter Password'><br>

        <input type="submit" value='Login' name ="submit" class='submit'><br>
        <p>Don't have an Account?  <a href="signup.php" class='signup'>Sign Up</a></p>
        
    </form>
    </div>
    </div>

    <?php
     include 'dbconnect.php';
   

    // Check User
    if(isset($_POST['submit'])){
    $username = $_POST['Username'];
    $pass = $_POST['Pass'];

    $query = "select * from user where Username = '$username'";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if($num ==1){
        $row = mysqli_fetch_assoc($result);

        // Check hash of pass with hash in db
        if(password_verify($pass,$row['Password'])){

            $_SESSION['loggedin'] =true;
           $GLOBALS['user_id'] = $row['Id'];
            $_SESSION['username']= $username;
            $_SESSION['user_id'] = $row['Id'];

            header("location:http://localhost/blogWebsite/controller/dashboard.php");
        }else{
            // Password don't Match;
            echo "Password incorrect.";
        }

    }else{
        echo "Invalid User";
    }
}
    





    ?>

</body>
</html>