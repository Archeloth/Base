<?php
session_start();
if($_SESSION['adminE']==true)
{
    $id=$_GET['user'];
    $time=$_GET['time'];
    require 'connection.php';
    $sql="UPDATE rendelesek SET teljesitve=1 WHERE userId='$id' AND rendelesIdopontja='$time'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        header('Location: ../myorders.php?order=success');
        exit();
    }
    else
    {
        header('Location: ../myorders.php?error=sqlerror');
        exit();
    }

    mysqli_close($conn);
}
else
{
    header('Location: ../index.php');
    exit();
}