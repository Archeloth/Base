<?php
if(isset($_GET['error']))
{
    $error=$_GET['error'];
    switch($error)
    {
        case "sqlerror":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiba lépett fel a kapcsolatban</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "oldpassword":
            echo '<div class="alert alert-danger fade show">
                    <strong>Az új jelszó megegyezik a régivel</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        default:
            break;
    }
}
