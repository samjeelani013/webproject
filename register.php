<?php
include("connection.php");

if(isset($_POST['userRegistration'])){

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
    $query = "INSERT INTO users (name, email, password, mobile) VALUES ('$name', '$email', '$password', '$mobile')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        echo "<script type='text/javascript'>
        alert('User Registered Successfully');
        window.location.href='index.php';
        </script>";
    } else{
        echo "<script type='text/javascript'>
        alert('ERROR, Try Again!');
        window.location.href='register.php';
        </script>";
    }
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS | Admin Login</title>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha384-wqHuluqQIAqAMyw53S2c8ukBXzGkQokDNwsOYoRugOMn4I1pWxPKJjcsxNLMqNMC" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Il2QyVVxEa3fVWtTGIFjHAOMjjLMwWCVs1kVzHdVkP0C2zRLpEtxuV/XeYBChA7z" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="self" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="self" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
   <div class="row">
       <div class="col-md-4 m-auto" id="register_home_page">
           <center><h3>User Registration</h3></center><br>
           <form action="" method="post">
               <div class="form-group">
                   <input type="text" name="name" id="" class="form-control" placeholder="Enter Your Name" required>
               </div>
               <div class="form-group">
                   <input type="email" name="email" id="" class="form-control" placeholder="Enter Your Email" required>
               </div>
               <div class="form-group">
                   <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password" required>
               </div>
               <div class="form-group">
                   <input type="text" name="mobile" class="form-control" id="" placeholder="Enter Your Mobile Number">
               </div>
               <div class="form-group">
                   <input type="submit" name="userRegistration" value="Register" id="" class="btn btn-warning">
               </div>
           </form>
           <center><a href="index.php" class="btn btn-success">Back to Home</a></center>
           </div>
   </div>
</body>
</html>

