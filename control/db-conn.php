<?php
$servername = "localhost";
$usernamee = "root";
$passworde = "";
$dbname = "graduation_project";

$conn = mysqli_connect($servername,$usernamee,$passworde,$dbname);

if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
?>