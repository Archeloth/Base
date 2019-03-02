<?php
if(isset($_GET['ordered']))
{
    session_start();
    $termek=$_GET['ordered'];
    $user=$_SESSION['userId'];
    require 'connection.php';

    $sql="INSERT INTO rendelesek (userId,termekId) VALUES ('$user','$termek')";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        //Sikeresen fogadtuk, most pedig csökkentjük a raktáron lévő termékeket UPDATE-el
        $sql_raktaron="SELECT raktaron FROM termekek WHERE termekId='$termek'";
        $raktaron=mysqli_query($conn,$sql_raktaron);
        $raktaron=mysqli_fetch_array($raktaron);
        $ujErtek=$raktaron['raktaron']-1;
        $sqlUpdate="UPDATE termekek SET raktaron=$ujErtek WHERE termekId='$termek'";
        $update=mysqli_query($conn,$sqlUpdate);
        if($update)
        {
            header('Location: ../webshop.php?order=success');
            exit();
        }
        else
        {
            header('Location: ../webshop.php?order=failed');
            exit();
        }
        
    }
    else
    {
        header('Location: ../webshop.php?order=failed');
        exit();
    }

    mysqli_close($conn);
}
else
{
    header('Location: ../index.php');
    exit();
}