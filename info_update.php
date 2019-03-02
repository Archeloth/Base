<?php
include 'includes/head.php';
//include 'includes/info_update.error.check.php';
?>
    <title>Adatok módosítása</title>
</head>
<body>
<?php include 'includes/nav.php'; 

    require 'includes/connection.php';
    $sql="SELECT * FROM szemelyes_adatok WHERE userId='".$_SESSION['userId']."'";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        $row=mysqli_fetch_assoc($query);
        $knev=$row['knev'];
        $vnev=$row['vnev'];
        $nem=$row['nem'];
        $telszam=$row['telszam'];
        $szuldatum=$row['szuldatum'];
        $lakcim=$row['lakcim'];
    }
    mysqli_close($conn);
?>
    <div class="container">
        <div class="offset-sm-2 col-sm-8">
        <h3>Adataid módosítása</h3>
        <form action="includes/info_update.inc.php" method="post">
            <label for="knev">Keresztnév:</label>
            <?php echo '<input type="text" name="knev" class="form-control" value="'.$knev.'">'; ?>
            <label for="vnev">Vezetéknév::</label>
            <?php  echo '<input type="text" name="vnev" class="form-control" value="'.$vnev.'">'; ?>
            <select name="nem" class="form-control">
            <?php 
            if($nem==0)
            {
                echo '<option value="0" selected>férfi</option>
                    <option value="1">nő</option>';
            } 
            else
            {
                echo '<option value="0">férfi</option>
                    <option value="1" selected>nő</option>';
            }
            ?> 
            </select>
            <label for="telszam">Telefonszám:</label>
            <?php echo '<input type="text" pattern="[0-9]{9}" name="telszam" class="form-control" value="'.$telszam.'">'; ?>
            <label for="szuldatum">Születési dátum</label>
            <?php echo '<input type="date" name="szuletesdatum" class="form-control" value="'.$szuldatum.'">'; ?>
            <label for="lakcim">Lakcím:</label>
            <?php echo '<input type="text" name="lakcim" class="form-control" value="'.$lakcim.'">'; ?>

            <button type="submit" name="info-submit" class="btn btn-success form-control">Módosítás</button>
        </form>
        </div>
    </div>
</body>
</html>