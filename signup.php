<?php
    if(isset($_GET['signup']))
    {
        $signup=$_GET['signup'];
        if($signup=="success")
        {
            echo '<div class="alert alert-success fade show">
                    <strong>Sikeres regisztrálás.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            header('Refresh: 1, url=index.php');
        }
    }
    include 'includes/signup.error.check.php';
    include 'includes/head.php';
?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Regisztráció</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="offset-sm-2 col-sm-8">
        <h3 class="text-center py-5">Regisztráció</h3>
    <p>A csillaggal jelölt mezők kitöltése kötelező!</p>
        <form action="includes/signup.inc.php" method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">*Felhasználónév:</label>
                <div class="col-sm-10">
                    <?php
                    if(isset($_GET['user']))
                    {
                        $user=$_GET['user'];
                        echo '<input type="text" name="username" class="form-control" id="username" value="'.$user.'" title="Maximum 50 karakter. Angol ABC betűi (kis és nagy) és számok lehetnek benne.">';
                    }
                    else
                    {
                        echo '<input type="text" name="username" class="form-control" id="username" title="Maximum 50 karakter. Angol ABC betűi (kis és nagy) és számok lehetnek benne.">';
                    }
                    ?>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">*E-mail cím:</label>
                <div class="col-sm-10">
                    <?php
                    if(isset($_GET['mail']))
                    {
                        $mail=$_GET['mail'];
                        echo '<input type="email" name="email" class="form-control" id="email" value="'.$mail.'" title="Érvényes e-mail cím @ és domain névvel (.hu, .com)">';
                    }
                    else
                    {
                        echo '<input type="email" name="email" class="form-control" id="email" placeholder="@" title="Érvényes e-mail cím @ és domain névvel (.hu, .com)">';
                    }
                    ?>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">*Jelszó:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" title="Legalább 8 karakter hosszú legyen! Ne eggyezzen meg a felhasználónévvel!">
                </div>
            </div>
            <div class="form-group row">
                <label for="password-repeat" class="col-sm-2 col-form-label">*Jelszó ismét:</label>
                <div class="col-sm-10">
                    <input type="password" name="password-repeat" class="form-control" placeholder="Jelszó ismét">
                </div>
            </div>
            <div class="form-group row">
                <label for="password-repeat" class="col-sm-2 col-form-label">*<u>Személyes adatok</u>:</label>
                <div class="col-sm-5">
                    <input type="text" name="knev" class="form-control" placeholder="Keresztnév">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="vnev" class="form-control" placeholder="Vezetéknév">
                </div>
            </div>
            <div class="form-group row">
                <label for="nem" class="col-sm-2 col-form-label">*Nem:</label>
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
                    <!--type="tel" pattern="[0-9]{2}-[0-9]{3}-[0-9]{4}" --- Csak Safariban működik elvileg-->
                    <input type="text" pattern="[0-9]{9}" name="telefonszam" class="form-control" placeholder="Telefonszám" title="9 karakterből álló számsor. Pl:301112222">
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
            <p>Biztonsági kérdés kiválasztása a jövőbeli jelszó módosításhoz és azonosításhoz.</p>
            <div class="form-group row">
                <label for="biztkerdes" class="col-sm-2 col-form-label">*Kérdés:</label>
                <div class="col-sm-10">
                    <select name="biztkerdes" class="form-control">
                        <?php
                        require 'includes/connection.php';
                        $sql="SELECT * FROM biztonsagi_kerdesek";
                        $query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query))
                        {
                            echo '<option value="'.$row['biztonsagi_kerdes'].'">'.$row['biztonsagi_kerdes'].'</option>';
                        }
                        mysqli_close($conn);
                        ?>
                        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="biztvalasz" class="col-sm-2 col-form-label">*Válasz:</label>
                <div class="col-sm-10">
                    <input type="text" name="biztvalasz" class="form-control" placeholder="...">
                </div>
            </div>

            <div class="offset-sm-3 col-sm-6">
                <div class="g-recaptcha" data-sitekey="6Ldt7pIUAAAAANKJPDuwjmpujXwqAdaXNtNe0TG1"></div>
            </div>
            

            <button type="submit" class="btn btn-success form-control" name="signup-submit">Regisztrálás</button>
        </form>
        <a href="index.php">Vissza a főoldalra</a>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>