<?php
include 'includes/head.php';
include 'includes/notifications.php';
echo '<title>'.$_SESSION['userName'].'</title>';
?>
    
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="offset-sm-2 col-sm-8">
            <h2>Üdv a profilodon</h2>
            <ul class="profile-items">
                <li><a href="info_update.php"><button class="btn btn-secondary form-control">Személyes adatok módosítása</button></a></li>
                <li><a href="forgot_pwd.php"><button class="btn btn-secondary form-control">Jelszó módosítás</button></a></li>
                <li><a href="change_username.php"><button class="btn btn-secondary form-control">Felhasználónév módosítása</button></a></li>
                <li><button class="btn btn-danger form-control" data-toggle="modal" data-target="#mymodal">Felhasználó megszüntetése</button></li>
            </ul>
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Felhasználó deaktiválása</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ha a biztos opciót választja, akkor felhasználói fiókod deaktiválódik és meg lesz jelölve automatikus törlésre 10 napon belül.
                        Biztosan meg szeretné szüntetni felhasználóját?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                        <a href="includes/user_deactivate.php"><button type="button" class="btn btn-primary">Biztos</button></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offset-sm-1 col-sm-10">
            <table class="table">
                <tr>
                    <th>Keresztnév:</th>
                    <th>Vezetéknév:</th>
                    <th>Nem:</th>
                    <th>Telefonszám:</th>
                    <th>Születési dátum:</th>
                    <th>Lakcím:</th>
                </tr>
                <tr>
                <?php include 'includes/info-table.php'; ?>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>