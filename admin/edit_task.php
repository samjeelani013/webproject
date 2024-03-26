<?php
  include('../connection.php');
  if(isset($_POST['edit_task'])){
    $query="update tasks set uid=$_POST[id],description= '$_POST[description]', start_date = '$_POST[start_date]', end_date = '$_POST[end_date]' where tid = $_GET[id]";
    $query_run=mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task Updated Successfully!');
        window.location.href='admin_dashboard.php';
        </script>
        ";
    }  
    else{
        echo "<script type='text/javascript'>
        alert('Error, Please Check the Code Again!');
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
    <title>WMS</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-4 m-auto"><br>
            <h3>Edit the Task</h3><br>
            <?php
          
$query="select * from tasks where tid= $_GET[id]";
$query_run=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($query_run)){
    ?>
          <form action="" method="post">
<div class="form-group">
    <input type="hidden" name="id" id="" class="form-control" value="" required>
</div>
<div class="form-group">
    <label for="">Select User:</label>
    <select name="id" id="" class="form-control" required>
        <option value="">-Select-</option>
        <?php

$query1="select uid,name from users";
$query_run1=mysqli_query($connection, $query1);
if(mysqli_num_rows($query_run1)){
    while($row1=mysqli_fetch_assoc($query_run1)){
        ?>
        <option value="<?php echo $row1['uid']; ?>"><?php echo $row1['name'];  ?></option>
        <?php
    }
}
        ?>

    </select>
</div><br>
<div class="form-group">
    <label for="">Description of a Task:</label>
    <textarea class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
</div>
<div class="form-group">
    <label for="">Start Date:</label>
    <input type="date" name="start_date" id="" class="form-control" value="<?php echo $row['start_date']; ?>" required>
</div>
<div class="form-group">
    <label for="">End Date:</label>
    <input type="date" name="end_date" id="" class="form-control" value="<?php echo $row['end_date']; ?>" required>
</div>
<input type="submit" name="edit_task" id="" class="btn btn-warning" value="Update">
            </form>
            <?php
}
?>
        </div>
    </div>
</body>
</html>