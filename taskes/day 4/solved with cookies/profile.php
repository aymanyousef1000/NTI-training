<?php


echo $_COOKIE['name'].'<br>';
echo $_COOKIE['mail'].'<br>';
echo $_COOKIE['gender'].'<br>';
echo $_COOKIE['address'].'<br>';
echo $_COOKIE['linkedin'].'<br>';
echo $_COOKIE['password'].'<br>';
$pp =$_COOKIE['profilepicture'].'<br>';
echo "preview profile pic :  <a href='./uploads/$pp'>view</a>";



/*
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
    
*/     


?>