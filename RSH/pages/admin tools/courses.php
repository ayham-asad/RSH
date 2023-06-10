<?php
session_start();
$host = 'localhost'; // Your database host name
$dbname = 'ruwwadhelpdesk'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password


$conn = mysqli_connect($host, $username, $password, $dbname);

$fixquery = "SELECT * FROM fixtickets";
$fixresult = mysqli_query($conn, $fixquery);

$requestquery = "SELECT * FROM request_tickets";
$requestresult = mysqli_query($conn, $requestquery);

$Tfixes_query = "SELECT COUNT(*) FROM fixtickets";
$Tfixes_query_run = mysqli_query($conn, $Tfixes_query);
$TfixeTicket = mysqli_fetch_array($Tfixes_query_run)[0];

$Rfixes_query = "SELECT COUNT(*) FROM request_tickets";
$Rfixes_query_run = mysqli_query($conn, $Rfixes_query);
$RfixeTicket = mysqli_fetch_array($Rfixes_query_run)[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- importing google font into the page-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- linking bootstrap stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- linking the local stylesheet file -->
  <link rel="stylesheet" href="http://localhost/RHD/styles/styleadmin.css">
  <!--test links for form-->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!------ Include the above in your HEAD tag ---------->
  <!-- Title -->
  <title>Ruwwad Service Hub</title>
  <style>
    body {
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(http://localhost/RHD/images/cover.jpeg);
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body>
  <!-- default navbar -->
  <div>
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <h2 class="nav-title">Ruwwad Service Hub</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav justify-content-center">
          <a class="nav-link" aria-current="page" href="http://localhost/RHD/pages/admin.php">Stats</a>
          <a class="nav-link" aria-current="page" href="http://localhost/RHD/pages/admin tools/fix.php">Fix</a>            
            <a class="nav-link" href="http://localhost/RHD/pages/admin tools/request.php" id="ticd">Request</a>
            <a class="nav-link" href="http://localhost/RHD/pages/admin tools/assets.php">Assets</a>
            <a class="nav-link" href="http://localhost/RHD/pages/admin tools/courses.php">Courses</a>
          </div>
        </div>
      </div>
      <a class="nav-link" href="#"><?php echo $_SESSION['name']; ?></a>
      <a class="nav-link" href="http://localhost/RHD/php/adminlogout.php">logout</a>

    </nav>
  </div>
  <!-- linking the local script file -->
  <script rel="script" src="http://localhost/RHD//script/script.js"></script>
  <!-- linking bootstrap Javasript script file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>