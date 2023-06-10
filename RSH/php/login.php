<?php
session_start();
ob_start();
include 'connection.php';

if(isset($_POST["username"]) && isset($_POST["pass"]))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['pass']);

if(empty($uname))
{
    header("location: http://localhost/RHD/index.html?error=User Name is required");
    exit;
}
elseif(empty($pass))
{
    header("location: http://localhost/RHD/index.html?error=Password is required");
    exit;
}

$sql = "SELECT * FROM user WHERE email='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $row = mysqli_fetch_assoc($result);
    if($row['email'] == $uname && $row['password'] == $pass)
    {
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['fname'];
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['depart'] = $row['department'];
        $_SESSION['phone'] = $row['phone'];
        ob_start();
        if (headers_sent()) {
            die("Redirect failed.");
        }
        else{
        header("location: http://localhost/RHD/pages/home.php");
        exit();
        }
    }
    else
    {
        header("location: http://localhost/RHD/index.php?error=IncorrectEmailorpassword");
        exit();
    }

}
else
{
    header("location: http://localhost/RHD/index.php?error=IncorrectEmailorpassword");
    exit();
}
?>