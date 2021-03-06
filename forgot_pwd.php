<?php 
    include 'includes/head.php';
    include 'includes/forgot_pwd.error.check.php';
    include 'includes/connection.php';
    $user=$_SESSION['userId'];
    $sql="SELECT biztonsagi_kerdes, biztValasz FROM adminisztracio_adatok INNER JOIN biztonsagi_kerdesek ON adminisztracio_adatok.biztKerdes=biztonsagi_kerdesek.biztId WHERE userId='$user'";
    $query=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($query);

?>
    <title>Azonosítás</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="offset-sm-3 col-sm-6">
            <h3>Válaszolj a biztonsági kérdésre</h3>
            <form action="includes/forgot_pwd.inc.php" method="post">
                <?php echo '<input type="text" name="question" class="form-control" value="'.$data['biztonsagi_kerdes'].'" readonly>'; ?>
                <input type="text" name="answer" class="form-control" autocomplete="off">
                <?php echo '<input type="hidden" name="realanswer" value="'.$data['biztValasz'].'">'; ?>
                <button type="submit" class="btn btn-success form-control" name="question-submit">Ellenőrzés</button>
            </form>
        </div>
    </div>
</body>
</html>