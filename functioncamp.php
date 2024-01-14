<?php
 
function add($Title,$Description,$EndDate,$TargetFund)
{
    require("db-conn.php");
    $sql = "INSERT INTO `Campains`(`Title`, `Description`, `EndDate`, `TargetFunds`) 
    VALUES ('$Title','$Description','$EndDate','$TargetFund')";
 
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
       header("Location: index.php?msg=New record created successfully");
    } else {
       echo "Failed: " . mysqli_error($conn);
    }   
}
function edit($id,$Title,$Description,$EndDate,$TargetFund)
{
   require("db-conn.php");
   $sql = "UPDATE `campains` SET `Title`='$Title',`Description`='$Description',`EndDate`='$EndDate',`TargetFunds`='$TargetFund' WHERE id = $id";

   $result = mysqli_query($conn, $sql);
 
   if ($result) {
     header("Location: index.php?msg=Data updated successfully");
   } else {
     echo "Failed: " . mysqli_error($conn);
   }
}
function delete($id)
{
   require("db-conn.php");
   $sql = "DELETE FROM `campains` WHERE Id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
}
?>