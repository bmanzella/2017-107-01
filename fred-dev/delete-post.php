<?php
// fred-dev/delete-post.php

// get the post id from the query parameter
// aka ?id=1
$postIdToDelete = $_GET['id'];

// delete post
// yay technical debt!
// make a connection
$server = 'fred-dev.caokxintrssz.us-east-1.rds.amazonaws.com';
$user = 'laonaumc_fred';
$pw = 'fredonia-rocks';
$conn = new mysqli(
  $server, $user, $pw, 'laonaumc_wpdb'
);

if ($conn->connect_error) {
  die('connection failed: ' . $conn->connect_error);
}

$result = $conn->query(
  "DELETE FROM posts WHERE id = $postIdToDelete"
);

// Check for success
if ($result == true) {
  header('Location: posts.php');
} else {
  die("error deleting post: " . $conn->error);
}

// hey no closing, #reasons
