<?php include "head.php"; ?>
    <title>Módosítás</title>
</head>
<body>
<div class="container">
    <div class="offset-sm-2 col-sm-8">
        <h3>Itt tudod módosítani az adott cikket</h3>
        <form action="update_article.php" method="post">
            <?php
                if(isset($_GET['id']))//És a SESSION jogköre megengedi
                {
                    $id=$_GET['id'];
                    include_once "connection.php";
                    //Load in the data
                    $sql="SELECT * FROM articles WHERE article_id='$id'";
                    $data=mysqli_query($conn,$sql);
                    if(!$data)
                    {
                        echo "Error: ".mysqli_error($conn);
                    }
                    if($row=mysqli_fetch_array($data))
                    {
                        echo '<label for="title">Cím: </label>';
                        echo '<input type="text" name="title" id="" value="'.$row['title'].'"><br><br>';
                        echo '<label for="theme">Téma: </label>';
                        echo '<input type="text" name="theme" id="" value="'.$row['theme'].'"><br><br>';
                        echo '<label for="content">Szöveg: </label>';
                        echo '<textarea name="content" id="" cols="100" rows="20">'.$row['content'].'</textarea><br><br>';
                        echo '<input type="hidden" name="id" value="'.$id.'">';
                    }

                }//A módosítás gomb update-eli a táblát
                //A törlés gomb törli a táblából az adott cikket
                //$connection->close();
            ?>
            <hr>
            <button type="submit" name="update" class="btn btn-success">Módosítás</button>
            <button type="reset" class="btn btn-warning">Visszaállítás</button>
        </form>
        <?php 
        //Jelenítse meg a feltöltött képek "linkjeit" amiket be lehet ágyazni a html-be, mellette pedig egy törlés gomb
        
        include_once "select_images.php";
        
        echo '
            <hr>
            <p><b>Kép feltöltés:</b></p>
            <form action="upload_image.php?id='.$id.'" method="post" enctype="multipart/form-data">
                <label for="image">Válassz egy fájlt:</label>
                <input type="file" name="file" id="" required><br>
                <button type="submit" name="submit">Feltölt</button>
            </form>
            <hr>';
        echo '<a href="delete_article.php?id='.$id.'"><button>Törlés</button></a>';
        echo '<a href="../index.php">Vissza a kezdőlapra</a>';
        ?>
    </div>
</div>

    
</body>
</html>