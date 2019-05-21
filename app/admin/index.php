<?php
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "string";
if (empty($_SESSION['admin'])) {
  header("location:../../index.php");
}
// session_destroy();
 ?>
