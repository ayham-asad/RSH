<?php
session_start();
include 'connection.php';

$com = "completed";
$pen = "Pending";


$id = $_GET['updateid'];

$query = "SELECT * FROM fixtickets WHERE ticket_id =$id";
$result= mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$tstatus = $row['status'];

if ($tstatus == 'Pending'){
    $uquery = "UPDATE fixtickets SET status = '$com' WHERE ticket_id = $id";
    $update = mysqli_query($conn, $uquery);
}
else{
    $uquery = "UPDATE fixtickets SET status = '$pen' WHERE ticket_id = $id";
    $update = mysqli_query($conn, $uquery);
}
header('Location: http://localhost/RHD/pages/admin tools/fix.php');


?>