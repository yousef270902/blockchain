<?php
class wing {
    public function register($username, $email, $password, $user_type) {
         
        require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php"); 
        // Assuming this file contains your database connection
        require("C:/xampp/htdocs/INF06/FundWings_Web_App/model/algorithms.php");
        $passd= hash('sha256',$password);
        // Prepare the SQL statement
        $sql = "INSERT INTO `users`(`userID`, `name`, `email`, `password`, `user_types`)
                VALUES (NULL, '$username', '$email', '$passd', '$user_type')";
            $emails=encryptthis($email, $key);
        // Execute the SQL statement based on user type
        if ($user_type == 2) {
            $redirect = 'donation.php?email='.$emails;
        } elseif ($user_type == 1) {
            $redirect = 'campaign.php?email='.$emails;
        } elseif ($user_type == 3) {
            $redirect = 'donation.php?email='.$emails;
        } else {
            echo "Invalid user type";
            return; // Exit the function if user type is invalid
        }

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Redirect based on the result
        if ($result) {
            echo "<script>window.location.replace('$redirect');</script>";
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
    public function initiate_campaign($filename,$title,$description,$targetfund,$enddate,$metamask,$option,$addemail)
  {
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
   
    $sql = "INSERT INTO `temp`(`id`, `img`, `Title`, `Description`, `Target_Fund`, `end_date`, `metamask`,`category_id`, `email`)
    VALUES (NULL,'$filename', '$title', '$description', '$targetfund','$enddate','$metamask','$option','$addemail')";
     
    $result = mysqli_query($conn, $sql);
     
    // Redirect based on the result
    if ($result) {
        echo "<script>alert('waiting mail for acceptance or rejection');</script>";
    } else {
        echo "Failed: " . mysqli_error($conn);
    }


  }
    

    
}
class user
{
    public function login($emails, $passwords)
{
    if ($emails == "admin@fundwings.com" && $passwords == "fundwings" ||$emails=="admin2@fundwings.com"&&$passwords == "fundwings"||$emails=="admin3@fundwings.com"&&$passwords == "fundwings") {
        $redirect = 'admin.php';
        echo "<script>window.location.replace('$redirect');</script>";
    }
    
    $pass = hash('sha256', $passwords);
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
    $sql = "SELECT * FROM users WHERE email = '$emails' AND `password` = '$pass'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);

    if ($check) {
        // Redirect to donation.php if user exists
        require("C:/xampp/htdocs/INF06/FundWings_Web_App/model/algorithms.php");
        $email=encryptthis($emails, $key);
        echo "<script>window.location.replace('donation.php?email=$email');</script>";
    } else {
        // If user not found, redirect to homepage.php and display alert
        echo "<script>alert('Please sign up and login again.');</script>";
        echo "<script>window.location.replace('homepage.php');</script>";
    }
}
}
class Admin
{
    public function add_campaign($id,$file,$Title,$Description,$target,$Enddate,$Metamask,$category)
  {
     
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
    require("algorithms.php");
    $titleenc = encryptthis($Title, $key);
    $descenc = encryptthis($Description, $key);
    $s = "SELECT * FROM `campaign` WHERE id='$id'";
$r = mysqli_query($conn, $s);

if ($r && mysqli_num_rows($r) > 0) {
    echo "<script>alert('Campaign found, do not insert it again.');</script>";
} else {
    $sql = "INSERT INTO `campaign`(`id`, `img`, `title`, `description`,`catgory`, `TargetFund`, `endDate`, `meta`)
            VALUES ('$id', '$file', '$titleenc', '$descenc','$category','$target', '$Enddate', '$Metamask')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Added successfully.');</script>";    
    } else {
        echo "Insertion failed: " . mysqli_error($conn);
    }
}
  

  }
  public function deleterequest($ID)
{
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");

    // Delete the record from the campaign table
    $sql_campaign = "DELETE FROM `campaign` WHERE id='$ID'";
    $result_campaign = mysqli_query($conn, $sql_campaign);
    if (!$result_campaign) {
        throw new Exception("Deletion from campaign failed: " . mysqli_error($conn));
    }
    else{
        echo "<script>alert('Campaign deleted.');</script>";
    }
    // Delete the record from the temp table
    $sql_temp = "DELETE FROM `temp` WHERE id='$ID'";
    $result_temp = mysqli_query($conn, $sql_temp);
    if ($result_temp && mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Request deleted.');</script>";
        echo "<script>window.location.replace('admin.php');</script>";
    }
  else
     {
        throw new Exception("Deletion from temp failed: " . mysqli_error($conn));
     }  
     
}
public function send($message,$from)
  {
require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
$sql = "SELECT  `email`,`user_types` FROM `users` WHERE user_types in(2,3)";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
        $to = $row["email"];
        // Send email
        error_reporting(E_ERROR | E_PARSE);
        mail($to, $message, "From: $from");
    }
    echo "<script>alert('Emails sent successfully!');</script>";
     
} 
else
{
    echo "<script>alert('no users found');</script>";
}
  
}
}
class transactions
{
  public function  process_transaction($amounts,$campaigns)
  {
    require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51P2CnADCFJfa5pUXmOmN6HfcTtn05GGNWdOYCiyG1gZ1DoFddDrqriDPoUmi90h2l2l16ohgrn8jyvgxP6QQCdAm00xfC537G8";

\Stripe\Stripe::setApiKey($stripe_secret_key);
    $amount = $amounts;
    $campaign = $campaigns;
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://localhost/INF06/FundWings_Web_App/view/pages/homepage.php",
            "cancel_url" => "http://localhost/INF06/FundWings_Web_App/view/pages/pay.php",
            "locale" => "auto",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "usd",
                        "unit_amount" => $amount * 100, // Amount should be in cents
                        "product_data" => [
                            "name" => $campaign
                        ]
                    ]
                ]
            ]
        ]);
        
        // Redirect to the checkout session URL
        http_response_code(303);
        header("Location: " . $checkout_session->url);
         // Ensure no further code execution after redirection
    }  
}  


   


  
  


?>