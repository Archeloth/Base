<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kisokos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a class="nav-link" href="#">A honlapról</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tornateremről</a>
          </li>
          
          <?php

          if(!isset($_SESSION['userId']))
          {
            echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Log in</a>
                  </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="signup.php">Sign Up</a>
                </li>';
          }
          else
          {
            echo '<li class="nav-item">
                    <a class="nav-link" href="webshop.php">Webáruház</a>
                  </li>';
            echo '<li class="nav-item">
                  <a class="nav-link" href="booking.php">Időpont foglalás</a>
                </li>';
            if($_SESSION['adminE']==true)
            {
              echo '<li class="nav-item">
                  <a class="nav-link" href="new_article.php">Új cikk írása</a>
                </li>';
                echo '<li class="nav-item">
                <a class="nav-link" href="#">Betegek</a>
              </li>';
            }
            

            echo '<div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '.$_SESSION["userName"].'
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="myprofile.php">Profilom</a>
              <a class="dropdown-item" href="mymeetings.php">Időpontjaim</a>
              <a class="dropdown-item" href="myorders.php">Függő rendelések</a>
            </div>
          </div>';


            echo '<li class="nav-item">
            <form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-danger" name="logout-submit">Kilépés</button>
            </form>
          </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>