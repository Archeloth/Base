<?php
    if(isset($_POST['ok']))
    {
        $theme=$_POST['theme'];
        $title=$_POST['title'];
        $content=$_POST['content'];

        include_once "connection.php";
        
        $sql="INSERT INTO articles (theme,title,content) VALUES ('".$theme."','".$title."','".$content."');";
        if(mysqli_query($conn,$sql))
        {
            echo "Successful data insert!";
            header('refresh:1 url=index.php');
        }
        else
        {
            echo "Error during the data insertation: ".mysqli_error($conn);
            header('refresh:3 url=index.php');
        }
        $conn->close();
    }
?>