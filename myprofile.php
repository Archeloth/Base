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
        </div>
        <a href="forgot_pwd.php">Jelszó módosítás</a>
        <a href="change_username.php">Felhasználónév módosítása</a>
    </div>
</body>
</html>