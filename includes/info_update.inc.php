<?php
if(isset($_POST['info-submit']))
{
    /*
    if(empty($_POST['knev']) || empty($_POST['vnev']) || empty($_POST['telszam']) || empty($_POST['szuldatum']) || empty($_POST['lakcim']))
    {
        header('Location: ../info_update.php?error=emptyfields');
        exit();
    }
    else
    {*/
        $newknev=$_POST['knev'];
        $newvnev=$_POST['vnev'];
        $newnem=$_POST['nem'];
        $newtelszam=$_POST['telszam'];
        $newszuldatum=$_POST['szuletesdatum'];
        $newlakcim=$_POST['lakcim'];

        require 'connection.php';
        $sql="UPDATE szemelyes_adatok SET knev=?, vnev=?, nem=?, telszam=?, szuldatum=?, lakcim=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: ../info_update.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,'ssisss',$newknev,$newvnev,$newnem,$newtelszam,$newszuldatum,$newlakcim);
            mysqli_stmt_execute($stmt);
            header('Location: ../myprofile.php?update=true');
            exit();
        }
    //}
}
