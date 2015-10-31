<?php
  session_start();

  echo "<!DOCTYPE html>\n<html>\n<head>\n";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="photo sharing php COP3813 Nick Petty homework 7">
  <meta name="author" content="Nick Petty">
  <link rel="icon" href="icons/favicon.ico">
<?php
echo "  <title>$appname</title>\n";
?>
  <link rel='stylesheet' href='css/bootstrap.css' type='text/css'>
  <link rel='stylesheet' href='css/signin.css' type='text/css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container">
    <form class="form-signin">
<?php      
  echo "<h2 class=\"form-signin-heading\">Welcome to $appname</h2>\n";

  if ($loggedin)
  {
    echo "<a class=\"btn btn-lg btn-primary btn-block\" href=\"logout.php\" role=\"button\">Sign out</a>\n";
    echo "<br>\n<p>$user is logged in.</p>\n";
  }
  else
  {
    echo "<a class=\"btn btn-lg btn-primary btn-block\" href=\"signup.php\" role=\"button\">Sign up</a>\n" .
      "<a class=\"btn btn-lg btn-primary btn-block\" href=\"login.php\" role=\"button\">Sign in</a>\n";
  }
?>
    </form>
 <!--  </div> -->