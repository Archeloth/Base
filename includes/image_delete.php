<?php
    include_once "connection.php";
    $id=$_GET['id'];
    $kepnev=$_GET['name'];
    $egy_kep_torol="DELETE FROM kepek WHERE kepnev='$kepnev'";
    $torol=mysqli_query($conn,$egy_kep_torol);
    if($torol)
    {
        $file="images/$kepnev";
        unlink($file);
        echo "A kép törölve lett";
        header('Location:../modify_article.php?id='.$id.'');
    }
    else
    {
        echo "Hiba a törléskor";
    }
    $conn->close();
?>