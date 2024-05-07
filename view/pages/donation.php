<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Campaigns</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="../css/donation.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.2.7-rc.0/web3.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"><img src="../image/icon.png"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<div class="app-icon">
<img src="../image/icon.png" >
</div>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0c" style="padding:4px;">
<li class="nav-item">
<a class="nav-link" href="blockchain.html">Transaction History</a>
</li> 
<li class="nav-item">
<?php
require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
require("C:/xampp/htdocs/INF06/FundWings_Web_App/model/Algorithms.php"); 
?>
<?php 
if(isset($_GET['email'])) {
    $email = decryptthis($_GET['email'], $key);
    $e=encryptthis($email,$key);
         ?>
<a class="nav-link" href="campaign.php?email=<?php echo $e;}?>">Create Campaign</a>
 
</li>
<li class="nav-item active">
<a class="nav-link" href="homepage.php">logout</a>
</li> 
</ul>
</div>
</nav>       
</head>
<body>
<script type="text/javascript">
(function(d, t) {
var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
v.onload = function() {
window.voiceflow.chat.load({
verify: { projectID: '65e335035671df3be500c724' },
url: 'https://general-runtime.voiceflow.com',
versionID: 'production'
});
}
v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
})(document, 'script');
</script>
<div class="container mt-4">
<h4 class="text-center mb-4 campaigns-heading">Campaigns</h4>
<label for="filter" class="mr-2">Filter by:</label>
<form class="form-inline mb-4" method="post">
<input type="submit" class="btn btn-outline-primary" style="margin:5px;" name="filter"   value="sport"> 
<input type="submit" class="btn btn-outline-primary" style="margin:5px;" name="filter"   value="medcine"> 
<input type="submit" class="btn btn-outline-primary" style="margin:5px;" name="filter"   value="charities"> 
<input type="submit" class="btn btn-outline-primary" style="margin:5px;" name="filter"   value="ALL Campaigns"> 
</form>
<br>
 
<br>
 
<section class="row" id="filtercampaign">
<?php 
if (isset($_POST["filter"])) {
    $f = $_POST["filter"];
    switch ($f)
    {
           case 'ALL Campaigns':
            {
                $s = "SELECT * FROM `campaign`";
                $r = mysqli_query($conn, $s);
            }
            break;
           case 'sport': 
            {
                $s = "SELECT * FROM `campaign` WHERE catgory='sport'";
                $r = mysqli_query($conn, $s);
            }
            break;
            case 'medcine': 
                {
                    $s = "SELECT * FROM `campaign` WHERE catgory='medcine'";
                    $r = mysqli_query($conn, $s);
                }
            break;
           case 'charities': 
                {
                    $s = "SELECT * FROM `campaign` WHERE catgory='charities'";
                    $r = mysqli_query($conn, $s);
                }
                    break;


    }
     

    if ($r) { // Check if query was successful
        while ($row = mysqli_fetch_assoc($r)) {
?>
<div class="col-sm-4">
    <div class="card campaign-card">
        <div class="card-body">
            <center><img src="../image/<?php echo $row['img']; ?>" style="width:100%;"></center>
            <br>
            <h5 class="card-title"><?php echo decryptthis($row['title'], $key); ?></h5>
            <p class="card-text"><?php echo decryptthis($row['description'], $key); ?></p>
            <p class="card-text"><strong>category:<?php echo $row['catgory']; ?> </strong></p>
            <p class="card-text"><strong>Target Fund: <?php echo $row['TargetFund']; ?> </strong></p>
            <p class="card-text"><strong>End Date : <?php echo $row['endDate']; ?> </strong></p>
            <p class="card-text"><strong>MetaMask:<?php echo $row['meta']; ?> </strong></p>
            <?php 
if(isset($_GET['email'])) {
    $email = decryptthis($_GET['email'], $key);
    $e=encryptthis($email,$key);
    echo "<a href='pay.php?id=" . decryptthis($row['title'], $key) . "&email=" . $e . "' class='btn btn-primary mt-3'>Donate</a>";
}?>
            <button class="btn btn-primary mt-3" onclick="connectmetamask()">meta_mask</button>
            <script src="../scripts/donation_decenterlization.js"></script>
        </div>
    </div>
</div>     
<?php 
        }
    }  
}
?>
</section>    
<div class="footer">
<div class="container">
<div class="row">
<div class="col-lg-4">
<h5>Contact Us</h5>
<p>123 Street Name</p>
<p>City, Country</p>
<p>Phone: +1234567890</p>
<form action="submit_email.php" method="POST">
<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Your Email">
</div>
<div class="form-group">
<textarea class="form-control" name="message" rows="3" placeholder="Your Message"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-lg-8">
<h5>Our Emails</h5>
<p>Email 1: info@example.com</p>
<p>Email 2: support@example.com</p>
<p>Email 3: sales@example.com</p>
</div>
</div>
<p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
</div>
<script>
function showcamp()
{
let x= document.getElementById("campaignsContainer");
let y= document.getElementById("filtercampaign");
if (x.style.display === "none") {
x.style.display = "block";
y.style.display = "none";
}
}
function filter()
{
let x= document.getElementById("campaignsContainer");
let y= document.getElementById("filtercampaign");
if (x.style.display === "none") {
x.style.display = "none";
y.style.display = "block";
}
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
</body>
</html>
