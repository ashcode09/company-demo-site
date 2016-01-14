<?php
	
$user = "wpuser";
$pass = "\$ecr3t";

if (isset($_POST["login"]) && isset($_POST["password"])) {
  if (($_POST['login'] == $user) && ($_POST['password'] == $pass)) { 
    $cookie_name = "login";
    $cookie_value = "access granted";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    header("Location: http://www.mybusinessassist.com.au/help/");
  } else {
    echo "Username and/or password is incorrect!";
  }
}

?>

<div class="login">
  <h1>Login to Brochure Site</h1>
  <form method="post" action="http://www.mybusinessassist.com.au/help/demo-login/">
    <p><input style="text-transform: lowercase;" type="text" name="login" value="" placeholder="Username"></p>
    <p><input type="password" name="password" value="" placeholder="Password"></p>
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
  </form>
</div>