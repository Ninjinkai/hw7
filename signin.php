<?php
  require_once 'header.php';
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $salt1 = "2Qs0r@";
      $salt2 = "J0n@$";
      $token = hash('ripemd128', "$salt1$pass$salt2");

      $result = queryMySQL("SELECT userid,password FROM USERS
        WHERE userid='$user' AND password='$token'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        echo "<script>$(\"#primaryForm\").remove();</script>";
        die("You are now signed in. Please <a href='wall.php'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }

  echo <<<_END
    <script>
      $("#signInBtn").remove();
    </script>
    <form class='form-signin' method='post' action='signin.php'>
    <div class='main'><h3>Please enter your details to sign in</h3>
    <input type='text' maxlength='16' name='user' value='$user' placeholder='Username'><br>
    <input type='text' maxlength='16' name='pass' value='$pass' placeholder='Password'><br>$error
_END;
?>
    <br>
    <input class="btn btn-lg btn-primary btn-block" type='submit' value='Sign in'>
    </form><br></div>
    </div>
  </body>
</html>
