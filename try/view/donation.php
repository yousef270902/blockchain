 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation page</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Donation Page
  </nav>
  <center>
  <form action="">
  <input type="search" id="gsearch" name="gsearch" style="border:none; border-bottom: 2px solid blue; ">
  <br>
  <br>
  <input type="submit" value="search" class="btn btn-dark mb-3">
</form>
</center>
 <?php
require("C:/xampp/htdocs/try/control/db-conn.php");
$sql = "SELECT `Title`, CAST(AES_DECRYPT(UNHEX(`Title`), 'fund_wings_2024$') AS CHAR(100)) AS decrypted_title,`Description`, `EndDate`, `TargetFunds` FROM `campains`";
$result = mysqli_query($conn, $sql) ;
while ( $row = mysqli_fetch_array($result) ) :
?>
    <main class="py-4 container"  >
         <div class ="row">
         <div class="col-sm-6">
                <div class="card">
                    <h4 class="card-header">
                         
                    </h4>
                    <div class="card-body"><b> campaign name:<br><?php echo $row['Title'];?></b></div>
                    <div class="card-body"><b> campaign Description:<br><p><?php echo $row['Description']?></b></p></div>
                    <div class="card-body"><b> campaign End Date : <br><?php echo $row['EndDate']?></b></div>
                    <div class="card-body"><b> campaign Total Fund: <br><?php echo $row['TargetFunds']?></b></div>
                    <div class="card-footer"><a href="checkout.php">Donate Now</a></div>
                </div>
            </div>
</main>
<?php
endwhile;
?>
 </body>
 </html>