<?php
include 'includes/head.php';
include 'includes/reset_pwd.error.check.php';
?>
    <title>Jelszó módosítása</title>
</head>
<body>
    <div class="container">
        <div class="offset-sm-3 col-sm-6">
            <h3>Add meg az új jelszavadat!</h3>
            <form action="includes/reset_pwd.inc.php" method="post">
                <input type="password" name="newpwd1" class="form-control" palceholder="Új jelszó">
                <input type="password" name="newpwd2" class="form-control" palceholder="Új jelszó még egyszer">
                <button type="submit" class="btn btn-success form-control" name="newpwd-submit">Elfogad</button>
            </form>
        </div>
    </div>
</body>
</html>
