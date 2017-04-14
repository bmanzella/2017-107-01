<?php
// fred-dev/create-post.php

// Don't let anybody access the site
// Who has not logged in yet. ($_SESSION[user...] is set)
session_start(); // check/open the session
if(isset($_SESSION['userId']) == false) {
  header('Location: sign-in.php');
}
require 'db.php';
$db = new DB();
$postTitle = 'Default Title';
$postImg = 'no-image.png';
$postContent = 'Default content here.';
$postId = -1;
$formAction = 'insert-post.php';

if(isset($_GET['update'])) {
  $postId = $_GET['update'];

  // get the info from db for that $postId
  $prepare = $statement = $db->conn->prepare("SELECT * FROM posts WHERE id = ?");
  $bind = $statement->bind_param("i", $postId);
  $execute = $statement->execute();
  $bindResult = $statement->bind_result($postId, $postTitle, $postContent, $postImg, $postUserId);
  $fetch = $statement->fetch();
  $statement->free_result(); // needed to run multipe queries
  $formAction = 'update-post.php';

  // get all tags associate with this post NOTE: injection safe
  $existingTagResult = $db->query("SELECT tag_id from posts_tags where post_id = $postId");
  $existingTagIds = [];
  while($row = $existingTagResult->fetch_assoc()) {
    $existingTagIds[] = $row['tag_id'];
  }
}

// get all tags
$tagResult = $db->query('SELECT * FROM tags');
$tags = [];
while($row = $tagResult->fetch_assoc()) {
  $row['checked'] = ''; // default, not checked

  //Look to see if we should check it from the existing tag ids
  foreach ($existingTagIds as $tagId) {
    if($row['id'] == $tagId) {
      $row['checked'] = 'checked';
    }
  }
  $tags[] = $row;
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

   <h3>Tags</h3>
   <?php foreach($tags as $tag) { ?>
     <label for="<?php echo $tag['name'] ?>"><?php echo $tag['name'] ?></label>
     <input type="checkbox" <?php echo $tag['checked'] ?> name="<?php echo $tag['name'] ?>" value="<?php echo $tag['id'] ?>">
   <?php } ?>
   <!-- <label for="news">News</label>
   <input type="checkbox" name="news" value="1">
   <label for="music">Music</label>
   <input type="checkbox" name="music" value="3">
   <label for="tech">Tech</label>
   <input type="checkbox" name="tech" value="5"> -->
   <hr>
   <button>Save</button>
 </form>
