
<?php 
    include 'includes/head.php';
    if(!isset($_GET['search-submit']))
    {
?>
    <script>
        $(document).ready(function(){

            var flag=0;

            $.ajax({
                type: "GET",
                url: "get_data.php",
                data: {
                    'offset': 0,
                    'limit': 3
                },
                success: function(data){
                    $('.col-md-8').append(data);
                    flag+=3;
                }

            });

            $(window).scroll(function(){
                if($(window).scrollTop() >= $(document).height() - $(window).height()){
                    //alert('At bottom');
                    $.ajax({
                        type: "GET",
                        url: "get_data.php",
                        data: {
                            'offset': flag,
                            'limit': 3
                        },
                        success: function(data){
                            $('.col-md-8').append(data);
                            flag+=3;
                        }

                    });
                }
            });
        });
    </script>
    <?php
    }

    ?>
    <title>E-Kisokos LogInSystem</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>

<?php 

include 'includes/content.php'; 

?>

<?php //include 'includes/footer.php'; ?>

</body>
</html>