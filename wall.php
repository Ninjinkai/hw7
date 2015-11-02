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
	<link rel='stylesheet' href='css/jumbotron.css' type='text/css'>
	<link rel='stylesheet' href='css/signin.css' type='text/css'>
	<!-- Javascript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php
if ($loggedin)
	{
		echo "<!-- Navigation bar. -->\n" .
			"<nav class=\"navbar navbar-inverse navbar-fixed-top\">\n" .
    			"<div class=\"container\">\n" .
 					"<div class=\"navbar-header\">\n" .
 						"<p>$user is signed in.</p>\n" .
            			"<a class=\"btn btn-lg btn-primary\" href=\"logout.php\" role=\"button\">Sign out</a>\n" .
 			"</div>\n</div>\n</nav>\n";		
		echo "<div class=\"container well\">\n" .
		"<div class=\"row\">\n" .
			"<div class=\"col-md-8\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/8/8e/Solna_Brick_wall_Stretcher_bond_variation1.jpg\" width=\"100%\" /></div>\n" .
			"<div class=\"col-md-4\">\n" .
				"<p>Posted by:<br>Nick<br>Description<br>A wall pic.</p>\n" .
			"</div>\n</div>\n</div>\n";
	}
else
	{
		echo "<br>\n<p>You must be signed in to view this page.</p>\n" .
		"<a class=\"btn btn-lg btn-primary\" href=\"index.php\" role=\"button\">Home</a>\n";
	}
?>
</body>