<?php
// fred-dev/create-post.php

// Don't let anybody access the site
// Who has not logged in yet. ($_SESSION[user...] is set)
session_start(); // check/open the session
if(isset($_SESSION['userId']) == false) {
  header('Location: sign-in.php');
}

$postTitle = 'Default Title';
$postImg = 'no-image.png';
$postContent = 'Default content here.';
$postId = -1;
$formAction = 'insert-post.php';

if(isset($_GET['update'])) {
  $postId = $_GET['update'];

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
  // get the info from db for that $postId
  $result = $conn->query("SELECT * FROM posts WHERE id = $postId");
  $post = $result->fetch_assoc();
  // update $postTitle, $postImg, $postContent
  // with the values from db
  $postTitle = $post['title'];
  $postImg = $post['img'];
  $postContent = $post['content'];
  $formAction = 'update-post.php';
}

 ?>

 <form action="<?php echo $formAction ?>" method="post">
   <label for="title">Title:</label>
   <input id="title" type="text" name="title" value="<?php echo $postTitle ?>">
   <br>
   <label for="img">Image URL:</label>
   <input id="img" type="text" name="img" value="<?php echo $postImg ?>">
   <br>
   <label for="content">Content:</label>
   <textarea id="content" name="content"><?php echo $postContent ?></textarea>
   <br>
   <input type="hidden" name="id" value="<?php echo $postId ?>">
   <button>Save</button>
 </form>
