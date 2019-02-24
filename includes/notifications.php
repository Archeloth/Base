<?php
if(isset($_GET['password']))
{
    if($_GET['password']=="changed")
    {
        echo '<div class="alert alert-success fade show">
        <strong>A jelszó sikeresen megváltozott!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
