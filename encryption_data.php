<?php
//user data campain
require('C:\xampp\htdocs\folders\model\dataclass.php');
$key = 'fund_wings_2024$';
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$background=$_POST["img"];
$description=$_POST["description"];
$money=$_POST["money"];
$day=$_POST["day"];
$name=$_POST["name_campaign"];
$data=new DATAs();
$back=$data->encryption($background,$key,$iv);
$des=$data->encryption($description,$key,$iv);
$mon=$data->encryption($money,$key,$iv);
$days=$data->encryption($day,$key,$iv);
$nam=$data->encryption($name,$key,$iv);
//$data->pull($background,$description,$money,$day);
$data->pull($back,$nam,$des,$mon,$days);
?>
