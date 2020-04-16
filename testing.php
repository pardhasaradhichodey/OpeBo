<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OpeBo";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if ($conn->connect_error) {
die("Database Connection failed: " . $conn->connect_error);
}
$sql1="select * from users where Email='".$_POST['email']."' AND password='".$_POST['pass']."'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) { 
            while($row1 = mysqli_fetch_assoc($result1)) {
            $_SESSION['email']=$row1['Email'];
            $_SESSION['name']=$row1['Name'];
            header("Location: index-loggedin.php");
        }
        }
        else{
            echo "<h1>Login Failed</h1>";
        }

     
    ?>