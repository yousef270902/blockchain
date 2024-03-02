<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
  <style>
        body {
            padding-top: 50px;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #00ff5573;
        }

        .custom-header {
            background-color: #343a40; /* Dark background color */
            padding: 20px;
            text-align: center;
            color: #ffffff; /* Text color */
            margin-bottom: 20px;
        }

        .logo {
            width: 80px; /* Adjust the logo width as needed */
            height: auto; /* Maintain aspect ratio */
            margin-right: 10px;
        }

        .header-title {
            font-size: 24px;
            margin-bottom: 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }
        

        input[type="search"] {
            border: none;
            border-bottom: 2px solid blue;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        main {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="custom-header">
        <img src="image/logo.png" alt="Logo" class="logo"> 
        <h1 class="header-title">Donation Page</h1>
    </div>

    <div class="container">
        <form action="">
            <input type="search" id="gsearch" name="gsearch" class="form-control" placeholder="Search...">
            <button type="submit" class="btn btn-dark btn-block mt-3">Search</button>
        </form>
        <?php
require("C:/xampp/htdocs/try/control/db-conn.php");
$sql = "SELECT `Title`, CAST(AES_DECRYPT(UNHEX(`Title`), 'fund_wings_2024$') AS CHAR(100)) AS decrypted_title,`Description`, `EndDate`, `TargetFunds` FROM `campains`";
$result = mysqli_query($conn, $sql) ;
while ( $row = mysqli_fetch_array($result) ) :
  ?>
  <main class="py-4">
      <div class="row">
          <div class="col-sm-6 mx-auto">
              <div class="card">
              </h4>
                    <div class="card-body"><b> Campaign Name:<br><?php echo $row['Title'];?></b></div>
                    <div class="card-body"><b> Campaign Description:<br><p><?php echo $row['Description']?></b></p></div>
                    <div class="card-body"><b> Campaign End Date : <br><?php echo $row['EndDate']?></b></div>
                    <div class="card-body"><b> Campaign Total Fund: <br><?php echo $row['TargetFunds']?></b></div>
                    <div class="card-footer text-center">
                                <a href="./smart/app/index.html" class="btn btn-primary">Donate Now</a>
                </div>
            </div>
  </main>
<?php
endwhile;
?>
</div>
</body>

</html>