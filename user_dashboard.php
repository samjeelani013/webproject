<?php
session_start();

// Check if user is already logged in
if(!isset($_SESSION['email'])) {
    // Redirect to the dashboard page
      header("Location: index.php");
    exit; // Stop further execution
  }

?>

    <?php require_once "header.php"; ?>  
 
    <section class="user-dashboard">
        <div class="user-dashboard--header">
            <div class="container">
                <div class="row text-center" id="header">  
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px" viewBox="0,0,256,256"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M18.5,1c-0.828,0 -1.5,0.672 -1.5,1.5v6c0,0.828 0.672,1.5 1.5,1.5h13c0.828,0 1.5,-0.672 1.5,-1.5v-6c0,-0.828 -0.672,-1.5 -1.5,-1.5zM9,3c-1.654,0 -3,1.346 -3,3v38c0,1.654 1.346,3 3,3h32c1.158,0 2.16406,-0.65809 2.66406,-1.62109c0.214,-0.413 0.33594,-0.88291 0.33594,-1.37891v-38c0,-1.654 -1.346,-3 -3,-3h-6v5h4v34h-28v-34h4v-5zM31.59375,17c-0.61587,0.00013 -1.23117,0.23558 -1.70117,0.70508l-0.89453,0.89258l3.4043,3.4043c-0.003,0.002 0.89258,-0.89453 0.89258,-0.89453c0.94,-0.94 0.94095,-2.46334 0.00195,-3.40234c-0.4705,-0.47 -1.08725,-0.7052 -1.70312,-0.70508zM27.58789,20.00391l-10.88086,10.90234l-0.68555,3.50781c-0.068,0.348 0.23889,0.65589 0.58789,0.58789l3.50781,-0.6875l10.87891,-10.90234z"></path></g></g></svg>
                        <h3><span>Workify  </span>- Work Management System</h3> 
                    <div class="col-md-12 tex-center">
                        <ul> 
                        <li> <i class="fa-regular fa-envelope"></i> Email: <small><?php echo $_SESSION['email']; ?></small></li>
                        <li> <i class="fa-regular fa-user"></i> Name: <small><?php echo $_SESSION['name'];  ?></small></li>  
                        </ul>
                    </div>
                </div>  
        </div>
     </div> 
       
    <div class="user-dashboard--body"> 
    <div class="container p-0">
    <div class="row">
            <div class="col-md-2" id="left_sidebar"> 
                <ul>
                    <li> <a href="user_dashboard.php" class="logout_link" type="button" ><i class="fa-solid fa-table-columns"></i>Dashboard</a>  </li>
                           
                    <li>  <a  class="link" type="button" id="manage_task"><i class="fa-solid fa-list-check"></i>Update Work Task</a>  </li>
                    
                    <li>     <a href="logout.php" class="logout_link" type="button" ><i class="fa-solid fa-right-from-bracket"></i>Logout</a>  </li>
                    
                </ul>            
            </div>  
            <div class="col-md-10" id="right_sidebar">
                <div class="row">
                <div class="col-md-6">
                <img src="images/frame.png" alt="">
                </div>
                <div class="col-md-6">
                <h4>Instructions for Users</h4>
                <ul>    
                    <li>Should present daily</li>
                    <li>You must complete a task that is assigned to you.</li>
                    <li>If you want to leave, then contact a manager.</li>

                </ul>
                </div>
                </div>
            </div>
    </div>
    </div>
    </section>

<?php require_once "footer.php"; ?> 
  <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });

        });
 </script> 