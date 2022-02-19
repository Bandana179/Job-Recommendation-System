<?php
$server="localhost:3307";
$username="root";
$password="";
$database="job_recommend";
$conn=mysqli_connect($server, $username, $password, $database);
if($conn)
{
?>
<script>
	alert('connection successful');
</script>
<?php
}

else
{
echo mysqli_connect_error();
}
?>