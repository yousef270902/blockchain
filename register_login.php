<?php
require('C:\xampp\htdocs\folders\model\userclass.php');
//user register 
$fname=$_POST['fristName'];
$lname=$_POST['lastName'];
$email=hash('sha256',$_POST["email"]);
$passwd=hash('sha256',$_POST["password"]);
$conf_passwd=hash('sha256',$_POST["confirm_password"]);
$user= new users();
$user->register($fname,$lname,$email,$passwd,$conf_passwd);
?>