<?php

class DB {

  public $conn;

  function __construct() {
    $server = 'fred-dev.caokxintrssz.us-east-1.rds.amazonaws.com';
    $user = 'laonaumc_fred';
    $pw = 'fredonia-rocks';
    $this->conn = new mysqli(
      $server, $user, $pw, 'laonaumc_wpdb'
    );

    if ($this->conn->connect_error) {
      die('connection failed: ' . $this->conn->connect_error);
    }
  }

  public function query($sql) {
    $result = $this->conn->query($sql);
    if($result) {
      return $result;
    } else {
      die('Query error: ' . $this->conn->error);
    }
  }

  public function queryOne($sql) {
    $result = $this->conn->query($sql);
    if($result) {
      return $result->fetch_assoc();
    } else {
      die('QueryOne error: ' . $this->conn->error);
    }
  }


  public function getPostWithTagsById($id) {

    // P. B. E.
    // Prepare, Bind, and Execute

    // Preparing sets up a sql query, that specifies where
    // the input placeholders are (replace all values with ?)
    // EX:INSERT INTO users (aka, username, pass) VALUES (?, ?, ?)
    $sql = $this->conn->prepare(
      "SELECT p.*, GROUP_CONCAT(t.name) as tags
        FROM posts p
        JOIN posts_tags pt ON pt.post_id = p.id
        JOIN tags t ON t.id = pt.tag_id
        WHERE p.id = ?
        GROUP BY p.id"
    );

    // catch an error
    if(!$sql) {
      die("Prepare failed: " . $this->conn->error);
    }

    // Binding takes the input, and puts it safely into the
    // query. First argument is data types, reset are the input
    // to use instead of ?'s
    // EX: bind_param("sss", $aka, $username, $_POST["pass"]);
    if(!$sql->bind_param("i", $id)) {
      die("bind_param failed: " . $sql->error);
    }

    // Execute runs the query
    if(!$sql->execute()) {
      die("execute failed: " . $sql->error);
    } // returns false if fails

    // For SELECT only:
    if(!$sql->bind_result(
      $postId, $postTitle, $postContent, $postImg, $postUser, $postTags
    )) {
      var_dump($sql);
      var_dump($this->conn);
      die("bind_result failed: " . $sql->error);
    }

    if(!$sql->fetch()) {
      die("Couldn't find that post");
    } //get a row, stores values in bind_result vars
    // return a friendly object
    return [
      "id" => $postId,
      "title" => $postTitle,
      "content" => $postContent,
      "img" => $postImg,
      "user_id" => $postUser,
      "tags" => $postTags
    ];
  }












}
