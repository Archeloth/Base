<?php
if(isset($_GET['error']))
{
    $error=$_GET['error'];
    switch($error)
    {
        case "emptyfields":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiányos adatok.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "sqlerror":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiba a kapcsolatban.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "wrongpassword":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hibás jelszó!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "nouser":
            echo '<div class="alert alert-danger fade show">
                    <strong>Nem létezik ilyen felhasználó!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        default:
            break;
    }
}

