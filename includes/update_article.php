<?php
    if(isset($_POST['update']))
    {
        $new_title=$_POST['title'];
        $new_content=$_POST['content'];
        $new_theme=$_POST['theme'];
        $id=$_POST['id'];
        //echo $new_title.$new_content;
        include_once "connection.php";
        
            $sql="UPDATE articles SET theme='$new_theme',title='$new_title',content='$new_content' WHERE article_id='$id';";
            

            if(mysqli_query($conn,$sql))
            {
                echo "Successful update!";
                header('refresh:1 url=../index.php');
            }
            else
            {
                echo "Error during the update: ".mysqli_error($conn);
                header('refresh:3 url=../index.php');
            }
        mysqli_close($conn);
    }
?>