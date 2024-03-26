<?php
session_start();


if(!isset($_SESSION['email'])) {

    header("Location: index.php");
  exit; 
}

include('../connection.php');
if(isset($_POST['create_task'])){
    $query="insert into tasks values(null, '$_POST[id]', '$_POST[description]', '$_POST[start_date]','$_POST[end_date]', 'Not Started')";
    $query_run= mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task Created Successfully!');
        window.location.href='admin_dashboard.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error, Try Again!');
        window.location.href='admin_dashboard.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS | Admin Dashboard</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="style.css">
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });

            $("#manage_task").click(function(event){
                event.preventDefault();
                $("#right_sidebar").load("manage_task.php");
            });
        });
    </script>
    <style>
    #header {
        /* border-bottom: 2px solid #ccc; */
        padding-bottom: 20px;
        /* margin-bottom: 20px; */
        padding-top: 20px;
        text-align: center;
       
    }

    #header h3,
    #header span {
        display: inline-block;
        border: 0px solid #ccc;
        padding: 5px 10px;
        margin-left: 0px;
        font-family: Arial, Helvetica, sans-serif;
    }

    #header h3 {
        margin-right: 10px;
    }

    #header span {
        margin-left:
    }
    #right_sidebar img{
        float: right;
    }

    .sidebar-container {
        display: flex;
        margin-top: 25px;
    }

    #left_sidebar,
    #right_sidebar {
        /* border: 0px solid #ccc; */
        padding: 10px;
        flex: 1;
    }

    #left_sidebar {
        margin-right: 50px;
        background-color:#00c987; height:100vh;
    }
    #left_sidebar table tr td a i {
        font-size: 15px;
  display: inline-block;
  margin-right: 10px !important;
  color: #000;
    }
    h4 {
        margin-bottom: 20px;
    }

    svg {
        font-size: 25px;
  display: inline-block;
  margin-right: 10px !important;
  color: #00c987;
    }
</style>
</head>
<body>
    <div class="row" id="header" style="background-color: #062D28; color: white;">
        <div class="col-md-12">
            <h3 style="color: #00c987">Workify</h3>
            <div class="col-md-4" style="display:inline-block;">
                <h3>Admin Dashboard</h3>
            </div>
            <div class="col-md-6" style="display:inline-block; text-align: right;">
                <b>Email:</b> <?php echo $_SESSION['email']; ?>
                <span style="margin-left:25px;"> <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" id="left_sidebar" >
            <table class="table" style="border-color: transparent;">
                <tr>
                    <td style="text-align:center; border:none;">
                        <a href="admin_dashboard.php" class="logout_link" type="button" style="color: black; text-decoration:none;"><i class="fa-solid fa-table-columns" class="svg"></i>Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; border:none;">
                        <a class="link" id="create_task" type="button" style="color: black; text-decoration:none;"><i class="fa-solid fa-plus"></i>Create Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; border:none;">
                        <a href="manage_task.php" class="link" id="manage_task" type="button" style="color: black; text-decoration:none;"><i class="fa-solid fa-list-check"></i>Manage Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; border:none;">
                        <a href="../logout.php" id="logout_link" type="button" style="color: black; text-decoration:none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                    </td>
                </tr>
            </table>
        </div>

        <!-- <div class="col-md-2" id="left_sidebar"> 
            <ul>
                <li> <a href="admin_dashboard.php" class="logout_link" type="button" ><i class="fa-solid fa-table-columns"></i>Dashboard</a>  </li>
                <li>  <a  class="link" type="button" id="create_task"><i class="fa-solid fa-list-check"></i>Create Task</a>  </li>       
                <li>  <a  class="link" type="button" id="manage_task"><i class="fa-solid fa-list-check"></i>Create Task</a>  </li>
                
                <li>     <a href="logout.php" class="logout_link" type="button" ><i class="fa-solid fa-right-from-bracket"></i>Logout</a>  </li>                
            </ul>            
        </div>   -->

        <div class="col-md-10" id="right_sidebar" style="margin-top:25px;">
        <img src="../images/frame.png" alt="">
            <h4>Instructions for Admin</h4>
            <ul>
                <li>1. Should check daily</li>
                <li>2. Must assign a task to user</li>
                <li>3. If you want to leave, then contact a manager.</li>
            </ul>
        </div>
    </div>
</body>
</html>
