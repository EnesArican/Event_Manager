<?php
require('Support.php');

$db = new Support();
$added = $db->add_comment($_POST);

if($added) {
  header( 'Location: feedback.php' );
}
else {
  header( 'Location: feedback.php?error=Your comment was not posted due to errors in your form submission' );
}
?>
