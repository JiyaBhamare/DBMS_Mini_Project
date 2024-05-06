<?php
$servername="localhost";
$username="root";
$password="";
$dbname="registrationform";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
 echo "Connection ok";
}
else{
    echo "Connection failed".mysqli_connect_error();
}

?>