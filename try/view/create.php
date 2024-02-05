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

   <title>New Campaign</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Make Your Own Campaign
   </nav>
    
   <div class="container">
      <div class="text-center mb-4">
         <h3> Create Campaign</h3>
         <p class="text-muted">Complete the form below to Create Campaign</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Title:</label>
                  <input type="text" class="form-control" name="Title" placeholder="..." required>
               </div>

               <div class="col">
                  <label class="form-label">Description:</label>
                  <input type="text" class="form-control" name="Description" placeholder="..."required>
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">EndDate:</label>
               <input type="Date" class="form-control" name="EndDate" placeholder=""required>
            </div>

            <div class="form-group mb-3">
               <label class="form-label">TargetFunds:</label>
               <input type="INT" class="form-control" name="TargetFund" placeholder=""required>
            </div>

            <div>
               <input type="submit" class="btn btn-success" name="submit" value="save">
               <a href="homepage.php" class="btn btn-danger">Cancel</a>
               <a href="homepage.php" class="btn btn-primary">return home page</a>
            </div>
         </form>
         
      </div>
   </div>
   <?php require("C:/xampp/htdocs/try/control/control.php");?>
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>