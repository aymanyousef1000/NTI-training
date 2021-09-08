<?php

include 'helpers.php';
include 'form.php';


session_start();
#---- php script

 if($_SERVER['REQUEST_METHOD']  == "POST"){

    #---- validating name & email

    $errorMessages = [];

    #----- assign values
    $name = cleanInputs($_POST['name']);
    $mail = cleanInputs($_POST['email']);
    $address = cleanInputs($_POST['address']);
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $url = cleanInputs($_POST['url']);
    #$pp  = $_POST['pp'];

    #--- validate name
    if(empty($name)){

        $errorMessages['Name'] = "Field Required";
    }else {
        # code...
        if (!ctype_alpha($name)) { #--- or we can use reg_match('/^[a-zA-Z\s]/');
            # code...
            $errorMessages['Name-validity'] = "the name input is not a string";

        }else{
           #  echo 'name is valid <br>';
        }
    }


    #---- validating address
    if(empty($address) || strlen($address) < 10){
        $errorMessages['address'] = "pls  write at least 10 characters";
    }


    #--- validate mail
    if(empty($mail)){

        $errorMessages['Email'] = "Field Required";
    }else {
        # code...
        if (!validate($mail,3)) {
            # code...
            $errorMessages['EMAIL-validity'] = "invalid EMAIL";

        }else{
            # echo 'mail is valid';
        }
    }


    #--- validating linkedin url
    if(empty($url)){
        $errorMessages['url'] = "Field Required";
    }else {
        
        if (!validate($url,5)) {
            # code...
            $errorMessages['url-validity'] = "invalid url";

        }
        
    }

    #----- validating password
    if(empty($password) || strlen($password) < 6){

        $errorMessages['Password'] = " pls write at least 6 characters";
    }

    #------- profile photo

    # FILE INFO ... 
    if (!empty($_FILES['pp']['name'])) {
        # code...
        $pptmp_path = $_FILES['pp']['tmp_name'];
        $ppname     = $_FILES['pp']['name'];
        #$ppsize     = $_FILES['pp']['size'];
        $pptype     = $_FILES['pp']['type'];

        $allowedExt = ['png','jpg','jpeg'];

        $extArray = explode('/',$pptype);

        if(in_array($extArray[1],$allowedExt)){
            
            // $finalName =   rand().time().$name;
            $finalName =   rand().time().'.'.$extArray[1];
        
        
            $desPath = './uploads/'.$finalName;
            
            if(move_uploaded_file($pptmp_path,$desPath)){
        
            echo 'File Uploaded';
            }else{
            echo 'Error In Uploading Try Again';
            }
        
                
        }else{
            $errorMessages['photo']= 'the extion is not valid';
        }
    }else {
        # code...
        $errorMessages['photo']= 'pls upload your photo';
    }
    



    #-----------
    if (count($errorMessages) > 0) {
        # code...
        print_r ($errorMessages);
    }else {


        $cookieValueName = $name;
        $cookieValueMail = $mail;
        $cookieValueGender = $gender;
        $cookieValueAddress = $address;
        $cookieValuePassword = $password;
        $cookieValueURL = $url;
        $cookieValuePhoto = $finalName;

        setcookie('name',$cookieValueName,time()+(24*60*60),'/');
        setcookie('mail',$cookieValueMail,time()+(24*60*60),'/');
        setcookie('gender',$cookieValueGender,time()+(24*60*60),'/');
        setcookie('address',$cookieValueAddress,time()+(24*60*60),'/');
        setcookie('password',$cookieValuePassword,time()+(24*60*60),'/');
        setcookie('linkedin',$cookieValueURL,time()+(24*60*60),'/');
        setcookie('profilepicture',$cookieValuePhoto,time()+(24*60*60),'/');

        /*
        $_SESSION['name']    = $name;
        $_SESSION['mail']    = $mail;
        $_SESSION['gender']  = $gender;
        $_SESSION['address'] = $address;
        $_SESSION['password']= $password;
        $_SESSION['linkedin']= $url;
        $_SESSION['profile picture']= $finalName;
        */

    }




 }

?>



