<?php
  include_once 'Header.php';
  include_once '..\includes\db.inc.php';
 
  if (isset($_SESSION['Id'])) {
    echo "<p>Welcome ".$_SESSION['name']."</p>";
  }

?>
 