<?php //fred-dev/tv-shows.php
 ?>

<?php include "tv-header.php" ?>

<table>
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>GENRE</th>
  </tr>
  <?php
    require 'db.php';
    $db = new DB();

    $result = $db->query(
      "SELECT * FROM tv_shows"
    );

    $shows = [];
    while ($row = $result->fetch_assoc()) {
      $shows[] = $row;
    }

    foreach($shows as $show) {
   ?>
   <tr>
     <td><?php echo $show['id'] ?></td>
     <td><input value="<?php echo $show["name"] ?>"></td>
     <td><input value="<?php echo $show["genre"] ?>"></td>
   </tr>
   <?php } ?>
</table>

<button onclick="refresh()"> Refresh! </button>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
function refresh() {
  $('button').html('<img src="animal.gif">');
  setTimeout(() => {
    $.get('tv-latest.php')
      .done(newTable => {
        $('table').html(newTable);
        $('button').html('Refresh!');
      })
      .fail(e => console.error(e));
  }, 3000);
}
</script>

<?php include "tv-footer.php" ?>
