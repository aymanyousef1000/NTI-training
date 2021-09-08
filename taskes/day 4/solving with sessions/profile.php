<?php

    session_start();

    #--- retrive data were stored as sessions 
    echo $_SESSION['name'].'<br>';
    echo $_SESSION['mail'].'<br>';
    echo $_SESSION['gender'].'<br>';
    echo $_SESSION['address'].'<br>';
    echo $_SESSION['linkedin'].'<br>';
    echo $_SESSION['password'].'<br>';
    echo $_SESSION['mail'].'<br>';
    $pp = $_SESSION['profile picture'];
    echo "preview profile pic :  <a href='./uploads/$pp'>view</a>";

    #----- retrive profile photo was stored as cookie
    
     


?>