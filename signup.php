<?php
  require_once 'header.php';

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM USERS WHERE userid='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        $salt1 = "2Qs0r@";
        $salt2 = "J0n@$";
        $token = hash('ripemd128', "$salt1$pass$salt2");

        queryMysql("INSERT INTO USERS VALUES('$user', '$token')");
        echo "<script>$(\"#primaryForm\").remove();</script>";
        die("<h4>Account created</h4>Please <a href='index.php'>sign in.</a><br><br>");
      }
    }
  }

  echo <<<_END
    <script>
      $("#signUpBtn").remove();
    </script>
    <form class='form-signin' method='post' action='signup.php'>
    <div class='main'><h3>Please enter your details to sign up</h3>
    <input type='text' maxlength='16' name='user' value='$user' placeholder='Username'><br>
    <input type='text' maxlength='16' name='pass' value='$pass' placeholder='Password'><br>$error
_END;
?>
    <br>
    <input class="btn btn-lg btn-primary btn-block" type='submit' value='Sign up'>
    </form></div><br>
    </div>
  </body>
</html>
