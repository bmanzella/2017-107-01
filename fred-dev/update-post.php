<?php

// fred-dev/update-post.php

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
// Run the update
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$id = $_POST['id'];

$result = $conn->query(
  "UPDATE posts
    SET title='$title',
        img='$img',
        content='$content'
    WHERE id = $id"
);

if($result) {
  header('Location: posts.php');
} else {
  die('Could not update the post: ' . $conn->error);
}
