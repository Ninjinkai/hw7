<?php
require_once './php/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USERS Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Creating the USERS table</h1>
      </div>

      <?php
// Drop the USERS table now that we're done with it
$dropStmt = 'DROP TABLE IF EXISTS `USERS`;';
?>
      <div id="step-four" class="well">
        <h3>Step Four <small>Dropping the table</small></h3>
        <pre><?php echo $dropStmt; ?></pre>
<?php
if($db->query($dropStmt)) {
    echo '        <div class="alert alert-success">Table drop successful.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Table drop failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit();
}
?>
      </div>

<?php
// Create table with two columns: userid and password
$createStmt = 'CREATE TABLE `USERS` (' . PHP_EOL
            . '  `userid` varchar(32) NOT NULL,' . PHP_EOL
            . '  `password` varchar(32) DEFAULT NULL,' . PHP_EOL
            . '  PRIMARY KEY (`userid`)' . PHP_EOL
            . ') ENGINE=MyISAM DEFAULT CHARSET=latin1 ;';
?>
      <div id="step-one" class="well">
        <h3>Step One <small>Creating the table</small></h3>
        <pre><?php echo $createStmt; ?></pre>
<?php
if($db->query($createStmt)) {
    echo '        <div class="alert alert-success">Table creation successful.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Table creation failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit(); // Prevents the rest of the file from running
}
?>
      </div>

<?php
// Add two rows to the table

$pw_temp = "Password";
$salt1 = "qm&h*";
$salt2 = "pg!@";
$token = hash('ripemd128', "$salt1$pw_temp$salt2");

$insertStmt = 'INSERT INTO `USERS` (`userid`, `password`)' . PHP_EOL
            . '  VALUES (\'Person 1\', \''.$token.'\'),' . PHP_EOL
            . '   (\'Person 2\', \''.$token.'\');';
?>
      <div id="step-two" class="well">
        <h3>Step Two <small>Inserting into the table</small></h3>
        <pre><?php echo $insertStmt; ?></pre>
<?php
if($db->query($insertStmt)) {
    echo '        <div class="alert alert-success">Values inserted successfully.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Value insertion failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit();
}
?>
      </div>

<?php
// Get the rows from the table
$selectStmt = 'SELECT * FROM `USERS`;';
?>
      <div id="step-three" class="well">
        <h3>Step Three <small>Retrieving the rows</small></h3>
        <pre><?php echo $selectStmt; ?></pre>
<?php
$result = $db->query($selectStmt);
if($result->num_rows > 0) {
    echo '        <div class="alert alert-success">' . PHP_EOL;
    while($row = $result->fetch_assoc()) {
        echo '          <p>userid: ' . $row["userid"] . ' - password: ' . $row["password"] . '</p>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-success">No Results</div>' . PHP_EOL;
}

$db->close();
?>
      </div>



    </div>
  </body>
</html>

