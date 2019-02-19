
<?php

$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');
?>

<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>"><button class="btn btn-secondary">Previous week</button></a> <!--Previous week | $_SERVER['PHP_SELF']-->
<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>"><button class="btn btn-secondary">Next week</button></a> <!--Next week-->

<table id="table">
    <tr>
        <td>#</td>
<?php
//Napok feltöltése
$elso=false;
$elso_nap="";
$utolso_nap="";

do {
    if($elso===false)
    {
        $elso_nap=$dt->format('Y-m-d');
        $elso=true;
    }
    else
    {
        $utolso_nap=$dt->format('Y-m-d');
    }
    echo "<th>" .  $dt->format('Y-m-d') . "</th>\n";//d M Y | $dt->format('l') . "<br>" .
    $dt->modify('+1 day');
} while ($week == $dt->format('W'));
?>
    </tr>
<?php
//Órák feltöltése
$current_day = date("N");
$current_week=date('W');

    //Órák ellenőrzése
include_once "connection.php";
//Hétfő és vasárnap közötti idők kiszedése csak
$sql="SELECT * FROM idopontok WHERE nap >= '$elso_nap' AND nap <= '$utolso_nap'";//"SELECT * FROM idopontok WHERE (nap BETWEEN '$utolso_nap' AND '$elso_nap') AND elerheto=0"
$szinezendo=mysqli_query($conn,$sql);
$lefoglaltak=array();
while($row=mysqli_fetch_assoc($szinezendo))
{
    $lefoglaltak[]=$row;
}

for($i=8;$i<16;$i++)//óra
{
    
    //echo $k;
    echo '<tr>';
    for($j=0;$j<8;$j++)//nap
    {
        
        if($j==0)
        {
            echo '<td>'.$i.'-'.($i+1).'</td>';
        }
        else
        {
            $k=new DateTime($elso_nap);
            $k->modify('+'.$j.' day');
            $k->modify('-1 day');

            $classok="";
            
            foreach($lefoglaltak as $foglalt)
            {
                //echo 'k:'.$k.' '
                //echo $foglalt['nap'].' '.$foglalt['idopont'].'<br>';
                if($foglalt['nap']==$k->format('Y-m-d') && $foglalt['idopont']==$i)//Elvilega foglalt felülírja a ma-t
                {
                    $classok.=" foglalt";
                }
                else
                {
                    if($j==$current_day && $week==$current_week)//Mert amúgy kiszinezné az összes X-edik napot
                    {
                        
                        $classok.=" ma";
                    }
                    else
                    {
                        
                        
                    }
                    
                }
            }
            $classok.=" nap";
            //echo '<td class="'.$classok.'">i:'.$i.'k:'.$k->format('Y-m-d').'</td>';
            echo '<td class="'.$classok.'"></td>';
            //TODO: Ellenőrzés és színezés | mai nap kiválasztása
            
            //TODO: Csoportos torna alter table szabad helyek más szín


            //in_array($i,$lefoglaltak) && in_array(($elso_nap+$j-1),$lefoglaltak)
            
        }
        
    }
    echo '</tr>';
}
?>
</table>
<div class="row">
    <div class="span6">
        <form action= <?php echo 'booking.php?week='.$week.'&year='.$year ?> method="post">
            <label for="nap">Day:</label>
            <input type="text" name="nap" id="nap" readonly><!--Azért nem disabled, mert az letiltja az elküldeni kívánt adatokat is, és üresen továbbítja-->

            <label for="idopont">Hour:</label>
            <input type="text" name="idopont" id="idopont" readonly>

            <button type="submit" name="foglal" class="btn btn-primary">Book</button>
        </form>
    </div>
    <?php 
    if($_SESSION['adminE']==1)
    {
        //Ha admin, akkor törölheti az időpontot
        echo '<div class="span6">';
        
        echo '<form action=booking.php?week='.$week.'&year='.$year.' method="post">';
        echo '   <input type="hidden" name="napp" id="napp" readonly>' ;
        echo '    <input type="hidden" name="idopontt" id="idopontt" readonly>';
        echo '    <button type="submit" name="delete" class="btn btn-danger">Delete</button>';
        echo '</form>
                </div>';
    }
    
    ?>
        
    
    <div class="span6">
        <a href="booking.php"><button class="btn btn-success">Frissítés</button></a>
    </div>
</div>





<?php
    //Kitöröljük a kapott értékeket
    if(isset($_POST['delete']))
    {
        $nap=$_POST['napp'];
        $idopont=$_POST['idopontt'];

        $sql="DELETE FROM idopontok WHERE nap='$nap' AND idopont='$idopont';";
        if(mysqli_query($conn,$sql))
        {
            echo "Sikeres törlés!";
        }
        else
        {
            echo "Hiba a törléskor: ".mysqli_error($conn);
        }
    }
?>

<?php
//A FORM ÉRTELMEZÉSE
    if(isset($_POST['foglal']))
    {
        $nap=$_POST['nap'];

        $idopont=$_POST['idopont'];
        
        $user=$_SESSION['userName'];

        //echo $nap." ".$idopont." ".$user;

        //echo "<br>Hétfő: ".$elso_nap." Varásnap:".$utolso_nap;

        
       
        $sql="INSERT INTO idopontok VALUES ('$nap','$idopont','$user',0);";

        if(mysqli_query($conn,$sql))
        {
            //Sikerül
            echo "Sikeres foglalás!";
        }
        else
        {
            //Nem sikerül
            echo "Hiba a foglaláskor: ".mysqli_error($conn);
        }
        //Majd egy header refresh ugyanide
        

        $conn->close();
    }
?>



<script>
    //https://www.youtube.com/watch?v=PU3Vz1O1jOU
    var table=document.getElementById('table'),rIndex,cIndex;
    for (var i = 0; i < table.rows.length; i++) 
    {
        for(var j=0;j<table.rows[i].cells.length;j++)
        {
            table.rows[i].cells[j].onclick=function()
            {
                rIndex=this.parentElement.rowIndex;
                cIndex=this.cellIndex;
                //console.log("Óra: "+rIndex+" , Nap: "+cIndex);
                //console.log(table.rows[0].cells[cIndex].innerHTML+" "+table.rows[rIndex].cells[0].innerHTML);
                document.getElementById('nap').value=table.rows[0].cells[cIndex].innerHTML;
                document.getElementById('napp').value=table.rows[0].cells[cIndex].innerHTML;
                document.getElementById('idopont').value=table.rows[rIndex].cells[0].innerHTML;
                document.getElementById('idopontt').value=table.rows[rIndex].cells[0].innerHTML;
            }
        }
    }

</script>
