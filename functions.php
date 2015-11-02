<?php
  require_once 'db_connect.php';

  $appname = "WallPics";

  function queryMysql($query)
  {
    global $db;
    $result = $db->query($query);
    if (!$result) die($db->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $db;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $db->real_escape_string($var);
  }
?>
