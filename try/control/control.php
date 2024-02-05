<?php
 if (isset($_POST["submit"]))
 {
    $value=$_POST["submit"];
    switch($value)
    {
    
        case 'save':
            {
                $Title = $_POST['Title'];
                $Description = $_POST['Description'];
                $EndDate = $_POST['EndDate'];
                $TargetFunds = $_POST['TargetFund']; 
                require("C:/xampp/htdocs/try/model/functions.php");
                $add= new data(); 
                $add->review($Title,$Description,$EndDate,$TargetFunds) ;
            }
            case 'add':
                {
                 
                $t = $_POST['t'];
                $d = $_POST['d'] ;
                $e =  $_POST['e'];
                $f = $_POST['f']; 
                    require("C:/xampp/htdocs/try/model/functions.php");
                    $add= new data(); 
                  $add->add( $t,$d,$e,$f) ;

                }
            break;
            case 'signup':
                {
                    $name=$_POST['username'];
                    $email=$_POST['email'];
                    $passwd=$_POST['password'];
                    $confirm=$_POST['confirmpassword'];
                    require("C:/xampp/htdocs/try/model/functions.php");
                    $signup = new user();
                    $signup->signup($name,$email,$passwd,$confirm);
                }
                case 'check':
                    {
                       $nam=$_POST['emails']; 
                       $pass=$_POST['passwords'];
                       require("C:/xampp/htdocs/try/model/functions.php");
                       $login = new user();
                       $login->login($nam,$pass);
                    }
                    break;
            default:
            break;
    }
}
?>