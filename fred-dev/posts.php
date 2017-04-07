<?php
/* posts.php */

// Don't let anybody access the site
// Who has not logged in yet. ($_SESSION[user...] is set)
session_start(); // check/open the session
if(isset($_SESSION['userId']) == false) {
  header('Location: sign-in.php');
}

// fred-dev/posts.php
$server = 'fred-dev.caokxintrssz.us-east-1.rds.amazonaws.com';
$username = 'laonaumc_fred';
$password = 'fredonia-rocks';

// tries to connect to mysql
$connection = new mysqli(
  $server, $username, $password, 'laonaumc_wpdb'
);

// check if it failed
if($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// run a select statement
$result = $connection->query("SELECT * FROM posts");

// set up an empty array
$posts = [];

// for each row, add a "post" object to the array
while($row = $result->fetch_assoc()) {
  $posts[] = $row;
}

// close the connection
$connection->close();

 ?>

 <h1>Posts</h1>
 <h2>Welcome <?php echo $_SESSION['useraka'] ?>!</h2>
 <a href="./"><< Back</a>
 <a href="create-post.php">Create a new post</a>
 <ul>
   <?php foreach ($posts as $post) { ?>
     <li><a href="individual-post.php?id=<?php echo $post['id'] ?>"><?php echo $post["title"] ?></a></li>
   <?php } ?>
 </ul>
