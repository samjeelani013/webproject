<?php
session_start();
include('connection.php');
?>
 
    <?php require_once "header.php"; ?>
  
    <center><h3>Your Tasks</h3></center>
    <table class="table">
<tr>
    <th>S.No</th>
    <th>Task ID</th>
    <th>Description</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php
$query="select * from tasks where uid = $_SESSION[uid]";
$sno=1;
$query_run=mysqli_query($connection, $query);
while($row=mysqli_fetch_assoc($query_run)){
    ?>
    <tr>
        <td><?php echo $sno; ?></td>
        <td><?php echo $row['tid']; ?> </td>
        <td><?php echo $row['description']; ?> </td>
        <td><?php echo $row['start_date']; ?> </td>
        <td><?php echo $row['end_date']; ?> </td>
        <td><?php echo $row['status']; ?> </td>
        <td><a href="update_status.php?id=<?php echo $row['tid'];  ?>" style="color: #062D28">Update</a> </td>
    </tr>
    <?php
    $sno=$sno+1;
}


?>
    </table>
    <?php require_once "footer.php"; ?> 
 