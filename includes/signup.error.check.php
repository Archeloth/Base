<?php
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
            break;
        case "invalidmail":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás e-mail cím!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "invaliduser":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás felhasználónév. Kérlek csak az angol abc karaktereit, és számokat használj!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "passwordcheck":
            echo '<div class="alert alert-danger fade show">
                    <strong>Nem egyezik meg a két megadott jelszó!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
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
        default:
            break;
    }
}
