<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('includes/app.php');

$database = new Dbh();
$db = $database->connect();

$post = new Post($db);


if(isset($_POST['delete'])){
    $checkbox = isset($_POST['checkbox']) ? $_POST['checkbox'] : array();
    foreach($checkbox as $del_id) {
        $post->delete($del_id);
      }
    header('location:index.php'); 
    echo ('items successfully deleted');
  }