<?php
session_start();

    if(isset($_GET['offset']) && isset($_GET['limit']))
    {
        $limit=$_GET['limit'];
        $offset=$_GET['offset'];

       include_once "includes/connection.php";

        $data=mysqli_query($conn, "SELECT * FROM articles ORDER BY created desc LIMIT {$limit} OFFSET {$offset}");

        while($row=mysqli_fetch_array($data))
        {
          echo '<div class="card mb-4">';
          //echo '<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">';
          echo '<div class="card-body">';
          echo '<h2 class="card-title">'. $row['title'].'</h2>';
          echo '<p class="card-text">'.$row['content'].'</p>';
          echo '</div>';
          echo '<div class="card-footer text-muted">';
          echo 'Posted on '.$row['created'];
          //If admin
          if(isset($_SESSION['userId']))
          {
            if($_SESSION['adminE']==1)
            {
              echo '<form action="includes/modify_article.php" method="get">
              <input type="hidden" name="id" value='.$row['article_id'].'>
              <button type="submit" class="btn btn-success">Módosítás</button>
                </form>';
            }
          }
          
          echo '</div>
          </div>';
           
        }
        $conn->close();
    }
    ?>
    