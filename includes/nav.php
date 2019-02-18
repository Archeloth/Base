

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kisokos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Webáruház</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">A honlapról</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tornaterem</a>
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
            if($_SESSION['adminE']==true)
            {
              echo '<li class="nav-item">
                  <a class="nav-link" href="#">Új cikk írása</a>
                </li>';
            }

            echo '<li class="nav-item">
                  <a class="nav-link" href="#">Időpont foglalás</a>
                </li>';

            echo '<li class="nav-item">
                <a class="nav-link" href="personal.php">Saját adatok</a>
              </li>';


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