<?php
//fred-dev/insert-tag.php
require 'db.php';

$db = new DB();

$db->query(
  "INSERT INTO tags (name) VALUE ('$_POST[name]')"
);

header('Location: create-tag.php');
