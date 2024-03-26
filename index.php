 
<?php
session_start();
// Check if user is already logged in
if(isset($_SESSION['email'])) {
  // Redirect to the dashboard page

  if(isset($_SESSION['is_admin'])) {
    header("Location: admin_dashboard.php");
  } else {
    header("Location: user_dashboard.php");
  }
  exit; // Stop further execution
}

 require_once "header.php"; 
 
 ?> 
   <section class="login-screen">
<div class="container centered-container">
    <img src="images/logofinal.png" alt="Logo" class="logo">
</div> 
   <h1>Presenting You Our <span>Workify </span> For Your Company</h1> 
<div class="container d-flex justify-content-center align-items-center">
  <div class="card border shadow rounded-lg w-md-50" >
    <div class="card-header text-center bg-primary text-white">
      <h4>Choose From Following</h4>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-center">
        <a href="user_login.php" class="btn btn-success m-2">Login</a>
        <a href="register.php" class="btn btn-dark m-2">Registration</a>
        <a href="admin/admin_login.php" class="btn btn-danger m-2">Admin Login</a>
      </div>
    </div>
  </div>
</div>

</section>
    <?php require_once "footer.php"; ?> 
 
