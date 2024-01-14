<?php
 
  $id = $_GET["id"];
  require ("db-conn.php");
$sql = "DELETE FROM `campains` WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}


 
