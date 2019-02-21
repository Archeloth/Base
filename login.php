<?php include "includes/head.php"; ?>

    <title>Bejelentkezés</title>
</head>
<body>
<div class="container">
    <div class="offset-sm-3 col-sm-6">
        <h2>Bejelentkezés E-Kisokosba</h2>
        <form action="includes/login.inc.php" method="post">
        <input type="text" name="userOrEmail" class="form-control" placeholder="Felhasználónév/Email cím">
        <input type="password" name="password" class="form-control" placeholder="Jelszó">
        <label for="remember">Emlékezzen rám. </label><input type="checkbox" name="remeber" value="1"><!--Value 1-et kell keresni ha be van pipálva-->
        <button type="submit" class="btn btn-success" name="login-submit">Belépés</button>
        </form>
        <a href="index.php">Vissza a főoldalra</a>
    </div>
</div>
    
</body>
</html>