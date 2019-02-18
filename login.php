<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Bejelentkezés</title>
</head>
<body>
    <form action="includes/login.inc.php" method="post">
    <input type="text" name="userOrEmail" placeholder="Felhasználónév/Email cím">
    <input type="password" name="password" placeholder="Jelszó">
    <button type="submit" class="btn btn-success" name="login-submit">Belépés</button>
    </form>
    <a href="index.php">Vissza a főoldalra</a>
</body>
</html>