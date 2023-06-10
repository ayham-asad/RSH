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
    #table{
            background-color: #fff;
            border-radius: 1%;
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
            <a class="nav-link" style="pointer-events: none" href="http://localhost/RHD/pages/admin tools/assets.php">Assets</a>
            <a class="nav-link" style="pointer-events: none" href="http://localhost/RHD/pages/admin tools/courses.php">Courses</a>
          </div>
        </div>
      </div>
      <a class="nav-link" href="#"><?php echo $_SESSION['name']; ?></a>
      <a class="nav-link" href="http://localhost/RHD/php/adminlogout.php">logout</a>

    </nav>
  </div>
  <div class="text-center">
  <h2 class="mb-5 text-white header mt-5">Fix Tickets</h2>
  </div>
  <!-- fix stats and tickets table -->
  <section id="fix" class="mt-5">
    <div id="table" class="main-content mx-auto p-3">
      <table id="example" class="table table-striped  pt-2" style="width: 100%">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Owner</th>
            <th scope="col">Department</th>
            <th scope="col">Phone</th>
            <th scope="col">Issue Type</th>
            <th scope="col">Description</th>
            <th scope="col">Openning date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($frows = mysqli_fetch_assoc($fixresult)) {
            $tid = $frows['ticket_id'];
          ?>
            <tr>
              <th scope="row"> <?php echo $frows['ticket_id']; ?></th>
              <td> <?php echo $frows['opened_for']; ?></td>
              <td> <?php echo $frows['department']; ?></td>
              <td> <?php echo $frows['phone']; ?></td>
              <td> <?php echo $frows['issue_type']; ?></td>
              <td style="max-width: 200px;">
                <?php echo $frows['description']; ?>
              </td>
              <td> <?php echo $frows['opening_date']; ?></td>
              <td contenteditable="true">
                <?php
                if (strcasecmp($frows['status'], 'completed') == 0) {
                ?>
                  <select>
                    <option><?php echo $frows['status']; ?></option>
                    <option>Pending</option>
                  </select>
                <?php
                } else {
                ?>
                  <select>
                    <option><?php echo $frows['status']; ?></option>
                    <option>completed</option>
                  </select>
                <?php
                }
                ?>
              </td>
              <td>
                <button type="button" class="btn btn-success">
                  <?php 
                  echo '
                  <a href="http://localhost/RHD/php/fixupdate.php?updateid='.$tid.'" class="text-light">
                    Update
                  </a>
                  '
                  ?>
                  
                </button>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Owner</th>
            <th scope="col">Department</th>
            <th scope="col">Phone</th>
            <th scope="col">Issue Type</th>
            <th scope="col">Description</th>
            <th scope="col">Openning date</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </section>

  <!-- linking the local script file -->
  <script rel="script" src="http://localhost/RHD//script/script.js"></script>

</body>

</html>