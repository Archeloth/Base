<?php
include 'includes/head.php';
?>
    <title>Betegek</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container-fluid">
        <div class="offset-sm-1 col-sm-10">
            <h3>Összes beteg listája</h3>
            <table class="table">
                <tr>
                    <th>Felhasználónév:</th>
                    <th>Email cím:</th>
                    <th>Teljes név:</th>
                    <th>Telefonszám:</th>
                    <th>Születési dátum:</th>
                    <th>Lakcím</th>
                    <th>Regisztráció időpontja:</th>
                </tr>
                <?php
                require 'includes/connection.php';
                $sql="SELECT * FROM bejelentkezo_adatok INNER JOIN szemelyes_adatok ON bejelentkezo_adatok.userId = szemelyes_adatok.userid INNER JOIN adminisztracio_adatok ON bejelentkezo_adatok.userId = adminisztracio_adatok.userId WHERE adminisztracio_adatok.betegE=1";
                $query=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($query))
                {
                    echo '<tr>';
                    echo '<td>'.$row['userName'].'</td>';
                    echo '<td>'.$row['userEmail'].'</td>';
                    echo '<td>'.$row['knev'].' '.$row['vnev'].'</td>';
                    echo '<td>'.$row['telszam'].'</td>';
                    echo '<td>'.$row['szuldatum'].'</td>';
                    echo '<td>'.$row['lakcim'].'</td>';
                    echo '<td>'.$row['regisztracio'].'</td>';
                    echo '</tr>';
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>
</html>