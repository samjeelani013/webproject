<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h3>Create a New Task</h3><br>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
<div class="form group">
    <label for="">Select User:</label>
    <select name="id" id="" class="form-control">
        <option value="">-Select-</option>
        <?php
include('../connection.php');
$query="select uid,name from users";
$query_run=mysqli_query($connection, $query);
if(mysqli_num_rows($query_run)){
    while($row=mysqli_fetch_assoc($query_run)){
        ?>
        <option value="<?php echo $row['uid']; ?>"><?php echo $row['name'];  ?></option>
        <?php
    }
}
        ?>

    </select>
</div><br>
<div class="form-group">
    <label for="">Description of a Task:</label>
    <textarea class="form-control" name="description" placeholder="Write a task for the user" id="" cols="50" rows="3"></textarea>
</div>
<div class="form-group">
    <label for="">Start Date:</label>
    <input type="date" name="start_date" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">End Date:</label>
    <input type="date" name="end_date" id="" class="form-control">
</div>
<input type="submit" name="create_task" id="" class="btn btn-warning" value="Create">
            </form>
        </div>
    </div>
</body>
</html>