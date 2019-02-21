<?php

$servername = "localhost";
$username = "root";
$password = "";

// create connectio
$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){

	die("Connection Failed" . $conn->connect_error);

}

//create database
$query = "CREATE DATABASE ClassT"

?>