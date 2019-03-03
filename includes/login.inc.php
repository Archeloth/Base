<?php
if(isset($_POST['login-submit']))
{
    require 'connection.php';

    $userOrEmail=$_POST['userOrEmail'];
    $password=$_POST['password'];
    $remember=$_POST['remember'];

    if(empty($userOrEmail) || empty($password))
    {
        header('Location: ../login.php?error=emptyfields');
        exit();
    }
    else
    {
        $sql="SELECT * FROM bejelentkezo_adatok INNER JOIN szemelyes_adatok ON szemelyes_adatok.userId=bejelentkezo_adatok.userId INNER JOIN adminisztracio_adatok ON adminisztracio_adatok.userId=bejelentkezo_adatok.userId WHERE bejelentkezo_adatok.userName=? OR bejelentkezo_adatok.userEmail=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: ../login.php?error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ss",$userOrEmail,$userOrEmail);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==1)
            {
                if($row=mysqli_fetch_assoc($result))
                {
                    $pwdCheck=password_verify($password, $row['userPwd']);
                    if($pwdCheck == false)
                    {
                        header('Location: ../login.php?error=wrongpassword');
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
                        $_SESSION['betegE']=$row['betegE'];
                        if($remember==1)//Ha a felhasználó meg akarja jegyeztetni a bejelentkezését, akkor csinálunk egy cookie-t és hozzá egy token-t
                        {
                            $token=bin2hex(openssl_random_pseudo_bytes(16));
                            $user=$row['userId'];
                            //Ezt beupdate-eljük az adatbázis megfelelő helyébe
                            $update="UPDATE bejelentkezo_adatok SET token = '$token' WHERE userId = '$user'";
                            $query=mysqli_query($conn,$update);
                            //Ez után beállítjuk a cookie-t 7 napos élettartammal (ha a user kijelentkezik, törlődik a cookie)
                            $cookie_name="ekisokos_remember_me";
                            setcookie($cookie_name,$token,time()+(86400*7),'/'); //86400 egy nap
                        }
    
                        header('Location: ../index.php?login=success');
                        exit();
                    }
                    else
                    {
                        header('Location: ../login.php?error=wrongpassword');
                        exit();
                    }
                }
            }
            else
            {
                header('Location: ../login.php?error=nouser');
                exit();
            }
        }
    }
}
else
{
    header('Location: ../index.php');
    exit();
}