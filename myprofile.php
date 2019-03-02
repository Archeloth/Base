<?php
include 'includes/head.php';
include 'includes/notifications.php';
echo '<title>'.$_SESSION['userName'].'</title>';
?>
    
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="offset-sm-2 col-sm-8">
            <h2>Üdv a profilodon</h2>
            <ul>
                <li><a href="info_update.php">Személyes adatok módosítása</a></li>
                <li><a href="forgot_pwd.php">Jelszó módosítás</a></li>
                <li><a href="change_username.php">Felhasználónév módosítása</a></li>
            </ul>
            
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