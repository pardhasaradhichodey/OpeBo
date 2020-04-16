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

$lati1=$_GET['lat'];
$longi1=$_GET['long'];
//echo $lat1;
//echo "hello world";
//echo $_GET['id'];
$sql="select * from workers where serviceid=".$_GET['id'];
$result = mysqli_query($conn, $sql);
$temp=0.5;
$rate=0;
if (mysqli_num_rows($result) > 0) { 
    while($row = mysqli_fetch_assoc($result)) {
    $lat1=$lati1/ (180/M_PI);
    $lat2=$row['latitude']/ (180/M_PI);
    $long1=$longi1/ (180/M_PI);
    $long2=$row['longitude']/ (180/M_PI);

$d = 3963.0 * acos((sin($lat1) * sin($lat2)) + cos($lat1) * cos($lat2) * cos($long2-$long1));

?>

<!DOCTYPE html>
<html>
    <head>
    <title>OpeBo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-dark navbar-expand-sm  fixed-top">
        <div class="container">
                
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="#"><img src="img/logo.png" height="30" width="41"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home"></span> Home</a></li>
                    </ul>
                    <span class="navbar-text">
                            <a>
                            <span class="fa fa-user"></span><?php echo $_SESSION['name']; ?></a>
                        </span>
                    <span class="navbar-text">
                            <a href="logout.php">
                            <span class="fa fa-sign-in"></span> LogOut</a>
                        </span>
            </div>
            
        </div>
    </nav>
    <header class="headpart">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-9">
                    <h1>OpeBo</h1>
                    <p align="justify">We are aimed at providing jobs and removing corruption across the globe. We are primarily involved in supplying manpower as and when required. OpeBo Industries Limited values and nurtures every skill set that mankind may possess. The skills and knowledge acquired by a plumber are as important to us as that of a doctor. We aim at utilizing these skills to provide comfort to our customers. We've dived into the pool of skills and have already employed plumbers, drivers, electricians, beauticians, cook and security guards. We are moving towards employing doctors, event managers, engineers, priests, house-maids and so on.</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                        <img src="img/logo.png" class="img-fluid">
    
                    </div>
                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row row-content">
            <div class="col-12">
            <?php
                if($d<0.5){
                    $worker=$row['id'];
                    $user=$_SESSION['email'];
                    $sql0="INSERT INTO orders (CustumerId, workerId) VALUES ('".$user."',".$worker.")";
                    $result = mysqli_query($conn, $sql0);
                    if($result){
                        echo nl2br("<h3>You are assigned with Our Executive</h3>\n");
                        echo "<h4>".$row['name']."</h4>";
                        echo "<i class='fa fa-phone'></i><h4>".$row['phone']."</h4>";
                    }
                break;
                }
                else{
                    echo "NO Executives Available in your Location";
                }
            }
        }
        else{
            echo "New Service. Under Recruitment";
        }
?>
            </div>
        </div>
    </div>
    </body>
</html>