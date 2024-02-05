<?php
require("C:/xampp/htdocs/try/control/db-conn.php");
$id = $_GET["id"];

if (isset($_POST["submit"])) {
   $Title = $_POST['Title'];
   $Description = $_POST['Description'];
   $EndDate = $_POST['EndDate'];
   $TargetFunds = $_POST['TargetFund'];

  $sql = "UPDATE `temp` SET `Title`='$Title',`Description`='$Description',`EndDate`='$EndDate',`TargetFunds`='$TargetFunds' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location:  history.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Admin Page</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  Make Your Own Campaign
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Campaign</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `temp` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
        <div class="col">
                  <label class="form-label">Title:</label>
                  <input type="text" class="form-control" name="Title" placeholder="...">
               </div>

               <div class="col">
                  <label class="form-label">Description:</label>
                  <input type="text" class="form-control" name="Description" placeholder="...">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">EndDate:</label>
               <input type="Date" class="form-control" name="EndDate" placeholder="">
            </div>

            <div class="form-group mb-3">
               <label class="form-label">TargetFunds:</label>
               <input type="INT" class="form-control" name="TargetFund" placeholder="">
            </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="history.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>