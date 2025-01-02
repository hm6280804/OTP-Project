<?php
require 'config.php';

function connectDatabase(){
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if($conn->connect_error){
        die ("connection failed! " . $conn->connect_error);
    }
    return $conn;
}