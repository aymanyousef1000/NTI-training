<?php

    #--- ayman yousef mohamed
    #--- seconed day
    #--- task three

    function siteName($url){

        #--- getting the last index 
        $lastIndex = count(explode("/",$url))-1;   
        return explode("/",$url)[$lastIndex];
    }

    echo siteName('www.example.com/public_html/meow/index.php');

?>