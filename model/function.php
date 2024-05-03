<?php
 
 
class us {
    public function newuser($username, $email, $password, $user_type) {
         
        require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php"); // Assuming this file contains your database connection
        $passd= hash('sha256',$password);
        // Prepare the SQL statement
        $sql = "INSERT INTO `users`(`userID`, `name`, `email`, `password`, `user_types`)
                VALUES (NULL, '$username', '$email', '$passd', '$user_type')";
        
        // Execute the SQL statement based on user type
        if ($user_type == 2) {
            $redirect = 'donation.php';
        } elseif ($user_type == 1) {
            $redirect = 'campaign.php';
        } elseif ($user_type == 3) {
            $redirect = 'donation.php';
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
    public function login($emails,$passwords)
    {
        if($emails=="admin@fundwings.com"&&$passwords=="fundwings")
    {
        $redirect='admin.php'; 
        echo "<script>window.location.replace('$redirect');</script>"; 
    }
    $pass=hash('sha256',$passwords);
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
    $sql= "SELECT * FROM users WHERE email = '$emails' AND `password` = '$pass' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
if (isset($check)) {
    // output data of each row
    echo "<script>window.location.replace('campaign.php');</script>";
    }

    else{
        echo "<script>alert('please Sign Up and Login again  ');</script>"; 
         echo "<script>window.location.replace('homepage.php');</script>";
    }   
}
    
}
class data
{
    public function review($filename,$title,$description,$targetfund,$enddate,$metamask,$option,$addemail)
    {
      require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
  
      $sql = "INSERT INTO temp(id, img, Title, Description, Target_Fund, end_date, metamask,category_id, email)
      VALUES (NULL,'$filename', '$title', '$description', '$targetfund','$enddate','$metamask','$option','$addemail')";
  
      $result = mysqli_query($conn, $sql);
  
      // Redirect based on the result
      if ($result) {
          echo "<script>alert('waiting mail for acceptance or rejection');</script>";
      } else {
          echo "Failed: " . mysqli_error($conn);
      }
  
  
    }
  
    public function adding($id,$file,$Title,$Description,$target,$Enddate,$Metamask,$category)
    {
  
      require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
      require("algorithms.php");
      $titleenc = encryptthis($Title, $key);
      $descenc = encryptthis($Description, $key);
      $s = "SELECT * FROM campaign WHERE id='$id'";
  $r = mysqli_query($conn, $s);
  
  if ($r && mysqli_num_rows($r) > 0) {
      echo "<script>alert('Campaign found, do not insert it again.');</script>";
  } else {
      $sql = "INSERT INTO campaign(id, img, title, description,catgory, TargetFund, endDate, meta)
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
    $sql = "DELETE FROM `temp` WHERE id='$ID'";
$result = mysqli_query($conn, $sql);

// Redirect based on the result
if ($result) {
    echo "<script>alert('Deleted successfully');</script>";
} else {
    echo "Failed: " . mysqli_error($conn);
}

  }
  /*public function searchby($search)
  {
    $sql = "SELECT * FROM `campaign` WHERE title='$search'";
    require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/db-conn.php");
    $result = mysqli_query($conn, $sql);

    // Redirect based on the result
     if ($result) {
      echo "<script> alert('founded');</script>";
     }   else {
      echo "Failed: " . mysqli_error($conn);
    }
  }*/
}


?>
