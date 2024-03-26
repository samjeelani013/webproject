<?php
  include('connection.php');
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query="update tasks set status= '$status' where tid = $id";
    $query_run=mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Status Updated Successfully!');
        window.location.href='user_dashboard.php';
        </script>";
    }  
    else{
        echo "<script type='text/javascript'>
        alert('Error, Please Check the Code Again!');
        window.location.href='user_dashboard.php';
        </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS</title> 
    <?php require_once "header.php"; ?>
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-4 m-auto"><br>
            <h3>Update the Task</h3><br>
            <?php
            $id = $_GET['id'];

            $query="select * from tasks where tid= $id";
            $query_run=mysqli_query($connection, $query);
            while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['tid']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="">-Select-</option>
                        <option value="Pending" <?php if($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Complete" <?php if($row['status'] == 'Complete') echo 'selected'; ?>>Complete</option>
                    </select>
                </div><br>
                <input type="submit" name="update" class="btn btn-warning" value="Update">
            </form>
            <?php
            }
            ?>
        </div>
    </div>
    <?php require_once "footer.php"; ?> 
</body>
</html>
