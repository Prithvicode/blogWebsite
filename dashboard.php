


<?php
include 'dbconnect.php';

$sql = "select * from blog_post";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);


while($row =mysqli_fetch_assoc($result)){

    echo "<div>";
    echo "<h3>" .$row['Title']."</h3>";
    echo "<p>" .$row['Post']."</p>";
    echo "</div>";

}





?>