<?php
include 'includes/head.php';

?>

    <title>Időpontjaim</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container">
        <div class="offset-sm-1 col-sm-10">
            <h3>Itt található meg az általad lefoglalt elkövetkező időpontok listája</h3>

            <table class="table">
                <tr>
                    <th>Dátum:</th>
                    <th>Óra:</th>
                    <th>Típus</th>
                    <th>Ára:</th>
                    <th>#</th>
                </tr>
                <?php //Listázni, +törlés mező 
                require 'includes/connection.php';
                $user=$_SESSION['userId'];
                $sql="SELECT * FROM tornazok INNER JOIN tornak ON tornazok.tornaId = tornak.tornaId WHERE tornazok.userId='$user' AND tornazok.nap >= CURDATE();";
                $query=mysqli_query($conn,$sql);
                if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_assoc($query))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['nap'].'</td>';
                        echo '<td>'.$row['idopont'].'</td>';
                        echo '<td>'.$row['megnevezes'].'</td>';
                        echo '<td>'.$row['ar'].'Ft</td>';
                        echo '<td><a href="includes/delete_meeting.php?date='.$row['nap'].'&hour='.$row['idopont'].'">Törlés</a></td>';
                        echo '</tr>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-warning fade show">
                        <strong>Nem található időpont!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>
</html>