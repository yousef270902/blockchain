<?php

class data{
public function review($Title,$Description,$EndDate,$TargetFunds) 
{
    require("C:/xampp/htdocs/try/control/db-conn.php");
    $sql = "INSERT INTO `temp`(`Id`, `Title`, `Description`, `EndDate`, `TargetFunds`) 
    VALUES (NULL,'$Title','$Description','$EndDate','$TargetFunds') ";
 
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
        header("Location: history.php?msg=New Record");
    } else {
       echo "Failed: " . mysqli_error($conn);
    }
} 
public function add($Title,$Description,$EndDate,$TargetFunds) 
{
    require("C:/xampp/htdocs/try/control/db-conn.php");
    $sql = "INSERT INTO `campains`(`Id`, `Title`, `Description`, `EndDate`, `TargetFunds`) 
    VALUES (NULL,AES_ENCRYPT('$Title','fund_wings_2024$'),AES_ENCRYPT('$Description','fund_wings_2024$'),AES_ENCRYPT('$EndDate','fund_wings_2024$'),'$TargetFunds') ";
 
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
        header("Location: admin.php?msg=New Record");
    } else {
       echo "Failed: " . mysqli_error($conn);
    }
}
}

//////////user/////////////////
class user
{
public function signup($name,$email,$passwd,$confirm)
{
    if($passwd===$confirm)
    {
    require("C:/xampp/htdocs/try/control/db-conn.php");
   $passd= hash('sha256',$passwd);
    $sql = "INSERT INTO  `users`(`id`, `name`, `email`, `password`)
    VALUES (NULL,'$name','$email','$passd') ";
 
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
        echo "<script>window.location.replace('create.php');</script>";
    } else {
       echo "Failed: " . mysqli_error($conn);
    }
}
else{
    echo "<script>alert('password does not  matached  ');</script>"; 
}
}
public function login($nam,$pass)
{
    if($nam=="admin@fundwings.com"&&$pass=="fundwings")
    {
        echo "<script>window.location.replace('admin.php');</script>";  
    }
    require("C:/xampp/htdocs/try/control/db-conn.php");
    $pa=hash('sha256',$pass);
    $sql= "SELECT * FROM users WHERE email = '$nam' AND password = '$pa' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
   if (isset($check)) {
    // output data of each row
    echo "<script>window.location.replace('create.php');</script>";
    }

    else{
        echo "<script>alert('please Sign Up and Login again  ');</script>"; 
         echo "<script>window.location.replace('homepage.php');</script>";
    }
}
}
?>
 