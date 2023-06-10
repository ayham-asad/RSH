<?php
session_start();
ob_start();
include 'connection.php';

if(isset($_POST["email"]) && isset($_POST["pass"]))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = validate($_POST['email']);
$pass = validate($_POST['pass']);

if(empty($email))
{
    header("location: http://localhost/RHD/pages/admin_log.php?error=User Name is required");
    exit;
}
elseif(empty($pass))
{
    header("location: http://localhost/RHD/pages/admin_log.php?error=Password is required");
    exit;
}

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    if($row['email'] == $email && $row['password'] == $pass)
    {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['adminId'];
        ob_start();
        if (headers_sent()) {
            die("Redirect failed.");
        }
        else{
        header("location: http://localhost/RHD/pages/admin.php");
        exit();
        }
    }
    else
    {
        header("location: http://localhost/RHD/pages/admin_log.php?error=IncorrectEmailorpassword");
        exit();
    }

}
else
{
    header("location: http://localhost/RHD/pages/admin_log.php?error=IncorrectEmailorpassword");
    exit();
}
?>