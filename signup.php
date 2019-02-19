<?php
    if(isset($_GET['signup']))
    {
        $signup=$_GET['signup'];
        if($signup=="success")
        {
            echo '<p>Sikeres regisztráció!</p>';
            header('Refresh: 1, url=index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Regisztráció</title>
</head>
<body>
    <div class="offset-sm-2 col-sm-8">
    <p>A csillaggal jelölt mezők kitöltése kötelező!</p>
        <form action="includes/signup.inc.php" method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">*Felhasználónév:</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">*E-mail cím:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="@">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">*Jelszó:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="password-repeat" class="col-sm-2 col-form-label">*Jelszó ismét:</label>
                <div class="col-sm-10">
                    <input type="password" name="password-repeat" class="form-control" placeholder="Jelszó ismét">
                </div>
            </div>
            <div class="form-group row">
                <label for="password-repeat" class="col-sm-2 col-form-label">*Személyes adatok:</label>
                <div class="col-sm-5">
                    <input type="text" name="knev" class="form-control" placeholder="Keresztnév">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="vnev" class="form-control" placeholder="Vezetéknév">
                </div>
            </div>
            <div class="form-group row">
                <label for="nem" class="col-sm-2 col-form-label">Nem:</label>
                <div class="col-sm-10">
                    <select name="nem" id="" class="form-control">
                        <option value="0">férfi</option>
                        <option value="1">nő</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="telefonszam" class="col-sm-2 col-form-label">*Telefonszám:</label>
                <div class="col-sm-10">
                    <input type="text" name="telefonszam" class="form-control" placeholder="Telefonszám">
                </div>
            </div>
            <div class="form-group row">
                <label for="szuletesdatum" class="col-sm-2 col-form-label">Születési dátum:</label>
                <div class="col-sm-10">
                    <input type="date" name="szuletesdatum" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="lakcim" class="col-sm-2 col-form-label">Lakcím:</label>
                <div class="col-sm-10">
                    <input type="text" name="lakcim" class="form-control" placeholder="Lakcím">
                </div>
            </div><!--Csak az admin felhasználó létrehozásához
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="admin">
                <label class="form-check-label" for="defaultCheck1">
                    Admin?
                </label>
            </div>
            -->
            <button type="submit" class="btn btn-success form-control" name="signup-submit">Regisztrálás</button>
        </form>
        <a href="index.php">Vissza a főoldalra</a>
    </div>
</body>
</html>