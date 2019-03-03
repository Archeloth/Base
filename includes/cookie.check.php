<?php
if(isset($_COOKIE['ekisokos_remember_me']))
{
    $cookie_value=$_COOKIE['ekisokos_remember_me'];

    require 'connection.php';

    $sql="SELECT * FROM bejelentkezo_adatok INNER JOIN szemelyes_adatok ON szemelyes_adatok.userId=bejelentkezo_adatok.userId INNER JOIN adminisztracio_adatok ON adminisztracio_adatok.userId=bejelentkezo_adatok.userId WHERE token='$cookie_value'";
    $query=mysqli_query($conn,$sql);
    $num_rows=mysqli_num_rows($query);
    if($num_rows==1)
    {
        //Van ilyen és pontosan tudjuk ki az
        //Beállítjuk a SESSION változókat
        $row=mysqli_fetch_assoc($query);
        $_SESSION['userId']=$row['userId'];
        $_SESSION['userName']=$row['userName'];
        $_SESSION['adminE']=$row['adminE'];
        $_SESSION['knev']=$row['knev'];
        $_SESSION['vnev']=$row['vnev'];
        $_SESSION['betegE']=$row['betegE'];
    }
    else
    {
        //Nincs ilyen token
    }

    mysqli_close($conn);
}