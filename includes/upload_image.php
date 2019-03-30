<?php

if(isset($_POST['submit']))
{
    include_once "connection.php";
    $id=$_GET['id'];
    $celmappa='../images/';
    $idobelyeg=date('YmdGis');
    $file_name="artic_".$id."_".$idobelyeg.".jpg";
    $tmp_dir=$_FILES['file']['tmp_name'];

    if(!preg_match('/(jpg)$/i',$file_name))
    {
        echo "Rossz fájltípus!";
    }
    else
    {
        if(move_uploaded_file($tmp_dir,$celmappa.$file_name))
        {
            echo "success<br>";
            $feltoltve=true;
        }
        else
        {
            echo "fail";
            $feltoltve=false;
        }
    }

    if($feltoltve)
    {
        echo "A fájl fel lett töltve";
        $beir="INSERT INTO kepek (kepnev,article_id) VALUES ('$file_name',$id)";
        $keres=mysqli_query($conn,$beir);
        if($keres)
        {
            echo "Az adatbázisban rögzítve lett!";
            header('Location:../modify_article.php?id='.$id.'');
        }
        else
        {
            echo "Hiba az adatbázisba íráskor!".mysqli_error($conn);
            header('Location:../modify_article.php?id='.$id.'');
        }
    }
    $conn->close();
}
?>
