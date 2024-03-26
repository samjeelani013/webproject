<?php
session_start();

if(isset($_SESSION['email'])) {
 
    header("Location: admin_dashboard.php");
    exit; 
}

include("../connection.php");

if(isset($_POST['adminLogin'])){
   $query="select email,password,name from admins where email='$_POST[email]' AND password='$_POST[password]'";
   $query_run=mysqli_query($connection, $query);
   if(mysqli_num_rows($query_run)){
    while($row=mysqli_fetch_assoc($query_run)){
     $_SESSION['email']=$row['email'];
     $_SESSION['name']=$row['name'];
     $_SESSION['is_admin'] = true;
    }
    echo "<script type='text/javascript'>
    window.location.href='admin_dashboard.php';
    </script>
    ";
   }
   else{
    echo "<script type='text/javascript'>
alert('Please Enter Correct Details!');
window.location.href='admin_login.php';
</script>
";
   }}
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
<div class="col-md-4 m-auto" id="login_home_page">
    <center><h3>Admin Login</h3></center><br>
    <form action="" method="post">
        <div class="form-group">
            <input type="email" name="email" id="" class="form-control" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password" required>
        </div>
        <div class="form-group">
            <input type="submit" name="adminLogin" value="Login" id="" class="btn btn-warning">
        </div>
    </form>
    <center><a href="../index.php" class="btn btn-success">Back to Home</a></center>
</div>
   </div>
</body>
</html>