<?php
  //fred-dev/individual-post.php?id=423

  // Don't let anybody access the site
  // Who has not logged in yet. ($_SESSION[user...] is set)
  session_start(); // check/open the session
  if(isset($_SESSION['userId']) == false) {
    header('Location: sign-in.php');
  }

  require 'db.php';

  $db = new DB();

  // OLD VERSION
  // $post = $db->queryOne("SELECT * FROM posts WHERE id = $_GET[id]");
  // PBE VERSION
  $post = $db->getPostWithTagsById($_GET["id"]);
  // $author = false;
  $author = $db->queryOne("SELECT aka FROM users WHERE id = $post[user_id]");

  // Check for anon authors
  if($author == false) {
    $author = [
      'aka' => 'Anonymous'
    ];
  }
 ?>

 <h1>Post</h1>
 <a href="posts.php"> << Back to list</a>
 <br>
 <a href="delete-post.php?id=<?php echo $post['id'] ?>">Delete this post</a>
 <br>
 <a href="create-post.php?update=<?php echo $post['id'] ?>">Edit this post</a>
 <h2><?php echo $post['title'] ?></h2>
 <em>by <?php echo $author['aka'] ?></em>
 <blockquote>
   <?php echo $post["tags"] ?>
 </blockquote>
 <hr>
 <img src="<?php echo $post['img'] ?>" alt="">
 <p><?php echo $post['content'] ?></p>
