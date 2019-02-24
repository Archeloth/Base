<?php
include 'includes/head.php';
include 'includes/change_username.error.check.php';
?>
    <title>Új felhasználónév</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="offset-sm-2 col-sm-8">
            <h3>Felhasználónév megváltoztatása</h3>
            <form action="includes/change_username.inc.php" method="post">
                <input type="text" name="currentUsername" class="form-control" placeholder="Mostani felhasználóneved" autocomplete="off">
                <input type="text" name="newUsername" class="form-control" placeholder="Új felhasználónév" autocomplete="off">
                <button type="submit" class="btn btn-success form-control" name="newUser-submit">Megváltoztat</button>
            </form>
        </div>
    </div>
</body>
</html>
