<?php

function clean($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}


function validate($input){

}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $errorMessages = [];

    #--- getting values from our form
    $name     = clean($_POST['name']);
    $address  = clean($_POST['address']);
    $url      = $_POST['url'];
    $gender   = $_POST['gender'];
    $mail     = $_POST['email'];
    $password = $_POST['password'];


    if(empty($name)){

        $errorMessages['Name'] = "Field Required";
    }else {
        # code...
        if (!ctype_alpha($name)) {
            # code...
            $errorMessages['Name-validity'] = "the name input is not a string";

        }
    }


    if(empty($url)){
        $errorMessages['url'] = "Field Required";
    }else {
        
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            # code...
            $errorMessages['url-validity'] = "invalid url";

        }
        
    }

    if(empty($address) || strlen($address) < 10){
        $errorMessages['address'] = "pls  write at least 10 characters";
    }


    if(empty($mail)){

        $errorMessages['Email'] = "Field Required";
    }else {
        # code...
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            # code...
            $errorMessages['EMAIL-validity'] = "invalid EMAIL";

        }
    }


    if(empty($password) || strlen($password) < 6){

        $errorMessages['Password'] = " pls write at least 6 characters";
    }


    if(count($errorMessages) > 0){
        // ERROR MESSAGES

       foreach($errorMessages as $key => $value){

           echo '* '.$key.' : '.$value.'<br>';
       }


    }else{
    
         echo 'Valid Data';
   
    }


}


?>
