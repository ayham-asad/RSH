<?php
session_start();
include 'connection.php';

$opened_for = $_POST['fixName'];
$department = $_POST['fixDepartment'];
$issueType = $_POST['fixIssueType'];
$description = $_POST['fixDescription'];
$ownerID = $_SESSION['id'];
$phone = $_SESSION['phone'];


$sql = "INSERT INTO fixTickets (owner_id, opened_for, phone, department, issue_type, description) VALUES ('$ownerID', '$opened_for', '$phone', '$department', '$issueType', '$description');";

mysqli_query($conn, $sql);


header('Location: http://localhost/RHD/pages/home.php');

?>