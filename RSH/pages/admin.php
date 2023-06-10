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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="tabletest.html" />
  <!-- linking script files -->
  <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
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

    #table {
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
            <a class="nav-link" href="http://localhost/RHD/pages/admin tools/assets.php">Assets</a>
            <a class="nav-link" href="http://localhost/RHD/pages/admin tools/courses.php">Courses</a>
          </div>
        </div>
      </div>
      <a class="nav-link" href="#"><?php echo $_SESSION['name']; ?></a>
      <a class="nav-link" href="http://localhost/RHD/php/adminlogout.php">logout</a>

    </nav>
  </div>

  <!-- fix stats and tickets table -->
  <section id="fix">
    <div class="main-content mx-auto">
      <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
          <h2 class="mb-3 text-white">Fix Tickets Sats</h2>
          <div class="header-body">
            <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0"> Fixes</h5>
                        <?php
                        $fixes_query = "SELECT COUNT(*) FROM fixtickets";
                        $fixes_query_run = mysqli_query($conn, $fixes_query);

                        if ($fixes_query_run) {
                          $fixeTicket = mysqli_fetch_array($fixes_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $fixeTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Achieved</h5>
                        <?php
                        $Cfixes_query = "SELECT COUNT(*) FROM fixtickets WHERE status = 'Completed'";
                        $Cfixes_query_run = mysqli_query($conn, $Cfixes_query);

                        if ($Cfixes_query_run) {
                          $CfixeTicket = mysqli_fetch_array($Cfixes_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $CfixeTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                        <?php
                        $Pfixes_query = "SELECT COUNT(*) FROM fixtickets WHERE status = 'Pending'";
                        $Pfixes_query_run = mysqli_query($conn, $Pfixes_query);

                        if ($Pfixes_query_run) {
                          $PfixeTicket = mysqli_fetch_array($Pfixes_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $PfixeTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Efficiency</h5>
                        <?php
                          if( $TfixeTicket == 0 ){
                            $Efixes = 0;
                          }
                          else{
                            $Efixes = ($CfixeTicket / $TfixeTicket) * 100;
                          }
                        if ($Efixes) {
                          echo '<span class="h2 font-weight-bold mb-0">' . intval($Efixes) . ' %</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">' . intval($Efixes) . ' %</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <section>
    <div class="main-content mx-auto">
      <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
          <h2 class="mb-5 text-white">Request Tickets Sats</h2>
          <div class="header-body">
            <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Requests</h5>
                        <?php
                        $request_query = "SELECT COUNT(*) FROM request_tickets";
                        $request_query_run = mysqli_query($conn, $request_query);

                        if ($request_query_run) {
                          $requestTicket = mysqli_fetch_array($request_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $requestTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Approved</h5>
                        <?php
                        $Arequest_query = "SELECT COUNT(*) FROM request_tickets WHERE status = 'Aproved'";
                        $Arequest_query_run = mysqli_query($conn, $Arequest_query);

                        if ($Arequest_query_run) {
                          $ArequestTicket = mysqli_fetch_array($Arequest_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $ArequestTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Denied</h5>
                        <?php
                        $Drequest_query = "SELECT COUNT(*) FROM request_tickets WHERE status = 'Denied'";
                        $Drequest_query_run = mysqli_query($conn, $Drequest_query);

                        if ($Drequest_query_run) {
                          $DrequestTicket = mysqli_fetch_array($Drequest_query_run)[0];
                          echo '<span class="h2 font-weight-bold mb-0">' . $DrequestTicket . '</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">No Data</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Efficiency</h5>
                        <?php
                        if($RfixeTicket == 0){
                          $Erequest = 0;
                        }
                        else{
                          $Erequest = ($ArequestTicket / $RfixeTicket) * 100;
                        }
                        if ($Erequest) {
                          echo '<span class="h2 font-weight-bold mb-0">' . intval($Erequest) . ' %</span>';
                        } else {
                          echo '<span class="h2 font-weight-bold mb-0">' . intval($Erequest) . ' %</span>';
                        }
                        ?>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- linking the local script file -->
  <script rel="script" src="http://localhost/RHD//script/script.js"></script>

</body>

</html>