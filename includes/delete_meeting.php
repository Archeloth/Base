<?php
if(isset($_GET['date']) && isset($_GET['hour']))
{
    $date=$_GET['date'];
    $hour=$_GET['hour'];

    require 'connection.php';
    $sql="DELETE FROM tornazok WHERE nap='$date' AND idopont='$hour'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        header('Location: ../mymeetings.php?result=success');
        exit();
    }
    else
    {
        header('Location: ../index.php?result=failed');
        exit();
    }
}
else
{
    header('Location: ../index.php');
    exit();
}