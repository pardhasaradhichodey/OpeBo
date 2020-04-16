<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OpeBo";
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Database Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>OpeBo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/styles.css" rel="stylesheet">
        <script>
            function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  /*x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;*/
  var lat1=position.coords.latitude;
  var long1=position.coords.longitude;
  var myElement = document.getElementById("selec");
  var data={
      lat:lat1,
      long:long1
  };
  //$.post("test.php",data);
  window.location.href = "test.php?lat=" + lat1 + "&&long=" + long1+"&&id="+myElement.innerHTML;

}
        </script>
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
                    <p id="selec" style="display:none;"><?php echo $_GET['id'] ?></p>
                </div>
                <div class="col-12">
                    <button onclick="getLocation()">Find a Service Person for you</button>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</html>