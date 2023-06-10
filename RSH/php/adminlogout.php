<?php
session_start();


session_unset();
session_destroy();

header("Location: http://localhost/RHD/pages/admin_log.php");

?>