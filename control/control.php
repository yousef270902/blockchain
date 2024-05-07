<?php
require("C:/xampp/htdocs/INF06/FundWings_Web_App/model/function.php");
    $add= new user();
    $new= new wing();
    $s= new Admin();
    $t = new transactions();
 if (isset($_POST["submit"]))
 {
    $value=$_POST["submit"];
    switch($value)
    {
 case 'Create Campaign':{
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $confirmpassword=$_POST['confirmpassword'];
    $user_type="1";
 if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false&&$password===$confirmpassword)
         { $new->register($username,$email,$password,$user_type) ; }
      else{
         echo"<script>alert('check input entered');</script>";
      }    
        
 }
 
 break;
 case 'Donate Campaign':{

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $user_type="2"; 
    $confirmpassword=$_POST['confirmpassword'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false&&$password===$confirmpassword)
    { $new->register($username,$email,$password,$user_type) ; }
 else{
    echo"<script>alert('check input entered');</script>";
 } 
 }
 break;
 case 'invest Campaign':{

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $user_type="3";
    $confirmpassword=$_POST['confirmpassword']; 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false&&$password===$confirmpassword)
         { $new->register($username,$email,$password,$user_type) ; }
      else{
         echo"<script>alert('check input entered');</script>";
      } 
 }
 break;
    case 'login':
      {
         $passwords = $_POST['passwords'];
         $emails = $_POST['email'];
         if (!filter_var($emails, FILTER_VALIDATE_EMAIL) === false)
          {
             $add->login($emails, $passwords);
          } 
          else
           {
              echo "<script>alert('Check input entered');</script>";
           }
           }
     break;
     case 'Save':
      {
         $filename = $_POST['Image'];
         //$folder = "./image/" . $filename;
         $title=$_POST['Title'];
         $description=$_POST['Description'];
         $targetfund=$_POST['TargetFund'];
         $enddate=$_POST['EndDate'];
         $metamask=$_POST['MetamaskAccount'];
         $option=$_POST['options'];
         $addemail=$_POST['addemail'];
         
         if (filter_var($targetfund, FILTER_VALIDATE_INT) === 0 || !filter_var($targetfund, FILTER_VALIDATE_INT) === false &&!filter_var($addemail, FILTER_VALIDATE_EMAIL) === false&&!filter_var($description, FILTER_SANITIZE_STRING)===false)
         { $new->initiate_campaign($filename,$title,$description,$targetfund,$enddate,$metamask,$option,$addemail); }
      else{
         echo"<script>alert('check input entered');</script>";
      }
      }
      break;
      case 'upload':
         {
           $file=$_POST['image'] ;
           $Title=$_POST['title'];
           $Description=$_POST['description'];
           $target=$_POST['target'];
           $Enddate=$_POST['end'];
           $Metamask=$_POST['meta'];
           $category=$_POST['type'];
           $id=$_POST['id'];
           $s->add_campaign($id,$file,$Title,$Description,$target,$Enddate,$Metamask,$category);

         }
         break;
         case 'deny';
         {
        $ID=$_POST['id'];
        $s->deleterequest($ID);
         }
         break;
            case 'send Email':
               {
                  $message = "New Campaign available Now";
                  $from = "admin@fundwings.com";
                  $s->send($message,$from);
               }
               break;
               case 'Pay Now':
                  {
                    $campaigns=$_POST['campaign'];
                    $amounts=$_POST['amount'];
                    $t->process_transaction($amounts,$campaigns);
                  }
                  break;
}



 }
    
   ?>
