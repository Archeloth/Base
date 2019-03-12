<?php
session_start();
if(isset($_POST['newUser-submit']))
{
    $current=$_POST['currentUsername'];
    $new=$_POST['newUsername'];
    if(empty($current) || empty($new))
    {
        header('Location: ../change_username.php?error=emptyfields');
        exit();
    }
    else
    {
        require 'connection.php';
        $sql="SELECT userId FROM bejelentkezo_adatok WHERE userName=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: ../change_username.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $new);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
                header('Location: ../change_username.php?error=usertaken');
                exit();
            }
            else
            {
                if($current == $_SESSION['userName'])
                {
                    
        
                    $sql="UPDATE bejelentkezo_adatok SET userName = ? WHERE userId = ?";
                    $stmt=mysqli_stmt_init($conn);
                    if(mysqli_stmt_prepare($stmt,$sql))
                    {
                        mysqli_stmt_bind_param($stmt,"ss",$new,$_SESSION['userId']);
                        $status=mysqli_stmt_execute($stmt);
                        if($status)
                        {
                            header('Location: ../myprofile.php?changed=true');
                            //Illetve, hogy jobb felül is frissüljön, kell a session variable-t is update-elni
                            $_SESSION['userName']=$new;
                            exit();
                        }
                        else
                        {
                            header('Location: ../change_username.php?error=sqlerror');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: ../change_username.php?error=sqlerror');
                        exit();
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                }
                else
                {
                    header('Location: ../change_username.php?error=nomatch');
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