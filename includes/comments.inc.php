<?php

function showSelectedArticle($article_id)
{
    $id=$article_id;
    include_once 'includes/connection.php';
    $sql="SELECT title,content,created FROM articles WHERE article_id = ?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header('Location: comments.php?article='.$id.'&error=sqlerror');
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        //http://php.net/manual/en/mysqli-stmt.get-result.php --- második komment (miért ne használjunk store_resultsot és get_resultsot együtt)
        mysqli_stmt_bind_result($stmt,$title,$content,$created);
          
        if(mysqli_stmt_fetch($stmt))
        {
            echo '<div class="card mb-4 mycard">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title">'.$title.'</h2>';
            echo '<p class="card-text">'.$content.'</p>';
            echo '</div>';
            echo '<div class="card-footer text-muted">';
            echo 'Létrehozva '.$created;
            echo '</div>
            </div>';
        }
        else
        {
            //Nincs ilyen cikk, ne próbálkozz átírni az id-t nem létezőre
            header('Location: index.php?error=getout');
            exit();
        }
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

function showSelectedComments($article_id)
{
    $id=$article_id;
    include 'includes/connection.php';
    $sql="SELECT * FROM comments WHERE parentId='$id' ORDER BY date desc";
    $results=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($results))
    {
        echo '
        <div class="card mycard comment">
            <div class="card-body">
                <div class="card-text">
                    <p>'.$row['content'].'</p>
                    </div>
                </div>
            <div class="card-footer">
                <p>'.$row['username'].' - '.$row['date'].'</p> ';
                if($_SESSION['adminE']==1)
                {
                    echo '<a href="comments.php?cid='.$row['comment_id'].'&pid='.$row['parentId'].'">Törlés</a>';
                }
        echo '    </div>
        </div>';
    }

    mysqli_close($conn);
}
function processNewComment($article_id)
{
    $id=$article_id;
    //Ha megnyomták a kommentelési gombot és nem üres a textfield, akkor felvesszük az adatbázisban
    if(isset($_POST['submit-comment']) && !empty($_POST['comment']) )
    {
        include 'includes/connection.php';
        $comment=$_POST['comment'];
        
        $userid=$_POST['userid'];
        $username=$_POST['username'];

        $sql="INSERT INTO comments (userId,username,content,parentId) VALUES (?,?,?,?) ";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header('Location: comments.php?article='.$id.'&error=sqlerror');
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sssi", $userid,$username,$comment,$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            
        }
    }
    else
    {
        unset($_POST['submit-comment']);
        unset($_POST['userid']);
        unset($_POST['username']);
        unset($_POST['comment']);
    }
}
function deleteComment($commentId, $parentId)
{
    if($_SESSION['adminE']==1)
    {
        $cid=$commentId;
        $pid=$parentId;
        include 'includes/connection.php';
        $sql="DELETE FROM comments WHERE comment_id=$cid AND parentId=$pid";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header('Location: comments.php?article='.$parentId);
            exit();
        }
        else
        {
            echo 'Hiba keletkezett '.mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}