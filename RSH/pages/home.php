<?php
session_start(); 

$host = 'localhost'; // Your database host name
$dbname = 'ruwwadhelpdesk'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password


$conn = mysqli_connect($host, $username, $password, $dbname);

$assetsquery = "SELECT asset_name FROM assets";
$assetsresult = mysqli_query($conn, $assetsquery);

$assetvalues = array();

if(mysqli_num_rows($assetsresult) > 0) {
  while($row = mysqli_fetch_assoc($assetsresult)){
    $assetvalues[] = $row['asset_name'];
  }
}


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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- linking the local stylesheet file -->
    <link rel="stylesheet" href="http://localhost/RHD/styles/stylehome.css">
    <!------ Include the above in your HEAD tag ---------->
    <!-- Title -->
    <title>Ruwwad Service Hub</title>
    <style>
            /* Set a max-width for the image */
            .img-container {
        max-width: 100%;
        height: 1000px;
        overflow: hidden;
      }
      
      /* Set the form to fill the remaining width */
      .form-container {
        height: auto;
        overflow: hidden;
      }
    </style>
</head>
<body>
  <!-- default navbar -->
  <div>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <h2 class="nav-title">Ruwwad Service Hub</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav justify-content-center">
          </div>
        </div>
      </div>
      <a class="nav-link" href="http://localhost/RHD/pages/profile.php"><?php echo $_SESSION['name'];?></a>
      <a class="nav-link" href="http://localhost/RHD/php/logout.php">Logout</a>
    </nav>
  </div>
  <!-- First section image and cards -->
  <section id="home">
    <!-- images scroll to display website functions-->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="http://localhost/RHD/images/first.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://localhost/RHD/images/second.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://localhost/RHD/images/third02.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!--the section cards-->
    <div>
      <div class="card-group">
        <div class="card">
          <a href="#fix-section"><img src="http://localhost/RHD/images/FIX4.0.png" class="card-img-top" alt="..."></a>
        </div>
        <div class="card">
          <a href="#request-section"><img src="http://localhost/RHD/images/request1.0.png" class="card-img-top" alt="..."></a>
        </div>
        <div class="card">
          <a href="#courses-section"><img src="http://localhost/RHD/images/courses1.0.png" class="card-img-top" alt="..."></a>
        </div>
      </div>
    </div>
  </section>
  <!-- section two: fix form -->
  <section id="fix-section">
    <!-- fix section banner -->
    <div class="fix-banner">
        <figure class="text-center">
          <blockquote class="blockquote">
            <h1>Fix</h1>
          </blockquote>
        </figure>
    </div>
    <div class="row background">
      <div class="col-md-4 image-container">
        <img src="http://localhost/RHD/images/fixsectionside.jpg" alt="" width="100%" height="100%">
      </div>
      <div class="col-md-4">
        <h1>Fix form filling steps:</h1>
        
        <ul class="form-steps">
          <p>
            If you sre facing any technical issues don't worry, just follow the steps
            to fill up the form and then it's a matter of time to solve it in and efficient and time saving way:
          </p>
          <li><h4>step 1:</h4>
            Fill your name or if you are oppening a ticket for another person fill his/her name
            <br> قم بملئ اسمك أو إذا كنت تقوم بملئ النموذج لشخص آخر قم بوضع اسمه 
          </li>
          <li><h4>step 2</h4>
            Some issues are repeated in specefic departments, please choose the department where you faced the issue
            <br> بعض الأقسام تظهر فيها المشكلة بشكل متكرر لذا قم باختيار القسم الذي واجهت فيه المشكلة
          </li>
          <li><h4>step 3</h4>
            Write a full description about the issue and please mention all small details
            <br> أكت وصف كامل للمشكلة اللتي واجهتها وخذ بعن الاعتبار ادق التفاصيل 
          </li>
          <li><h4>step 4</h4>
            Here you go, check the information you filled and hit the submit button
            <br> أنت الآن جاهز لفتح تذكرة فقط قم بالتأكد من المعلومات اللتي تمت تعبئتها وانقر على زر فتح التذكرة
          </li>
        </ul>
      </div>
      <div class="col-md-4 form-container">
        <form action="http://localhost/RHD/php/process_form1.php" id="fixForm" method="POST">
          <h1>Fix form</h1>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="fix_name" name="fixName" placeholder="Enter your name">
          </div>
          <div class="form-group background">
            <label for="department">Department:</label>
            <select class="form-control" id="fdepartment" name="fixDepartment">
              <option value="" disabled selected>choose...</option>
              <option>Youth program</option>
              <option>Accounting</option>
              <option>social media</option>
              <option>IT</option>
              <option>community</option>
              <option>Children</option>
              <option>new view</option>
            </select>
          </div>
          <div class="form-group">
            <label for="issu_type">Issue type:</label>
            <select class="form-control" id="issue_type" name="fixIssueType">
              <option value="" disabled selected>choose...</option>
              <option>Network</option>
              <option>Hardware</option>
              <option>Software</option>
              <option>Projector</option>
              <option>Phone</option>
              <option>Printer</option>
            </select>
          </div>
          <div class="form-group">
            <label for="description">Issue description:</label>
            <textarea class="form-control" id="fdescription" rows="5" name="fixDescription"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Issue</button>
        </form>
      </div>
    </div>
    <!-- fix form validation -->
    <script>
      document.getElementById("fixForm").addEventListener("submit", function(event) {
        var name = document.getElementById("fix_name");
        var dept = document.getElementById("fdepartment");
        var issueType = document.getElementById("issue_type").value;
        var fdesc = document.getElementById("fdescription").value;

        if(name.value === ""){
          alert("please enter a name");
          event.preventDefault();
        }
        else if(dept.value === ''){
          alert("please select a department");
          event.preventDefault();
        }else if(issueType === ''){
          alert("please select an issue type");
          event.preventDefault();
        }else if(fdesc === ""){
          alert("please enter an issue description");
          event.preventDefault();
        }
      });
    </script>
  </section>
  <!-- section three: Request form -->
  <section id="request-section">
    <!-- request section banner -->
    <div class="request-banner">
        <figure class="text-center">
          <blockquote class="blockquote">
            <h1>Request</h1>
          </blockquote>
        </figure>
      </div>
      <div class="row background">
        <div class="col-md-4 image-container">
          <img src="http://localhost/RHD/images/requestsectionside.jpg" alt="request_side_image" width="100%" height="100%">
        </div>
        <div class="col-md-4">
          <h1>Request form filling steps:</h1>
          <ul class="form-steps">
            <p>
              Whether you want to borrow the device for you personally, or if you want to prepare for a workshop,
              you can submit a request for what you want by filling out this loan form
            </p>
            <li><h4>step 1</h4>
              Fill your name or if you are oppening a ticket for another person fill his/her name
              <br> قم بملئ اسمك أو إذا كنت تقوم بملئ النموذج لشخص آخر قم بوضع اسمه 
            </li>
            <li><h4>step 2</h4>
              If your are an employee select the department you belong to from the dropdown list and if 
              you are a volanteer select the department you are volunteering in at this time
              <br> إذا كنت موظف قم باختيار القسم الذي تتبع له من القائمة أما اذا كنت متطوع، اختر القسم الذي تقوم بالتطوع فيه في هذا الوقت
            </li>
            <li><h4>step 3</h4>
              select wether you are requesting the asset personally or you are presenting a workshop
              <br> اختار ما إذا كنت تريد الاستعارة لك شخصيا أو اذا كنت تخطط للقيام بورشة عمل 
            </li>
            <li><h4>step 4</h4>
              choose the device or service you want to request from the dropdown list concedring that
              there is some assets available just for a specefic cases like (Printer, MiFi, Phone)
              <br> اختر ما تريد استعارته من القائمة مع الأخذ بالإعتبار أن هناك بعض الخيارات متاحة فقط لحالات خاصة مقل الطابعة، الراوتر المتنقل والهاتف
            </li>
            <li><h4>step 5</h4>
              The borrowing period is the time you want to loan the asset concedring the the defualt loan time is one month
              <br> هنا يمكنك اختيار المدة الزمنية التي تريد استعارة الجهاز بها مع الأخذ بالاعتبار أن االمدة الافتراضية للاستعارة هي لشهر واحد
            </li>
            <li><h4>step 6</h4>
              Here you go, check the information you filled and hit the submit button
              <br> أنت الآن جاهز لفتح تذكرة فقط قم بالتأكد من المعلومات اللتي تمت تعبئتها وانقر على زر فتح التذكرة
            </li>
          </ul>
        </div>
        <div class="col-md-4 form-container">
          <form action="http://localhost/RHD/php/process_form2.php" id="reqForm" method="POST">
            <h1>Request</h1>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="requestName" placeholder="Enter your name" name="requestName">
            </div>
            <div class="form-group">
              <label for="department">Department:</label>
              <select class="form-control" id="rdepartment" name="department" >
                <option value="" disabled selected>choose...</option>
                <option>Accounting</option>
                <option>Marketing</option>
                <option>Human Resources</option>
                <option>IT</option>
                <option>Operations</option>
                <option>Sales</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group"
              <label for="request-per/work">Personal or Workshop:</label>
              <select class="form-control" id="person_workshop" name="borrowStatus">
                <option value="" disabled selected>choose...</option>
                <option>Personal</option>
                <option>workshop</option>
              </select>
            </div>
            <div class="form-group">
              <label for="request_type">Request type:</label>
              <select class="form-control" id="req_type" name="requestType">
                <option value="" disabled selected>choose...</option>
                <?php
                foreach($assetvalues as $asset) {
                ?>
                <option><?php echo $asset ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-groube">
              <label for="request-estimated-date">borrowing period:</label>
              <select class="form-control" id="period" name="period">
                <option value="" disabled selected>choose...</option>
                <option>Less than one month</option>
                <option>1 omnth</option>
                <option>2 months</option>
                <option>3 months</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control" id="rdescription" rows="5" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
          </form>
        </div>
        <script>
          document.getElementById("reqForm").addEventListener("submit", function(event) {
            var rname = document.getElementById("requestName").value;
            var rdept = document.getElementById("rdepartment").value;
            var rpw = document.getElementById("person_workshop").value;
            var rtype = document.getElementById("req_type").value;
            var period = document.getElementById("period").value;
            var rdesc = document.getElementById("rdescription").value;

            if(rname === ""){
              alert("Please enter a name");
              event.preventDefault();
            }else if(rdept === ""){
              alert("Please select a department");
              event.preventDefault();
            }else if(rpw === ""){
              alert ("please select wether you are requesting for your self or for a workshop");
              event.preventDefault();
            }else if(rtype === ""){
              alert("Please select the asset you want to request");
              event.preventDefault();
            }else if(period === ""){
              alert ("please select a time period for your request");
              event.preventDefault();
            }else if(rdesc === ""){
              alert ("please describe why you  are requesting an asset");
              event.preventDefault();
            }
          });
        </script>
  </section>
  <!-- section four: courses -->
  <section id="courses-section">
    <!-- courses section banner -->
      <div class="courses-banner">
        <figure class="text-center">
          <blockquote class="blockquote">
            <h1>Courses</h1>
          </blockquote>
        </figure>
      </div>
      <!-- courses sections and cards -->
      <!-- 1 information Tecnology-->
      <section class="coursessec">
        <h1>Information Technology</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/coding-for-everyone" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/cpp.png" class="card-img-top" alt="C++">
              </a>
              <div class="card-body">
                <h5 class="card-title">Coding for Everyone: C and C++ Specialization</h5>
                <p class="card-text">Beginner to Programmer — Learn to Code in C & C++. Gain a deep understanding of computer programming by learning to code, debug, and solve complex problems with C and C++</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary">
                  <a href="https://www.coursera.org/specializations/coding-for-everyone">University of California Santa Cruz</a>
                </small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/python" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/python.png" class="card-img-top" alt="Python">
              </a>
              <div class="card-body">
                <h5 class="card-title">Python for Everybody Specialization</h5>
                <p class="card-text">Learn to Program and Analyze Data with Python. Develop programs to gather, clean, analyze, and visualize data.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary "> <a href="https://www.coursera.org/specializations/python">University Of Michigan course</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/object-oriented-programming" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/java.jpeg" class="card-img-top" alt="Java">
              </a>
              <div class="card-body">
                <h5 class="card-title">Object Oriented Programming in Java Specialization</h5>
                <p class="card-text">Grow Your Portfolio as a Software Engineer. Learn about Object Oriented Design in four project-based courses</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"> <a href="https://www.coursera.org/specializations/object-oriented-programming">UNIVERSITY OF CALIFORNIA SAN DIEGO</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/oracle-sql-databases" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/oracle.jpg" class="card-img-top" alt="oracle">
              </a>
              <div class="card-body">
                <h5 class="card-title">Oracle SQL Databases Specialization</h5>
                <p class="card-text">Become Proficient with Oracle SQL Databases. Master creating and editing databases with Oracle SQL</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/specializations/oracle-sql-databases">Learn Quest</a></small>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/algorithms-part1#syllabus" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/algop1.jpg" class="card-img-top" alt="algorithms">
              </a>
              <div class="card-body">
                <h5 class="card-title">Algorithms Part I</h5>
                <p class="card-text">This course covers elementary data structures, sorting, and searching algorithms.
                  Part II focuses on graph- and string-processing algorithms.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"> <a href="https://www.coursera.org/learn/algorithms-part1#syllabus">Princeton University</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/algorithms-part2" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/algop2.png" class="card-img-top" alt="algorithms">
              </a>
              <div class="card-body">
                <h5 class="card-title">Algorithms, Part II</h5>
                <p class="card-text">This course covers the essential information that every serious programmer needs to know about algorithms and data structures,
                  with emphasis on applications and scientific performance analysis of Java implementations.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/learn/algorithms-part2">Princeton University</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/web-design" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/php.jpg" class="card-img-top" alt="php">
              </a>
              <div class="card-body">
                <h5 class="card-title">Web Design for Everybody: Basics of Web Development & Coding Specialization</h5>
                <p class="card-text">Learn to Design and Create Websites. Build a responsive and accessible web portfolio using HTML5, CSS3, and JavaScript</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/specializations/web-design">University Of Michigan course</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/html-css-javascript-for-web-developers" target="_blank">
                <img src="http://localhost/RHD/images/courses img/IT/frontend.png" class="card-img-top" alt="frontend">
              </a>
              <div class="card-body">
                <h5 class="card-title">HTML, CSS, and Javascript for Web Developers</h5>
                <p class="card-text">Today’s user expects a lot out of the web page: it has to load fast, expose the desired service, and be comfortable to view on all devices:
                  from a desktop computers to tablets and mobile phones.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/learn/html-css-javascript-for-web-developers">Johns Hopkins University</a></small>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- 2 Science and Engineering-->
      <section class="coursessec">
        <h1>Science and Engineering</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/autodesk-autocad-design-drafting?=" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/autocad.png" class="card-img-top" alt="autocad-logo">
              </a>
              <div class="card-body">
                <h5 class="card-title">Autodesk Certified Professional: AutoCAD for Design and Drafting Exam Prep</h5>
                <p class="card-text">This online course from Autodesk prepares you by offering an overview of skills that match what is covered in the Autodesk Certified Professional: AutoCAD for Design and Drafting exam.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/learn/autodesk-autocad-design-drafting?=">Autodesk</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/iot" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/iot.jpg" class="card-img-top" alt="Internet-of-things">
              </a>
              <div class="card-body">
                <h5 class="card-title">An Introduction to Programming the Internet of Things (IOT) Specialization</h5>
                <p class="card-text">Create Your Own Internet of Things (IoT) Device. Design and create a simple IoT device in just six courses.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary "> <a href="https://www.coursera.org/specializations/iot">Division of Continuing Education</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/construction-management" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/constructionman.jpg" class="card-img-top" alt="construction-management">
              </a>
              <div class="card-body">
                <h5 class="card-title">Construction Management Specialization</h5>
                <p class="card-text">Construction Project Management and Planning. Develop and understand the foundations of project planning and scheduling techniques</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"> <a href="https://www.coursera.org/specializations/construction-management">Columbia University in New York</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/statistical-thermodynamics">
                <img src="http://localhost/RHD/images/courses img/ENG/thermo.png" class="card-img-top" alt="train">
              </a>
              <div class="card-body">
                <h5 class="card-title">Statistical Molecular Thermodynamics</h5>
                <p class="card-text">This introductory physical chemistry course examines the connections between molecular properties and the behavior of macroscopic chemical systems.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/learn/statistical-thermodynamics">University Of Minnesota</a></small>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/intro-chemistry" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/chem.jpg" class="card-img-top" alt="chemistry">
              </a>
              <div class="card-body">
                <h5 class="card-title">Introduction to Chemistry: Reactions and Ratios</h5>
                <p class="card-text">This is an introductory course for students with limited background in chemistry; basic concepts involved in chemical reactions,
                  stoichiometry, the periodic table, periodic trends, nomenclature, and chemical problem solving will be emphasized with the goal of preparing students
                  for further study in chemistry as needed for many science, health, and policy professions.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/learn/intro-chemistry">Duke University</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/learn/renewable-energy-entrepreneurship" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/renenergy.jpg" class="card-img-top" alt="Renewable energy">
              </a>
              <div class="card-body">
                <h5 class="card-title">Renewable Energy and Green Building Entrepreneurship</h5>
                <p class="card-text">Welcome to the course where you learn to launch a new business in the energy, finance, real estate, design, engineering, or environmental sectors,
                  while also helping you create positive environmental and human health impacts around the world.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary "> <a href="https://www.coursera.org/learn/renewable-energy-entrepreneurship">Duke University</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/specializations/robotics" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/robo.jpg" class="card-img-top" alt="robot">
              </a>
              <div class="card-body">
                <h5 class="card-title">Robotics Specialization</h5>
                <p class="card-text">Learn the Building Blocks for a Career in Robotics. Gain experience programming robots to perform in situations and for use in crisis management</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"> <a href="https://www.coursera.org/specializations/robotics">University of Pennsylvania</a></small>
              </div>
            </div>
          </div>
          <div class="col space">
            <div class="card h-100">
              <a href="https://www.coursera.org/professional-certificates/applied-artifical-intelligence-ibm-watson-ai" target="_blank">
                <img src="http://localhost/RHD/images/courses img/ENG/ai.jpg" class="card-img-top" alt="ai">
              </a>
              <div class="card-body">
                <h5 class="card-title">IBM Applied AI Professional Certificate</h5>
                <p class="card-text">Kickstart your career in artificial intelligence. Learn Python, build a chatbot, explore machine learning and computer vision, and leverage IBM Watson.</p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><a href="https://www.coursera.org/professional-certificates/applied-artifical-intelligence-ibm-watson-ai">IBM</a></small>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Future plans -->
      <!-- 3 Financial and administrative-->
      <!-- 4 languages-->
      <!-- 5 Nutrition and fitness-->
      <!-- 6 Film directing -->
      <!-- 7 cooking -->
  </section>
  <!-- Footer -->
  <div>

  </div>
  <!-- linking bootstrap Javasript script file -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>