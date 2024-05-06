<?php 
include("connection.php");
$id=$_GET['id'];

$query = "Delete from form where id = '$id'";
$data=mysqli_query($conn,$query);

if($data)
{
    echo "<script>alert('Record deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/CRUD/display.php" />
    <?php 
}else{
    echo "failed to delete";
}
?>