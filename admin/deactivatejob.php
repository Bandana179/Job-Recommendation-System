<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$ID = $_GET['JobId'];
// Establish Connection with MYSQL
include 'connection/db.php';
// Select Database

// Specify the query to Update Record
$sql = "Update jobseeker_reg set Status='Pending' where JobSeekId=$ID";
// Execute query
mysqli_query($conn,$sql);
// Close The Connection
mysqli_close($conn);
echo '<script>alert("Job Seeker Account Deactivated");window.location=\'jobseeker.php\';</script>';
?>
</body>
</html>