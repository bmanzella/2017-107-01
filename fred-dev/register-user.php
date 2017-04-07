<?php

// Connect to DB
// Check if user email already exists
// if so, return to sign-up with message
// else create user and redirect to sign-in.php

require 'db.php'; // require is like include
$db = new DB();
$user = $db->queryOne("SELECT * FROM users WHERE email = '$_POST[email]'");

if ($user == false) {
  $pw = md5($_POST['password']);
  $db->query(
    "INSERT INTO users (name, email, aka, password)
    VALUES ('$_POST[name]', '$_POST[email]', '$_POST[aka]', '$pw')"
  );
  header('Location: sign-in.php');
} else {
  // TODO tell them the email is taken
  header('Location: sign-up.php');
}
