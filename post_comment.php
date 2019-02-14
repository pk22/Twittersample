<?php
require('Comments.php');

$db = new Persistence();
$added = $db->add_comment($_POST);

if($added) {
  header( 'Location: assign.php' );
}
else {
  header( 'Location: assign.php?error=Your comment was not posted due to errors in your form submission' );
}
?>