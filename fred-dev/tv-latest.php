<tr>
  <th>ID</th>
  <th>NAME</th>
  <th>GENRE</th>
</tr>
<?php
//fred-dev/tv-latest.php
//get all tv shows
//put into a set of rows

require 'db.php';
$db = new DB();

$result = $db->query("SELECT * FROM tv_shows");

while ($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['genre'] ?></td>
  </tr>
<?php } ?>
