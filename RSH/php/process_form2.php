<?php
session_start();
include 'connection.php';

$opened_for = $_POST['requestName'];
$department = $_POST['department'];
$borrowstatus = $_POST['borrowStatus'];
$requestType = $_POST['requestType'];
$period = $_POST['period'];
$description = $_POST['description'];
$ownerID = $_SESSION['id'];
$phone = $_SESSION['phone'];


$sql = "INSERT INTO request_tickets (owner_id, opened_for, phone, department, request_type, request_status, borrowing_period, description) VALUES ('$ownerID', '$opened_for', '$phone', '$department', '$requestType', '$borrowstatus', '$period','$description');";

mysqli_query($conn, $sql);


header('Location: http://localhost/RHD/pages/home.php');


?>