<!-- Sidebar Widgets Column -->
<div class="column col-md-4 mt-2 fixed">

<!-- Search Widget -->
<div class="card my-4 mycard">
  <h5 class="card-header">Keresés</h5>
  <div class="card-body">
  <form action="index.php" method="GET">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="...">
      <button type="submit" class="btn btn-primary ml-2" name="keres-submit">Keres</button>
    </div>
  </form>
  </div>
</div>

<!-- Categories Widget -->
<!-- Kategóriák szerint lehet listázni, a linkekre kattintva a kereső funkció indul el-->
<div class="card my-4 mycard">
  <h5 class="card-header">Kategóriák</h5>
  <div class="card-body d-flex justify-content-center">
    
        <ul class="list-unstyled mb-0">
        <?php
        include 'connection.php';
        $sql="SELECT theme FROM articles GROUP BY theme";
        $result=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
          echo '<li>
                  <a href="index.php?search='.$row['theme'].'&keres-submit=">'.$row['theme'].'</a>
                </li>';
        }

        $conn->close();
        ?>
          
        </ul>
      
        
     
  </div>
</div>

<!-- Side Widget -->
<!--
<div class="card my-4 mycard">
  <h5 class="card-header">Side Widget</h5>
  <div class="card-body">
    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
  </div>
</div>
-->
</div>