<?php
session_start();
if(!isset( $_SESSION['uname']))
{
	header('location:registration.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Employer Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">JobSeeker Page</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">
                  <span data-feather="users"></span>
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="education.php">
                  <span data-feather="layers"></span>
                  Education
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="searchjob.php">
                  <span data-feather="search"></span>
                  Search Job
                </a>
              </li>
                 <li class="nav-item">
                <a class="nav-link" href="relevant.php">
                  <span data-feather="search"></span>
                  Relevant Job
                </a>
              </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="walking.php">
                  <span data-feather="file-text"></span>
                 Walking Interview
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">
                  <span data-feather="message-circle"></span>
                  Feedback
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2" style="text-transform:uppercase;">Walking Interview </h1>
          </div>
                
          <?php
// Establish Connection with Database
include 'connection/db.php';

// Specify the query to execute
$sql = "select * from walkin_master";
// Execute query
$result = mysqli_query($conn,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['WalkInId'];
$CompanyName=$row['CompanyName'];
$JobTitle=$row['JobTitle'];
$Vacancy=$row['Vacancy'];
$MinQualification=$row['MinQualification'];
$Description=$row['Description'];
$InterviewDate=$row['InterviewDate'];
$InterviewTime=$row['InterviewTime'];

?>
                <table width="100%" border="1" bordercolor="#1CB5F1" >
                  
                  <tr style="color:#fff">
                    <th width="5%" bgcolor="#1CB5F1" class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></th>
                  <th width="26%" height="32" bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Company Name</strong>:</div></th>
                    <th width="69%" height="32" bgcolor="#1CB5F1" class="style3"><div align="left"><strong><?php echo $CompanyName;?></strong></div></th>
                  </tr>
                 
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                   <td class="style3"><div align="left"><strong>Job Title:</strong></div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $JobTitle;?></strong></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong>Vacancy</strong>:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Vacancy;?></strong></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong>Qualification:</strong></div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $MinQualification;?></strong></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong>Description:</strong></div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Description;?></strong></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong>Date:</strong></div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $InterviewDate;?></strong></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong>Time:</strong></div></td>
                    <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $InterviewTime;?></strong></div></td>
                  </tr>
                  <?php
}

?>
  </table>
                 
                  <?php
// Close the connection
mysqli_close($conn);
?>
         
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>');</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace();
    </script>

  </body>
</html>
