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
            <div class="col-sm-2">
            Megjegyzések, illetve használati útmutató
            </div>
        </div>

    </div>
    <?php include 'includes/footer.php'; ?>
</body>