<?php

// fred-dev/update-post.php

// make a connection
require 'db.php';
$db = new DB();

// Run the update
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$id = $_POST['id'];

$statement = $db->conn->prepare("UPDATE posts SET title = ?, img = ?, content = ? WHERE id = ?");
if(!$statement) die("Prepare failed: " . $db->conn->error);
$bind = $statement->bind_param("sssi", $title, $img, $content, $id);
if(!$bind) die("bind failed: " . $statement->error);
$execute = $statement->execute();
if(!$execute) die("bind failed: " . $statement->error);

// Update the tags
//
// Flow: get all tag ids, delete existing, create new ones
$delete = $db->conn->prepare("DELETE FROM posts_tags WHERE post_id = ?");
$bind = $delete->bind_param("i", $id);
$execute = $delete->execute();

// Create associations anew
foreach ($_POST as $key => $value) {
  if(
    $key != 'title' &&
    $key != 'img' &&
    $key != 'content' &&
    $key != 'id'
  ) {
    // insert a tag association
    $db->associateTagWithPost($_POST[$key], $id);
  }
}

if($execute) {
  header('Location: individual-post.php?id=' . $id);
} else {
  die('Could not update the post: ' . $db->conn->error);
}
