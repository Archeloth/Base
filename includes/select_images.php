<?php
    echo '<hr>';
    echo 'A cikkhez már feltöltött képek:<br>';
    //echo $id;
    $links="";
    
    include_once "connection.php";
    $sql="SELECT * FROM kepek WHERE article_id='$id'";
    //echo $sql;
    $image_links=mysqli_query($conn,$sql);

    if($image_links)
    {
        if(mysqli_num_rows($image_links)==0)
        {
            echo "Nincsenek feltöltött képek";
            $links="";
        }
        else
        {
            while($row=mysqli_fetch_array($image_links))
            {
                echo '<img src="images/'.$row['kepnev'].'" width="100" height="100">';
                echo '<a href="includes/image_delete.php?name='.$row['kepnev'].'&id='.$id.'">Törlés</a>';//Kép törlése
                $links.='&lt;img src="images/'.$row['kepnev'].'"&gt<br>';
                
            }
            echo '<pre><code>'.$links.'</code></pre>';
            //echo '<textarea name="image_links" id="" cols="45" rows="8" value='.$links.'';
            //echo '</textarea>';
        }
    }
    $conn->close();
?>
