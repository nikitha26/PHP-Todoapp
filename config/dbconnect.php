<?php

    //Connection to database
    $conn = mysqli_connect('localhost', 'nikitha', 'nikitha12345','todo app');

    //Check connection
    if(!$conn){
        echo 'Connection error'.mysqli_connect_error();
    }
    
?>