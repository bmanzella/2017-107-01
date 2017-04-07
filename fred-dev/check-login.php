<?php
// get db helper
require 'db.php';

// create/connect
$db = new DB();

// find the user
$user = $db->queryOne(
  "SELECT * FROM users WHERE email = '$_POST[email]'"
);

// if no user, take to sign-in.php
// if user, check password
// if pw is wrong, take to sign-in.php
// if pw is right, take to posts.php

if($user == false) {
  header('Location: sign-in.php');
} else if($user['password'] != md5($_POST['password'])) {
  header('Location: sign-in.php');
} else {
  // create a session for that user
  session_start();
  $_SESSION['userId'] = $user['id'];
  $_SESSION['useraka'] = $user['aka'];
  $_SESSION['userName'] = $user['name'];
  $_SESSION['userEmail'] = $user['email'];
  header('Location: posts.php');
}











///
///
/////
