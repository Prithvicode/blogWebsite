<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Sign up</h3><br>
    

    <form action="" method ="POST">
        <label for="Fname">First Name: </label>
        <input type="text" name="Fname" ><br>
        
        <label for="Lname">Last Name: </label>
        <input type="text" name="Lname" ><br>

        <label for="Username">Username: </label>
        <input type="text" name="Username" ><br>

        <label for="Email">Email: </label>
        <input type="email" name="Email"><br>

        

        <label for="Pass">Password: </label>
        <input type="password" name ="Pass"><br>

        <label for="CPass">Confirm Password: </label>
        <input type="password" name ="CPass"><br>


        <input type="submit" name ="submit"> <br>
        <p>Already Have an Account? </p>
        <a href="http://localhost/blogWebsite/controller/login.php"><button type ='button'>Log In</button></a>

    </form>


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
            echo "Username Already exits, Try Again";

        }else{
        
        // check confirm pass and password match:
            if ($cpass == $pass){
                // Hashing the password:
                $hash_pass = password_hash($pass,PASSWORD_DEFAULT);


                // Insert into user table.
                $query = "insert into user(First_name, Last_name, Email,Password,Username) values('$fname','$lname','$email','$hash_pass','$username')";
        
                $result = mysqli_query($conn,$query );
                if($result){
                    echo "Successfully inserted user";
                }
                else{
                    echo "User creation Failed";
                }
            }else{
                echo "Passwords do not Match.";
            }


        }

        
    }

?>


</body>
</html>