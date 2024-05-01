<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.2.7-rc.0/web3.min.js"></script>
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>
    <div class="navbar">
        <button style="background:transparent;color:white; border:none;" onclick="campaign()">Dashboard</button>
        <button style="background:transparent;color:white; border:none;" onclick="user()">Users</button>
        <a href="homepage.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="container">
        <h1>Admin Dashboard</h1>

        <h2>Campaigns</h2>
        <ul class="campaign-list" id="campaignList">
            <!-- Campaigns will be dynamically added here -->
        </ul>
    </div>
    <form method="post">
    <?php
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
        $sql = "SELECT * FROM `temp`";
        $result = mysqli_query($conn, $sql);
         
        ?>
    <table class="table table-dark" id="table_campaign" style="display:none;" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">target fund</th>
      <th scope="col">end date</th>
      <th scope="col">meta mask</th>
      <th scope="col">upload</th>
      <th scope="col">deny</th>
      <th scope="col">mail</th>
      <th scope="col">compile</th>
    </tr>
  </thead>
  <tbody> 
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <th scope="row"><input value="<?php echo $row["id"];?>" readonly name="id"></th>
      <td><input value="<?php echo $row["img"];?>" name="image"><img src="../image/<?php echo $row["img"];?>" class="card-img-top" alt="..." style="width:50%;" name="image"></center></td>
      <td><input type="text"     value="<?php echo $row["Title"];?>" class="input" name="title" readonly id="title"></td>
      <td><input type="text"     value="<?php echo $row["Description"];?>" name="description"readonly id="description"></td>
      <td><input type="text"     value="<?php echo $row["Target_Fund"];?>" name="target"readonly id="target"></td>
      <td><input type="text"     value="<?php echo $row["end_date"];?>" name="end" readonly id="end"></td>
      <td><input type="text"     value="<?php echo $row["metamask"];?>" name="meta" readonly></td>
      <td><input type="submit" class="btn btn-primary" name="submit" value="upload"></td>
      <td> <input type="submit"class="btn btn-primary" name="submit" value="deny"></td>
      <td> <a href="mailto:<?php echo $row["email"];?>" class="btn btn-primary"><i class="fa fa-envelope"></i></a></td>
      <td><button onclick="connectmetamask()" class="btn btn-primary">compile</button></td>
      <!--<td><button onclick="connectcontract()" class="btn btn-primary"> connect contract</button></td>
       <td><button onclick="getdata()" class="btn btn-primary"><i class="fa fa-circle-o-notch" style="color:white;" ></i></button></td>
      <td><button onclick="senddata()" class="btn btn-primary">send data</button></td>!-->
      
    </tr>
    <?php } ?>
  </tbody>
   
</table>
<script src="../scripts/donation_decenterlization.js"></script>    
        </form>
        <?php
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
        $sql = "SELECT `userID`, `name`, `email` FROM `users` WHERE user_types=2";
        $result = mysqli_query($conn, $sql);
        ?>
  <center> <table class="table table-sm table-dark" style="display:none;" id="table_user">
    
  <thead style="width:100%;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">user name</th>
      <th scope="col">email</th>
      <th scope="col">user type</th>
    </tr>
  </thead>
  
  <tbody style="width:100;"> 
  <?php
     while ($row = mysqli_fetch_assoc($result)) {
     ?>
  <tr>
      
      <th scope="row"><?php echo $row["userID"];?></th>
      <td> <?php echo $row["name"];?></td>
      <td><?php echo $row["email"];?></td>
      <td> <?php echo"Donator"?>
    </tr>
    <?php } ?>
  </tbody>
</table>
     </center>
           
        </div>
      </div>
    <script src="../scripts/admin.js"></script>
     
      <?php require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/control.php");?>
</body>
</html>
