<?php
//Cookie, ha van, adatbázisból a token törlése
if(isset($_COOKIE['ekisokos_remember_me']))
{
    $cookie_value=$_COOKIE['ekisokos_remember_me'];
    require 'connection.php';
    $user=$_SESSION['userId'];
    $update="UPDATE bejelentkezo_adatok SET token = NULL WHERE userId='$user'";
    $query=mysqli_query($conn,$update);

    mysqli_close($conn);

    //Cookie megsemmisítése
    setcookie('ekisokos_remember_me',$cookie_value,time()-3600,'/');
}
//SESSION leállítása
session_start();
session_unset();
session_destroy();
header('Location: ../index.php');