<?php
//fred-dev/create-tag.php

// get all tags
require 'db.php';
$db = new DB();

$result = $db->query("SELECT * FROM tags");

// tags placeholder
$tags = [];

// loop through the result and grab all tags
while($tag = $result->fetch_assoc()) {
  $tags[] = $tag;
}

 ?>

 <form action="insert-tag.php" method="post">
   <label for="name">Name:</label>
   <input type="text" name="name">
   <button>Create</button>
 </form>

 <h2>Current available tags</h2>
 <table border="1">
   <tr>
     <th>id</th><th>name</th>
   </tr>
   <?php foreach($tags as $tag) { ?>
   <tr>
     <td><?php echo $tag['id'] ?></td>
     <td><?php echo $tag['name'] ?></td>
   </tr>
   <?php } ?>
 </table>
