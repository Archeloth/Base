<?php
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}


if(isset($_POST['signup-submit']))
{
    require 'connection.php';

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordRepeat=$_POST['password-repeat'];
    $knev=$_POST['knev'];
    $vnev=$_POST['vnev'];
    $telefonszam=$_POST['telefonszam'];
    $nem=$_POST['nem'];
    $szuletesdatum=$_POST['szuletesdatum'];
    $lakcim=$_POST['lakcim'];
    $biztkerd=$_POST['biztkerdes'];
    $biztval=$_POST['biztvalasz'];
    //Captcha cuccok
    //https://www.google.com/recaptcha/admin/site/345173613/setup
    //Lehetne IP-t is továbbküldeni, de azt inkább nem...
    $secterKey="6Ldt7pIUAAAAAIs9xTduD9pFe4BK4ph4aP3rcZQ1";
    $responseKey=$_POST['g-recaptcha-response'];
    $url="https://www.google.com/recaptcha/api/siteverify?secret=$secterKey&response=$responseKey";
    function curl_get_contents($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    $response=curl_get_contents($url);
    $response=json_decode($response);
    if($response->success)
    {

        if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($knev) || empty($vnev) || empty($telefonszam) || empty($biztval))
        {
            header('Location: ../signup.php?error=emptyfields&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header('Location: ../signup.php?error=invalidmail');
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header('Location: ../signup.php?error=invalidmail&user='.$username);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header('Location: ../signup.php?error=invaliduser&mail='.$email);
            exit();
        }
        else if(strlen($username)>50)
        {
            header('Location: ../signup.php?error=longuser&mail='.$email);
            exit();
        }
        else if(strlen($password)<8)
        {
            header('Location: ../signup.php?error=shortpassword&user='.$username.'&mail='.$email);
            exit();
        }
        else if($username == $password)
        {
            header('Location: ../signup.php?error=usernamepassword&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!preg_match("/\d/",$password))
        {
            header('Location: ../signup.php?error=nodigit&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!preg_match("/[A-Z]/",$password))
        {
            header('Location: ../signup.php?error=nocapital&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!preg_match("/[a-z]/",$password))
        {
            header('Location: ../signup.php?error=nosmall&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!preg_match("/[\W]/",$password))
        {
            header('Location: ../signup.php?error=nospecial&user='.$username.'&mail='.$email);
            exit();
        }
        else if(preg_match("/[\s]/",$password))
        {
            header('Location: ../signup.php?error=nospace&user='.$username.'&mail='.$email);
            exit();
        }
        else if($password !== $passwordRepeat)
        {
            header('Location: ../signup.php?error=passwordcheck&user='.$username.'&mail='.$email);
            exit();
        }
        else if(!preg_match("/^[1-9][0-9]{0,8}$/",$telefonszam))
        {
            header('Location: ../signup.php?error=wrongtelephone&user='.$username.'&mail='.$email);
            exit();
        }
        else if(strlen($knev)>=255 || strlen($vnev)>=255 || strlen($lakcim)>=255)
        {
            header('Location: ../signup.php?error=longdata&user='.$username.'&mail='.$email);
            exit();
        }
        else
        {
            $sql="SELECT userId FROM bejelentkezo_adatok WHERE userName=?";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header('Location: ../signup.php?error=sqlerror');
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck=mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0)
                {
                    //Már létezik
                    header('Location: ../signup.php?error=usertaken&mail='.$email);
                    exit();
                }
                else
                {
                    $sql="INSERT INTO bejelentkezo_adatok VALUES (?,?,?,?,?);";
                    $sql2="INSERT INTO szemelyes_adatok VALUES (?,?,?,?,?,?,?);";
                    $sql3="INSERT INTO adminisztracio_adatok (userId,adminE,aktivE,betegE,biztKerdes,biztValasz) VALUES (?,?,?,?,?,?);";
                    $stmt=mysqli_stmt_init($conn);
                    $stmt2=mysqli_stmt_init($conn);
                    $stmt3=mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))//|| !mysqli_stmt_prepare($stmt2,$sql2) || !mysqli_stmt_prepare($stmt3,$sql3)
                    {
                        header('Location: ../signup.php?error=sqlerror');
                        exit();
                    }
                    else
                    {
                        mysqli_stmt_prepare($stmt2,$sql2);
                        mysqli_stmt_prepare($stmt3,$sql3);
                        $hashedPwd=password_hash($password, PASSWORD_DEFAULT);

                        $hashedBiztVal=password_hash($biztval,PASSWORD_DEFAULT);
                        //PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of PHP 5.5.0). Note that this constant is designed to change over time as new and stronger algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).

                        $uuid=gen_uuid();
                        $adminE=0;//Ezeket módosítsd az admin létrehozásakor
                        $aktivE=1;
                        $betegE=1;
                        $null_var=NULL;
                        mysqli_stmt_bind_param($stmt,"sssss",$uuid,$username,$email,$hashedPwd,$null_var);
                        mysqli_stmt_bind_param($stmt2,"sssisss",$uuid,$knev,$vnev,$nem,$telefonszam,$szuletesdatum,$lakcim);
                        mysqli_stmt_bind_param($stmt3,"ssssis",$uuid,$adminE,$aktivE,$betegE,$biztkerd,$hashedBiztVal);

                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_execute($stmt3);
                        header('Location: ../signup.php?signup=success');
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt3);
        mysqli_close($conn);
    }
    else
    {
        //ROBOT!!4
        header('Location: ../signup.php?error=recaptchaerror');
        exit();
    }
}
else
{
    header('Location: ../signup.php');
    exit();
}