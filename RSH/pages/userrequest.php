<?php
session_start();
$host = 'localhost'; // Your database host name
$dbname = 'ruwwadhelpdesk'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password


$conn = mysqli_connect($host, $username, $password, $dbname);

$id = $_SESSION['id'];

$fixquery = "SELECT * FROM fixtickets WHERE owner_id='$id' AND status='Pending'";
$fixresult = mysqli_query($conn, $fixquery);

$requestquery = "SELECT * FROM request_tickets WHERE owner_id='$id'";
$requestresult = mysqli_query($conn, $requestquery);


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
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
    />
    <link rel="stylesheet" href="tabletest.html" />
    <!-- linking script files -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script
      defer
      src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"
    ></script>
    <script
      defer
      src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"
    ></script>
    <script defer src="http://localhost/RHD/script/table.js"></script>
  <!-- linking the local stylesheet file -->
  <link rel="stylesheet" href="http://localhost/RHD/styles/styleadmin.css">
  <link rel="stylesheet" href="http://localhost/RHD/styles/profile.css">
  
  
  <!-- Title -->
  <title>Ruwwad Service Hub</title>
  <!-- inline styling -->
  <style>
        body {
          width: 100%;
          height: 100vh;
          background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(http://localhost/RHD/images/cover.jpeg);
          background-size: cover;
          background-position: center;
        }
        #table{
            background-color: #fff;
            border-radius: 1%;
        }
      </style>
</head>

<body>
  <!-- default navbar -->
  <div>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <h2 class="nav-title">Ruwwad Service Hub</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav justify-content-center">
            <a class="nav-link" aria-current="page" href="http://localhost/RHD/pages/home.php ">Home</a>
            <a class="nav-link" href="http://localhost/RHD/pages/profile.php">Fixes</a>
            <a class="nav-link" aria-current="page" href="#">Requests</a>
            <!-- add user name-->
          </div>
        </div>
      </div>
      <a class="nav-link" href="http://localhost/RHD/pages/profile.php"><?php echo $_SESSION['name'];?></a>
      <a class="nav-link" href="http://localhost/RHD/php/logout.php">Logout</a>
    </nav>
  </div>
  <!-- request tickets table -->
  <div class="container">
  <h2 class="mb-5 text-white header">Request Tickets</h2>
  </div>
  <div id="table" class="container  mt-5 pt-3">
  <table id="example" class="table table-striped align-middle pt-2" style="width: 100%">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Opened For</th>
          <th scope="col">Opening Date</th>
          <th scope="col">Department</th>
          <th scope="col">Asset</th>
          <th scope="col">Request Type</th>
          <th scope="col">Period</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($rrows = mysqli_fetch_assoc($requestresult)) {
        ?>
          <tr>
            <td> <?php echo $rrows['ticket_id']; ?></td>
            <td> <?php echo $rrows['opened_for']; ?></td>
            <td> <?php echo $rrows['opening_date']; ?></td>
            <td> <?php echo $rrows['department']; ?></td>
            <td> <?php echo $rrows['request_type']; ?></td>
            <td> <?php echo $rrows['request_status']; ?></td>
            <td> <?php echo $rrows['borrowing_period']; ?></td>
            <td style="max-width: 200px;" data-toggle="tooltip" title="<?php echo $rrows['description']; ?>">
              <?php echo $rrows['description']; ?>
            </td>
            <td> <?php echo $rrows['status']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Opened For</th>
          <th scope="col">Opening Date</th>
          <th scope="col">Department</th>
          <th scope="col">Asset</th>
          <th scope="col">Request Type</th>
          <th scope="col">Period</th>
          <th scope="col">Description</th>
          <th scope="col">Status</th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>