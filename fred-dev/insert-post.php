<?php
// fred-dev/insert-post.php
session_start();
// Make a DB insert for the new post
// make a connection
require 'db.php';

$db = new DB();

// Make an insert
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$result = $db->query(
  "INSERT INTO posts
    (title, img, content, user_id)
  VALUES
    ('$title', '$img', '$content', $_SESSION[userId])"
);

# check for success
if($result == true) {
  header('Location: posts.php');
} else {
  die("Could not insert post: " . $conn->error);
}


//  hey no closing, because this has no output/echo
