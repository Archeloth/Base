<?php
include 'includes/head.php';
include 'includes/notifications.php';
?>
    <link rel="stylesheet" href="css/webshop_style.css">
    <title>Web-shop</title>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="offset-sm-1 col-sm-10">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Termék:</th>
                    <th>Nettó ár:</th>
                    <th>Raktáron van?</th>
                    <th>Rendelés:</th>
                </tr>
                <?php
                    require 'includes/connection.php';
                    $sql="SELECT * FROM termekek";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo '<tr>';
                        echo '<td><img id="imagesource" src="images/'.$row['kep'].'" height="100" onClick="Scale(this)"></td>';
                        echo '<td>'.$row['megnevezes'].'</td>';
                        echo '<td>'.$row['nettoAr'].'</td>';
                        if($row['raktaron']>0)
                        {
                            echo '<td>Igen</td>';
                            echo '<td><a href="includes/order.php?ordered='.$row['termekId'].'">Rendelés</a></td>';
                        }
                        else
                        {
                            echo '<td>Nem</td>';
                            echo '<td><p class="text-danger">Ez a termék jelenleg nem elérhető.</p></td>';
                        }
                        
                        echo '</tr>';
                    }
                    mysqli_close($conn);
                ?>
            </table>
            <div id="myModal" class="modal">
                <span class="close" onclick="modal.stlye.display = 'none'">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        </div>
    </div>
    <script>
        var modal=document.getElementById('myModal');
        var modalImg=document.getElementById('img01');

        function Scale(el){
            var ImgSrc=el.src;
            modal.style.display="block";
            modalImg.src=ImgSrc;
        }
        window.onclick = function(event){
            if(event.target==modal){
                modal.style.display="none";
            }
        }
    </script>
    <?php include 'includes/footer.php' ?>
</body>
</html>