<?php
 
  $id = $_GET["id"];
  require ("C:/xampp/htdocs/try/control/db-conn.php");
$sql = "DELETE FROM `temp` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: history.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
?>