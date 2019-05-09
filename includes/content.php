<!-- Page Content -->
<div class="container">

<div class="row">

  <!-- Blog Entries Column, ehhez fűződnek hozzá a cikkek -->
  <div class="column col-md-8 order-12">
    <h1 class="my-4">Gyógytorna
      <small>mindenkinek...</small>
    </h1>

  <?php 
    if(isset($_GET['search']))
    {
      include 'includes/search.php';
    }
  ?>
    
  </div>

  <?php include 'includes/sidebar.php'; ?>

</div>
<!-- /.row -->

</div>
<!-- /.container -->