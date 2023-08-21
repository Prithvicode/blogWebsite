<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method ="POST">
    <label for="username">Username: </label>
        <input type="text" name="Username"><br>

        <label for="Pass">Password: </label>
        <input type="password" name ="Pass"><br>

        <input type="submit" name ="submit">
        <p>Dont have an Account?</p>
        <a href="signup.php"><button type='button'>Sign Up</button></a>
    </form>

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

            // Session start
            session_start();
            $_SESSION['loggedin'] =true;
            $_SESSION['username']= $username;

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