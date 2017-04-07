<?php
// sign-up.php
 ?>
<link rel="stylesheet" href="styles.css">
<h2>Sign up for Fred Dev!</h2>

<form id="signup" action="register-user.php" method="post">
  <label for="name">Name:</label>
  <input id="name" type="text" name="name">
  <br>
  <label for="email">Email:</label>
  <input id="email" type="text" name="email">
  <br>
  <label for="aka">AKA:</label>
  <input id="aka" type="text" name="aka">
  <br>
  <label for="password">Password:</label>
  <input id="password" type="password" name="password">
  <br>
  <label for="confirmPassword">Confirm Password:</label>
  <input id="confirmPassword" type="password" name="confirmPassword">
  <br>
  <button id="register">Register</button>
</form>
