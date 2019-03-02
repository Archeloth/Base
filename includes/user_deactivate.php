<?php
session_start();
$user=$_SESSION['userId'];
$sql="UPDATE adminisztracio_adatok SET aktivE=0 WHERE userId='$user'";
$query=mysqli_query($conn,$sql);
if($query)
{
    header('Location: myprofile.php?deactivated=true');
    exit();
}
else
{
    header('Location: myprofile.php?error=sqlerror');
    exit();
}