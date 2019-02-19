<?php
if(isset($_POST['login-submit']))
{
    require 'connection.php';

    $userOrEmail=$_POST['userOrEmail'];
    $password=$_POST['password'];

    if(empty($userOrEmail) || empty($password))
    {
        header('Location: ../index.php?error=emptyfields');
        exit();
    }
    else
    {
        $sql="SELECT * FROM bejelentkezo_adatok INNER JOIN szemelyes_adatok ON szemelyes_adatok.userId=bejelentkezo_adatok.userId INNER JOIN adminisztracio_adatok ON adminisztracio_adatok.userId=bejelentkezo_adatok.userId WHERE bejelentkezo_adatok.userName=? OR bejelentkezo_adatok.userEmail=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: ../index.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$userOrEmail,$userOrEmail);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result))
            {
                $pwdCheck=password_verify($password, $row['userPwd']);
                if($pwdCheck == false)
                {
                    header('Location: ../index.php?error=wrongpassword');
                    exit();
                }
                else if($pwdCheck == true)
                {

                    session_start();
                    $_SESSION['userId']=$row['userId'];
                    $_SESSION['userName']=$row['userName'];
                    $_SESSION['adminE']=$row['adminE'];
                    $_SESSION['knev']=$row['knev'];
                    $_SESSION['vnev']=$row['vnev'];

                    header('Location: ../index.php?login=success');
                    exit();
                }
                else
                {
                    header('Location: ../index.php?error=wrongpassword');
                    exit();
                }
            }
            
        }
    }
}
else
{
    header('Location: ../index.php');
    exit();
}