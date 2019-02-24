<?php
session_start();
if(isset($_POST['newpwd-submit']))
{
    require 'connection.php';
    $p1=$_POST['newpwd1'];
    $p2=$_POST['newpwd2'];
    $hashedP=password_hash($p1, PASSWORD_DEFAULT);
    if($p1===$p2)
    {
        //Lecsekkolni, hogy ezek egyeznek-e a régivel
        
        $sql="SELECT userPwd FROM bejelentkezo_adatok WHERE userId=?";
        $stmt1=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt1,$sql))
        {
            header('Location: ../reset_pwd.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt1,"s",$_SESSION['userId']);
            mysqli_stmt_execute($stmt1);
            
            mysqli_stmt_bind_result($stmt1,$userPwd);
        
            if(mysqli_stmt_fetch($stmt1))
            {
                if($userPwd==$hashedP)
                {
                    header('Location: ../reset_pwd.php?error=oldpassword');
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt1);
        
        $sql="UPDATE bejelentkezo_adatok SET userPwd = ? WHERE userId=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: ../reset_pwd.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$hashedP,$_SESSION['userId']);
            $status=mysqli_stmt_execute($stmt);
            if($status)
            {
                header('Location: ../myprofile.php?password=changed');
                exit();
            }
            else
            {
                header('Location: ../reset_pwd.php?error=sqlerror');
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header('Location: ../index.php');
    exit();
}