<?php
if(isset($_GET['error']))
{
    $error=$_GET['error'];
    switch($error)
    {
        case "emptyfields":
            echo '<div class="alert alert-danger fade show">
                    <strong>Üres mezők!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "sqlerror":
            echo '<div class="alert alert-danger fade show">
                    <strong>Hiba a csatlakozással!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        case "nomatch":
            echo '<div class="alert alert-danger fade show">
                    <strong>A mostani felhasználónév nem megfelelő!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        default:
            break;
    }
}