<?php
include 'includes/head.php';
include 'includes/notifications.php';
echo '<title>'.$_SESSION['userName'].'</title>';
?>
    
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="offset-sm-1 col-sm-10">
            <h2>Üdv a profilodon</h2>
        </div>
    </div>
    <a href="forgot_pwd.php">Jelszó módosítás</a>
</body>
</html>