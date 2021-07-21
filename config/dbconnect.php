<?php
    //Locaol Database connection
    // $host = "80";
    // $db = "todo";
    // $user = "nikitha";
    // $pass = "";

    //Remote Database Connection
    $host = "remotemysql.com";
    $db = "D1tswlUiRP";
    $user = "D1tswlUiRP";
    $pass = "vaMdQmCZMf";



    //Connection to database
    $conn = mysqli_connect($host,$user, $pass,$db);

    //Check connection
    if(!$conn){
        echo 'Connection error'.mysqli_connect_error();
    }
    
?>