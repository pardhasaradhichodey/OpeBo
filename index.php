<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "OpeBo";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Database Connection failed: " . $conn->connect_error);
}
$sql="select * from services";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) { 
    
?>
<!DOCTYPE html>
<html>
<head>
<title>OpeBo</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="css/styles.css" rel="stylesheet">
<script>
    function MyFunc(){
        alert('Please Log In');
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
                            <a data-toggle="modal" data-target="#loginModal">
                            <span class="fa fa-sign-in"></span> Login</a>
                        </span>
            </div>
            
        </div>
    </nav>
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="testing.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                    <input type="email" class="form-control form-control-sm mr-1" name="email" id="exampleInputEmail3" placeholder="Enter email">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control form-control-sm mr-1" name="pass" id="exampleInputPassword3" placeholder="Password">
                            </div>
                            
                        </div>
                        <div class="form-row">
                            
                            <input type="submit" class="btn btn-primary btn-sm ml-1">        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
     if(isset($_POST['form_submitted'])){
        $sql1="select * from users where Email='".$_POST['email']."' AND password='".$_POST['pass']."'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) { 
            echo "<h1>Login Failed</h1>";
            while($row1 = mysqli_fetch_assoc($result1)) {
            $session['email']=$row1['Email'];
            $session['name']=$row1['Name'];
            ?><script>alert('Hi');</script><?php
            header("Location: index-loggedin.php");
        }
        }
        else{
            echo "<h1>Login Failed</h1>";
        }

     }
    ?>
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
        <?php
            $i=0;
            while($row = mysqli_fetch_assoc($result)) {
                $temp="SelectedWork.php?id=".$row['id'];
                if($i%3==0){

        ?>
        <div class="row row-content">
            
            <div class="col-12 col-sm-4">
            <button OnClick="MyFunc()"  class="bg-primary links">
                <div class="card bg-primary">
                    <div class="card-title"><h3 class="links"><?php echo $row['Name'] ?></h3></div>
                    <div class="card-body"></div>
                </div>
                </button>
            </div>
            
        <?php 
            }
            else if($i%3==2){
        ?>
            
            <div class="col-12 col-sm-4">
            <button OnClick="MyFunc()"  class="bg-primary links">
                <div class="card bg-primary">
                    <div class="card-title"><h3 class="links"><?php echo $row['Name'] ?></h3></div>
                    <div class="card-body"></div>
                </div>
            </button>
            </div>
            </div>
        <?php
            }
            else{
        ?>
        <div class="col-12 col-sm-4">
        <button OnClick="MyFunc()"  class="bg-primary links">
                <div class="card bg-primary">
                    <div class="card-title"><h3 class="links"><?php echo $row['Name'] ?></h3></div>
                    <div class="card-body"></div>
                </div>
            </button>
            </div>
        <?php
            }
        $i++;
        }
        }
        ?>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>