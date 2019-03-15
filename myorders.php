<?php
if(isset($_GET['error']) && $_GET['error']=="sqlerror")
{
    echo '<div class="alert alert-danger fade show">
        <strong>Kapcsolati hiba!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
if(isset($_GET['delete']) && $_GET['delete']=="success")
{
    echo '<div class="alert alert-success fade show">
        <strong>Sikeres törlés!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
if(isset($_GET['order']) && $_GET['order']=="success")
{
    echo '<div class="alert alert-success fade show">
        <strong>Sikeres módosítás!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
include 'includes/head.php';
?>
    <title>Rendeléseim</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="offset-sm-1 col-sm-10">
            <h3>Itt találhatóak a még függőben lévő rendelések</h3>
            <table class="table">
                <tr>
                    <th>Termék:</th>
                    <th>Rendelés időpontja:</th>
                    <th>Függésben áll:</th>
                    <th>#</th>
                    <?php if($_SESSION['adminE']==true) echo '<th>Rendelte:</th><th>Elfogadás:</th>';  ?>
                </tr>
                <?php
                require 'includes/connection.php';
                if($_SESSION['adminE']==true)//Az admin lássa az összes leadott rendelést
                {
                    $sql="SELECT termekek.megnevezes, rendelesek.rendelesIdopontja, TIMESTAMPDIFF(DAY,rendelesek.rendelesIdopontja, NOW()) as timediff, bejelentkezo_adatok.userName, bejelentkezo_adatok.userId, rendelesek.rendelesId FROM rendelesek INNER JOIN bejelentkezo_adatok ON rendelesek.userId = bejelentkezo_adatok.userId INNER JOIN termekek ON rendelesek.termekId=termekek.termekId WHERE rendelesek.teljesitve=0";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['megnevezes'].'</td>';
                        echo '<td>'.$row['rendelesIdopontja'].'</td>';
                        echo '<td>'.$row['timediff'].' napja</td>';
                        echo '<td><a href="includes/delete.order.php?rendelesId='.$row['rendelesId'].'&termek='.$row['megnevezes'].'">Törlés</a></td>';
                        echo '<td><a href="patients.php?search='.$row['userName'].'&search-submit=">'.$row['userName'].'</a></td>';
                        echo '<td><a href="includes/fullfill.order.php?user='.$row['userId'].'&time='.$row['rendelesIdopontja'].'">Rendelés teljesítése</a></td>';
                        echo '</tr>';
                    }
                }
                else//Amúgy a user-ek pedig csak a sajátjukat láthatják
                {
                    $user=$_SESSION['userId'];
                    $sql="SELECT termekek.megnevezes, rendelesek.rendelesIdopontja, TIMESTAMPDIFF(DAY,rendelesek.rendelesIdopontja, NOW()) as timediff, rendelesId FROM rendelesek INNER JOIN termekek ON rendelesek.termekId=termekek.termekId WHERE rendelesek.userId='$user' AND rendelesek.teljesitve=0";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<tr>';
                            echo '<td>'.$row['megnevezes'].'</td>';
                            echo '<td>'.$row['rendelesIdopontja'].'</td>';
                            echo '<td>'.$row['timediff'].' napja</td>';
                            echo '<td><a href="includes/delete.order.php?rendelesId='.$row['rendelesId'].'&termek='.$row['megnevezes'].'">Törlés</a></td>';
                            echo '</tr>';
                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-warning fade show">
                            <strong>Nem található rendelés!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    }
                }
                ?>
            </table>
            <h3>Már teljesített rendelések</h3>
            <table class="table">
                <tr>
                    <th>Termék:</th>
                    <th>Rendelés időpontja:</th>
                    <th>Összeg:</th>
                    <?php if($_SESSION['adminE']==true) echo '<th>Rendelte:</th>'; ?>
                    <th>Számla:</th>
                </tr>
                <?php
                if($_SESSION['adminE']==true)//Admin látja az összes teljesített rendelést
                {
                    $sql="SELECT * FROM rendelesek INNER JOIN bejelentkezo_adatok ON rendelesek.userId=bejelentkezo_adatok.userId INNER JOIN termekek ON rendelesek.termekId=termekek.termekId INNER JOIN szemelyes_adatok ON rendelesek.userId=szemelyes_adatok.userId WHERE rendelesek.teljesitve=1";
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($query))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['megnevezes'].'</td>';
                        echo '<td>'.$row['rendelesIdopontja'].'</td>';
                        echo '<td>'.$row['nettoAr'].'</td>';
                        echo '<td>'.$row['userName'].'</td>';
                        echo '<td><form action="makepdf.php" method="post">
                                        <input type="hidden" name="id" value="'.$row['rendelesId'].'">
                                        <input type="hidden" name="termek" value="'.$row['megnevezes'].'">
                                        <input type="hidden" name="nettoar" value="'.$row['nettoAr'].'">
                                        <input type="hidden" name="idopont" value="'.$row['rendelesIdopontja'].'">
                                        <input type="hidden" name="knev" value="'.$row['knev'].'">
                                        <input type="hidden" name="vnev" value="'.$row['vnev'].'">
                                        <input type="hidden" name="telszam" value="'.$row['telszam'].'">
                                        <input type="hidden" name="lakcim" value="'.$row['lakcim'].'">
                                        <button type="submit" class="btn btn-outline-secondary" name="pdf-submit">#</button>
                                    </form></td>';
                        echo '</tr>';
                    }
                }
                else//User csak a sajátjait
                {
                    $user=$_SESSION['userId'];
                    $sql="SELECT * FROM rendelesek INNER JOIN termekek ON rendelesek.termekId=termekek.termekId INNER JOIN szemelyes_adatok ON rendelesek.userId=szemelyes_adatok.userId WHERE rendelesek.userId='$user' AND rendelesek.teljesitve=1";
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($query))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['megnevezes'].'</td>';
                        echo '<td>'.$row['rendelesIdopontja'].'</td>';
                        echo '<td>'.$row['nettoAr'].'</td>';
                        echo '<td><form action="makepdf.php" method="post">
                                        <input type="hidden" name="id" value="'.$row['rendelesId'].'">
                                        <input type="hidden" name="termek" value="'.$row['megnevezes'].'">
                                        <input type="hidden" name="nettoar" value="'.$row['nettoAr'].'">
                                        <input type="hidden" name="idopont" value="'.$row['rendelesIdopontja'].'">
                                        <input type="hidden" name="knev" value="'.$row['knev'].'">
                                        <input type="hidden" name="vnev" value="'.$row['vnev'].'">
                                        <input type="hidden" name="telszam" value="'.$row['telszam'].'">
                                        <input type="hidden" name="lakcim" value="'.$row['lakcim'].'">
                                        <button type="submit" class="btn btn-outline-secondary" name="pdf-submit">#</button>
                                    </form></td>';
                        echo '</tr>';
                    }
                }

                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>
</html>