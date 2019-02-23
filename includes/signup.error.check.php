<?php
//Itt a megfelelő hibaüzenetnek megfelelően feldobunk egy kiikszelhető kis értesítőt, illetve az url-en átdobottnéhány adatot visszatöltjükk, hogy a usernek ne kell jen annyit újra visszaírnia
if(isset($_GET['error']))
{
    $error=$_GET['error'];
    switch($error)
    {
        case "emptyfields":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiányos adatok!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                /*$user=$_GET['user'];
                $mail=$_GET['mail'];
                echo '<script>document.getElementById("username").value=var '.$user.';</script>';
                echo '<script>document.getElementById("email").value=var '.$mail.';</script>';*/
            break;
        case "invalidmail":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás e-mail cím!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                /*if(isset($_GET['user']))
                {
                    $user=$_GET['user'];
                    echo '<script>document.getElementById("username").value='.$user.';</script>';
                }*/
            break;
        case "invaliduser":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás felhasználónév. Kérlek csak az angol abc karaktereit, és számokat használj!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                /*$mail=$_GET['mail'];
                echo '<script>document.getElementById("email").value='.$mail.';</script>';*/
            break;
        case "passwordcheck":
            echo '<div class="alert alert-danger fade show">
                    <strong>Nem egyezik meg a két megadott jelszó!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                /*$user=$_GET['user'];
                $mail=$_GET['mail'];
                echo '<script>document.getElementById("username").value='.$user.';</script>';
                echo '<script>document.getElementById("email").value='.$mail.';</script>';*/
            break;
        case "sqlerror":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiba a kapcsolatban!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "usertaken":
            echo '<div class="alert alert-danger fade show">
                    <strong>A felhasználónév már létezik!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "recaptchaerror":
            echo '<div class="alert alert-danger fade show">
                    <strong>Lebuktál robot!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "wrongtelephone":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás telefonszám!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        default:
            break;
    }
}
