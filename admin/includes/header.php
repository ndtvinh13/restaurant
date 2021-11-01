<?php 
  // start session
  include '../lib/session.php';
  Session::init();
  Session::checkSession();

// Require user to login if the session is empty
// if (!isset($_SESSION['adminUser'])) {
//   $_SESSION['msg'] = "You have to log in first";
//   header('location: login.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
      crossorigin="anonymous"
    />
    <!-- Css Links -->
    <link href="css/admin.css" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css?family=Pacifico"
      rel="stylesheet"
    />

    <title>Admin_index</title>
  </head>
  <body>
    <div class="container-fluid p-0">
      <!-- navbar======== -->
      <nav class="navbar">
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <a class="navbar-brand" href="#">BurgerZ</a>
            <div>Admin page & Configuration</div>
          </div>
          <div class="d-flex align-items-center">
            <div>Hello, <?php echo $_SESSION['adminUser']; ?>  !</div>
            <hr />
            <?php 
              if(isset($_GET['action']) && $_GET['action']=='logout'){
                Session::destroy();
              }
            ?>
            <a href="?action=logout">Log out</a>
          </div>
        </div>
      </nav>
      <!-- end of navbar -->