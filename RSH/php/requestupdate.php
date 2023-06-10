<?php
session_start();
include 'connection.php';

$Apr = "Aproved";
$den = "Denied";
$pen = "Pending";

$id = $_GET['updateid'];

$query = "SELECT * FROM request_tickets WHERE ticket_id =$id";
$result= mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$tstatus = $row['status'];

if ($tstatus == 'Pending'){
    $uquery = "UPDATE request_tickets SET status = '$Apr' WHERE ticket_id = $id";
    $update = mysqli_query($conn, $uquery);
}
else if ($tstatus == 'Aproved') {
    $uquery = "UPDATE request_tickets SET status = '$den' WHERE ticket_id = $id";
    $update = mysqli_query($conn, $uquery);
} else {
    $uquery = "UPDATE request_tickets SET status = '$pen' WHERE ticket_id = $id";
    $update = mysqli_query($conn, $uquery);
}
header('Location: http://localhost/RHD/pages/admin tools/request.php');


?>