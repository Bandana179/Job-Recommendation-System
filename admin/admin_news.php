<?php
session_start();
if(!isset($_SESSION['email']))
{
	header('location:admin_login.php');
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

    <title>Admin News</title>
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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADMIN PAGE</a>
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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="employer.php">
                  <span data-feather="users"></span>
                  Employers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jobseeker.php">
                  <span data-feather="users"></span>
                  Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="managejobseeker.php">
                  <span data-feather="users"></span>
                   Manage Job Seeker
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manageemployer.php">
                  <span data-feather="users"></span>
                  Manage Employer
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
                <a class="nav-link" href="feedback.php">
                  <span data-feather="file-text"></span>
                  FEEDBACK
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_news.php">
                  <span data-feather="file-plus"></span>
                  PUBLISH NEWS
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">NEWS</a></li>
                </ol>
            </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="27" bgcolor="#1CB5F1"style="color:#fff"><span>Create News</span></td>
                        </tr>
                        <tr>
                            <td height="26">
                                <form id="form1" method="post" action="InsertNews.php">
                                    <table width="100%" height="109" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td height="36"><span >News:</span></td>
                                            <td><span id="sprytextfield1">
                              <label>
                              <input type="text" name="txtNews" id="txtNews"/>
                              </label>
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                                        </tr>
                                        <tr>
                                            <td height="35"><span >News Date:</span></td>
                                            <td><span id="sprytextfield2">
                              <label>
                              <input type="date" name="txtDate" id="txtDate"/>
                              </label>
                              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><label>
                                                    <input type="submit" name="submit" id="button" value="Submit"/>
                                                </label></td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td height="25" bgcolor="#1CB5F1"style="color:#fff"><span >News List</span></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="1" bordercolor="#1CB5F1">
                                    <tr  style="color:#fff">
                                        <th height="32" bgcolor="#1CB5F1">
                                            <div align="left" >Id</div>
                                        </th>
                                        <th bgcolor="#1CB5F1">
                                            <div align="left">News</div>
                                        </th>
                                        <th bgcolor="#1CB5F1">
                                            <div align="left">Date</div>
                                        </th>
                                        <th bgcolor="#1CB5F1">
                                            <div align="left">Delete</div>
                                        </th>
                                    </tr>
                                    <?php
                                    // Establish Connection with Database
                                     include "connection/db.php";
                                    // Specify the query to execute
                                    $sql = "select * from news_master";

                                    // Execute query
                                    $result = mysqli_query($conn,$sql);

                                    // Loop through each records
                                    while ($row = mysqli_fetch_array($result)) {
                                        $Id = $row['NewsId'];
                                        $News = $row['News'];
                                        $NewsDate = $row['NewsDate'];
                                        ?>
                                        <tr>
                                            <td>
                                                <div align="left" class="style11 style7 style8"><?php echo $Id; ?></div>
                                            </td>
                                            <td>
                                                <div align="left"
                                                     class="style11 style7 style8"><?php echo $News; ?></div>
                                            </td>
                                            <td>
                                                <div align="left"
                                                     class="style11 style7 style8"><?php echo $NewsDate; ?></div>
                                            </td>
                                            <td>
                                                <div align="left" class="style11 style7 style8"><a
                                                        href="DeleteNews.php?NewsId=<?php echo $Id; ?>">Delete</a></div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    // Retrieve Number of records returned
                                    $records = mysqli_num_rows($result);
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <div align="left"
                                                 class="style11 style7 style8"><?php echo "Total " . $records . " Records"; ?> </div>
                                        </td>
                                    </tr>
                                    <?php
                                    // Close the connection
                                    mysqli_close($conn);
                                    ?>
                                </table>
          </div>
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
