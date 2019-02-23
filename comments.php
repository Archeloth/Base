<?php
include 'includes/head.php';
include 'includes/comments.inc.php';
if(isset($_GET['cid']) && isset($_GET['pid']))//Ha van törölni kívánt adat
{
    $cid=$_GET['cid'];
    $pid=$_GET['pid'];
    deleteComment($cid,$pid);
}
if(!isset($_GET['article']))
{
    //Ha nincs beállítva, akkor redirect
    //Ne kutakodj csak úgy
    header('Location: index.php');
    exit();
}
else
{
    //A cikk id-je nem kulcsfontosságú, így azt ki lehet adni az url-ben
    $id=$_GET['article'];
    //Viszont a felhasználó piszkálhatja az url-t így hiba keletkezhet.

echo '<title>Kommentek '.$id.'</title>'    ;
?>
</head>
<body>
    <?php include 'includes/nav.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php showSelectedArticle($id); ?>
            </div>
            <div class="offset-sm-1 col-sm-5">
            <?php include 'includes/commenting.php'; 
                    showSelectedComments($id);
            ?>
            </div>
            
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    
</body>
</html>
<?php
}