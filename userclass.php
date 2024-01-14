<?php
class users
{
     
public function register($fname,$lname,$email,$passwd,$confirm_password)
{
    require ('C:\xampp\htdocs\folders\control\connection.php');
    if(isset($_POST['submitt']))
    {
        if($passwd===$confirm_password)
       { $sql="INSERT INTO `register` VALUES  ('','$fname','$lname','$email','$passwd')"; 
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('data inserted succesfully');</script>";
          }
          else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
        }
        else{
            echo "<script>alert('password does not match');</script>";  
        }
    }

}

     public function login($email_login,$password_login)
    {
        $this->email=$email_login;
        $this->passwd=$password_login;
    }
}
?>