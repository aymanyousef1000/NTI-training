<?php
include 'form.php';


if($_SERVER['REQUEST_METHOD']  == "POST"){




    $name = $_POST['name'];
    $mail = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $url = $_POST['url'];



    $file = fopen('data.txt','a') or die('unable to open file');

    $stData = [$name,$mail,$address,$gender,$password,$url];
    $stInfo = implode(",",$stData)."\r\n";

    fwrite($file,$stInfo);
    fclose($file);

}



?>