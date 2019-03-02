<?php
$sql="SELECT * FROM szemelyes_adatok WHERE userId='".$_SESSION['userId']."'";
require 'connection.php';

$data=mysqli_query($conn,$sql);
if($data)
{
    $row=mysqli_fetch_assoc($data);
    echo '<td>'.$row['knev'].'</td>';
    echo '<td>'.$row['vnev'].'</td>';
    if($row['nem']==0)
    {
        echo '<td>Férfi</td>';
    }
    else
    {
        echo '<td>Nő</td>';
    }
    echo '<td>'.$row['telszam'].'</td>';
    echo '<td>'.$row['szuldatum'].'</td>';
    echo '<td>'.$row['lakcim'].'</td>';
}
