<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
        border:1px solid white;
        padding:10px;
        width:500px;
        height:550px;
        display:flex;
        justify-content:center;
        border-radius:20px;
        backdrop-filter:blur(100px);
        box-shadow:0 0 30px rgba(0,0,0,.5);

    }
    
    .login{
        width:70%;
        

    }
    .name{
        width:100%;
        display:flex;
        gap:1rem;
    }
    .name input{
    
        width:100%;
    }
   
     .login input{
    font-size:20px;
    height: 40px;
    width: 100%;
    margin-bottom:10px;
    
    
    
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
        margin-bottom:1rem;
      }
    </style>
</head>
<body>


    
    
<div class="wrapper">
    <form action="" method ="POST">
        <div class="login">
         <h3 align='center'>Sign Up</h3>

         <div class="name">
            <div class="fname">
            <label for="Fname">First Name: </label>
            <input type="text" name="Fname" ><br>
            </div>
            
            <div class="lname">
            <label for="Lname">Last Name: </label>
            <input type="text" name="Lname" ><br>
            </div>
        </div>

        <label for="Username">Username: </label>
        <input type="text" name="Username" ><br>

        <label for="Email">Email: </label>
        <input type="email" name="Email"><br>

        

        <label for="Pass">Password: </label>
        <input type="password" name ="Pass"><br>

        <label for="CPass">Confirm Password: </label>
        <input type="password" name ="CPass"><br><br>


        <input type="submit" value='Sign Up' name ="submit" class='submit'> 
        <p>Already Have an Account?   <a href="http://localhost/blogWebsite/controller/login.php">Log In</a></p>
    </div>

    </form>
    </div>

 <?php 
include "dbconnect.php";
//  insert data in user table
if (isset($_POST['submit'])){
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $pass = $_POST['Pass'];
    $cpass =$_POST['CPass'];

  

        // check if username already exists or not
        $query = "Select * from user where Username = '$username'"; 
        $result = mysqli_query($conn,$query );
        $user_exits = mysqli_num_rows($result);
        if($user_exits > 0){
            ?><script>alert("Username Already exits, Try Again");</script> <?php

        }else{
        
        // check confirm pass and password match:
            if ($cpass == $pass){
                // Hashing the password:
                $hash_pass = password_hash($pass,PASSWORD_DEFAULT);


                // Insert into user table.
                $query = "insert into user(First_name, Last_name, Email,Password,Username) values('$fname','$lname','$email','$hash_pass','$username')";
        
                $result = mysqli_query($conn,$query );
                if($result){
                   ?><script>alert("Sign Up successful. Login to Enter.")</script><?php
                //    header("Location:login.php");
                }
                else{
                    echo "<script>"."alert('User creation Failed')"."</script>";
                }
            }else{
                echo "<script>"."alert('Passwords do not Match.')"."</script>";
              
            }


        }

        
    }

?>


</body>
</html>