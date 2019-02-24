<?php
if(isset($_GET['error']))
{
    $error=$_GET['error'];
    switch($error)
    {
        case "wronganswer":
            echo '<div class="alert alert-danger fade show">
                    <strong>A válasz nem megfelelő</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            break;
        default:
            break;
    }
}
