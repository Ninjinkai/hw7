<?php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
echo <<<_END
  <script>
      $("#primaryForm").remove();
  </script>
  <div class='main container'>You have been signed out. Please <a href='index.php'>click here</a> to refresh the screen.
_END;
  }
  else
  { 
echo <<<_END
  <script>
      $("#primaryForm").remove();
    </script>
  <div class='main container'>You cannot sign out because you are not signed in.
_END;
  }
?>

    <br><br></div>
    </div>
  </body>
</html>
