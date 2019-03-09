<?php
    $id=$_GET['id'];
    include_once "connection.php";
    $sql="DELETE FROM articles WHERE article_id='$id';";
    if(mysqli_query($conn,$sql))
    {
        echo "Successful data delete!";
        header('refresh:1 url=../index.php');
    }
    else
    {
        echo "Error during the data deletion: ".mysqli_error($conn);
        header('refresh:1 url=../index.php');
    }
    $conn->close();
?>