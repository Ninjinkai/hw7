<?php //setupusers.php
  require_once './php/db_connect.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error) die($connection->connect_error);
  echo "Connected.";

  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  );";
echo "Table created.";


  $result = $connection->query($query);
  echo $result;
  if (!$result) die($connection->error);

  $selectStmt = 'SELECT * FROM `users`;';
  echo $selectStmt;

  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  $forename = 'Bill';
  $surname  = 'Smith';
  $username = 'bsmith';
  $password = 'mysecret';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $forename, $surname, $username, $token);

  $forename = 'Pauline';
  $surname  = 'Jones';
  $username = 'pjones';
  $password = 'acrobat';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $forename, $surname, $username, $token);

  function add_user($connection, $fn, $sn, $un, $pw)
  {
    $query  = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
?>
