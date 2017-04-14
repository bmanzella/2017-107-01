<?php
// fred-dev/insert-post.php
session_start();

// Look through items sent, and grab the tags
$tags = [];
foreach ($_POST as $key => $value) {
  if(
    $key == 'title' ||
    $key == 'img' ||
    $key == 'content' ||
    $key == 'id'
  ) {
    // do nothing
  } else {
    $tags[] = $_POST[$key];
  }
}
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

// Also create associations to tags
if (count($tags) > 0) {
  // add some associations
  // get newly created post id:
  $postId = $db->conn->insert_id;
  foreach($tags as $tag) {
    // $db->query("
    //   INSERT INTO posts_tags (post_id, tag_id) VALUES ($postId, $tag)
    // ");
    // BPE instead
    $db->associateTagWithPost($tag, $postId);
  }
}


# check for success
if($result == true) {
  header('Location: posts.php');
} else {
  die("Could not insert post: " . $conn->error);
}


//  hey no closing, because this has no output/echo
