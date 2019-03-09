<?php 
    include 'includes/head.php';
    include 'includes/forgot_pwd.error.check.php';
    include 'includes/connection.php';
    $user=$_SESSION['userId'];
    $sql="SELECT biztKerdes, biztValasz FROM adminisztracio_adatok WHERE userId='$user'";
    $query=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($query);

?>
    <title>Azonosítás</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="offset-sm-3 col-sm-6">
            <h3>Válaszolj a biztonsági kérdésre</h3>
            <form action="includes/forgot_pwd.inc.php" method="post">
                <?php echo '<input type="text" name="question" class="form-control" value="'.$data['biztKerdes'].'" readonly>'; ?>
                <input type="text" name="answer" class="form-control" autocomplete="off">
                <?php echo '<input type="hidden" name="realanswer" value="'.$data['biztValasz'].'">'; ?>
                <button type="submit" class="btn btn-success form-control" name="question-submit">Ellenőrzés</button>
            </form>
        </div>
    </div>
</body>
</html>