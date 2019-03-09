<?php
 $dbServerName="localhost";
 $dbUserName="root";
 $dbPassword="";
 $dbName="e_kisokos";

 $conn=mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_query($conn,"SET NAMES 'UTF8'");
mysqli_query($conn,"SET CHARACTER SET 'UTF8'");
?>