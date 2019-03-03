<?php 
    include 'includes/head.php';
    include 'includes/cookie.check.php';

    if(!isset($_GET['search-submit']) && !isset($_GET['search']))
    {
?>
    <script>
    //https://stackoverflow.com/questions/3898130/check-if-a-user-has-scrolled-to-the-bottom
        function getDocHeight() {
            var D = document;
            return Math.max(
                D.body.scrollHeight, D.documentElement.scrollHeight,
                D.body.offsetHeight, D.documentElement.offsetHeight,
                D.body.clientHeight, D.documentElement.clientHeight
            );
        }

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
                if($(window).scrollTop() + $(window).height() > $(document).height() - 50) {
                    //Vagy a "100"-as számot lehet még igazítani
                    //alert('At bottom');
                    //if($(window).scrollTop() >= $(document).height() - $(window).height()){
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
    <title>E-Kisokos</title>
</head>
<body>
<?php include 'includes/nav.php'; ?>

<?php 
include 'includes/content.php'; 

?>

<?php //include 'includes/footer.php'; ?>

</body>
</html>