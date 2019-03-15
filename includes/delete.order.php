<?php
if(isset($_GET['rendelesId']) && isset($_GET['termek']))
{
    require 'connection.php';
    $order=$_GET['rendelesId'];
    $termek=$_GET['termek'];

    $sql="DELETE FROM rendelesek WHERE rendelesId='$order'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        //Visszatöltjük a rendelt mennyiséget
        $sql="UPDATE termekek SET raktaron = raktaron+1 WHERE megnevezes='$termek'";
        $query=mysqli_query($conn,$sql);
        if($query)
        {
            header('Location: ../myorders.php?delete=success');
            exit();
        }
        else
        {
            header('Location: ../myorders.php?error=sqlerror');
            exit();
        }
    }
    else
    {
        header('Location: ../myorders.php?error=sqlerror');
        exit();
    }
}
?>