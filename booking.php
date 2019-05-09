<?php  
include 'includes/head.php';
?>
<link rel="stylesheet" href="css/cal_style.css">
<title>Időpont foglalás</title>
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-10">
                <?php include 'includes/calendar_build.php'; ?>
            </div>
            <div class="col-sm-2 border mt-5">
                <h3>Használati utasítás</h3>
                <p>Az oldalon látható táblázatban található a már lefoglalt (piros háttérrel), illetve a szabad időpontok (fehét háttérrel). Egérrel belekattintva a megfelelő mezőbe átviheti az adatokat az alsó részen található mezőkbe, ezután érhető el a <span class="text-primary"><b>lefoglalás</b></span> (kék) gomb. <span class="text-success"><b>Frissítás</b></span> (zöld gomb) után láthatóvá válik az eredmény.<?php if($_SESSION["adminE"]==0) { echo "<br><b>Ön kizárólag CSAK egyéni tornát tud lefoglalni. Csoportos tornáról egyeztessen telefonon.</b>"; } ?> </p>
            </div>
        </div>

    </div>
    <?php include 'includes/footer.php'; ?>
</body>