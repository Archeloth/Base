<?php
    include "includes/head.php";
    if($_SESSION['adminE']==1)
    {
        include "includes/nav.php";
?>
    <title>Új cikk írása</title>
</head>
<body>
<div class="container py-5">
    <div class="offset-sm-1 col-sm-10">
        <h3>Új cikk felvétele</h3>
        <form action="includes/insert_new.php" method="post">
            <label for="theme">Téma: </label>
            <input type="text" class="form-control" name="theme" id="">

            <label for="title">Cím: </label>
            <input type="text" name="title" class="form-control">

            <label for="content">Szöveg: </label>
            <textarea name="content" id="" cols="100" rows="20" class="form-control"></textarea><br>

            <button type="submit" name="submit-new" class="btn btn-success">Elfogad</button>
            <button type="reset" class="btn btn-warning">Visszaállít</button>
        </form>
        <a href="index.php">Vissza a főlapra</a>
    </div>
</div>
    
</body>
</html>
<?php
include 'includes/footer.php';
    }
    else
    {
        header('Location: index.php');
    }