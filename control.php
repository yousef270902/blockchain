<?php
 if (isset($_POST["submit"]))
 {
    $value=$_POST["submit"];
    switch($value)
    {
    case'save':
          {
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $EndDate = $_POST['EndDate'];
            $TargetFund = $_POST['TargetFunds'];
            require("functioncamp.php");
            add($Title,$Description,$EndDate,$TargetFund);
        }
        break;
        case'Update':
            {
                $id = $_GET["id"];
                $Title = $_POST['Title'];
                $Description = $_POST['Description'];
                $EndDate = $_POST['EndDate'];
                $TargetFund = $_POST['TargetFund'];
                require("functioncamp.php");
                edit($id,$Title,$Description,$EndDate,$TargetFund);
            }
        default:
        break;
 }
}   



 
 

     
 
?>