<?php
session_start();
if(!isset( $_SESSION['name']))
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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Employer Page</a>
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
                <a class="nav-link" href="managejob.php">
                  <span data-feather="users"></span>
                  Manage Job
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
                <a class="nav-link" href="application.php">
                  <span data-feather="file-plus"></span>
                  Application
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2" style="text-transform:uppercase;">View Biodata</h1>
          </div>
                      

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#006699" style="color:#fff"><strong>Personal Information</strong></td>
                  </tr>
                  <tr>
                    <td>
                    <?php
                    $ID=$_GET['JobSeekId'];
                    // Establish Connection with Database
                   include 'connection/db.php';

                $sql = "select * from jobSeeker_reg where JobSeekId='".$ID."'  ";

                $result = mysqli_query($conn,$sql);

                    $row = mysqli_fetch_array($result)
                    ?>
                <table width="100%" border="1" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo $row['JobSeekerName'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Address:</strong></td>
                    <td><?php echo $row['Address'];?></td>
                  </tr>
                  <tr>
                    <td><strong>City:</strong></td>
                    <td><?php echo $row['City'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $row['Email'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Mobile:</strong></td>
                    <td><?php echo $row['Mobile'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Highest Qualification:</strong></td>
                    <td><?php echo $row['Qualification'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Gender:</strong></td>
                    <td><?php echo $row['Gender'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Birth Date:</strong></td>
                    <td><?php echo $row['BirthDate'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Resume:</strong></td>
                    <td><a href="../job seeker/upload/<?php echo $row['Resume'];?>" target="_blank"><strong>View</strong></a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#006699"style="color:#fff"><strong>Educational Qualification</strong></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
                      <tr style="color:#fff">
                        <th height="32" bgcolor="#006699" ><div align="left" ><strong>Degree</strong></div></th>
                        <th bgcolor="#006699" ><div align="left" ><strong>University</strong></div></th>
                        <th bgcolor="#006699" ><div align="left" ><strong>Passing Year</strong></div></th>
                        <th bgcolor="#006699" ><div align="left" ><strong>Percentage</strong></div></th>
                      </tr>
                      <?php
					  $ID=$_GET['JobSeekId'];
                    include 'connection/db.php';
                    $sql = "select * from JobSeeker_Education where JobSeekId='".$ID."'";
                    // Execute query
                    $result = mysqli_query($conn,$sql);
                        // Loop through each records 
                    while($row = mysqli_fetch_array($result))
                        {
                            $Degree=$row['Degree'];
                            $Univ=$row['University'];
                            $Passing=$row['PassingYear'];
                        $Per=$row['Percentage'];
                        ?>
                      <tr>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Degree;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Univ;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Passing;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Per;?></strong></div></td>
                      </tr>
                      <?php
                        }

                        $records = mysqli_num_rows($result);
                            ?>
                      
                      <?php
                    // Close the connection
                    mysqli_close($conn);
                    ?>
                    </table></td>
                  </tr>
                </table>
                <?php
				$Status=$_GET['Status'];
				if($Status=="Apply")
				{
				?>
                <form id="form1" method="post" action="CallLatter.php?JobId=<?php echo $_GET['JobId'] ;?>&JobSeekId=<?php echo $_GET['JobSeekId'] ;?>&AppId=<?php echo $_GET['AppId'] ;?>">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px">
                    <tr>
                      <td><strong>Call Latter Description:</strong></td>
                        <td><span id="sprytextarea1">
                        <label>
                        <textarea name="txtDesc" id="txtDesc" cols="35" rows="3"></textarea>
                        </label>
                      <span class="textareaRequiredMsg">A value is required.</span></span></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="button" id="button" value="Submit" />
                      </label></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form>
              <?php
			  }
			  ?>
                <p align="center"><a href="application.php"><strong>Back</strong></a></p>
       
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