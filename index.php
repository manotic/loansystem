<?php 
require ('includes/header.php');

session_start();
$user->checkLogin();
?>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo $systemName; ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="action.php?action=logout">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">


      <ul class="list-unstyled ps-3">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
<?php 
if ($_SESSION['role'] == 'user' ) {
  ?>
            <li><a href="index.php" class="link-dark rounded">Dashboard</a></li>
            <li><a href="index.php?url=register" class="link-dark rounded">Register group</a></li>
            <li><a href="index.php?url=group-members" class="link-dark rounded">Group members</a></li>
            <li><a href="index.php?url=group-activities" class="link-dark rounded">Group activities</a></li>
<?php 
} else if ($_SESSION['role'] == 'admin' ) {
  ?>
            <li><a href="index.php?url=admin" class="link-dark rounded">Dashboard</a></li>
<?php 
} else {
  ?> 
            <li><a href="index.php?url=member" class="link-dark rounded">Dashboard</a></li>
<?php
}
?>
          </ul>
        </div>
      </li>
  <?php 
  if ($_SESSION['role'] == 'user' ) {
?>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Loan management
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        <!-- <li><a href="#" class="link-dark rounded">Loan application</a></li> -->
            <li><a href="index.php?url=request" class="link-dark rounded">Requested loan</a></li>
   
          </ul>
        </div>
      </li>
      <?php 
  } ?>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <!-- <li><a href="#" class="link-dark rounded">Profile</a></li> -->
<?php 
if ($_SESSION['role'] == 'member' ) {

  echo '<li><a href="index.php?url=settings" class="link-dark rounded">Settings</a></li>';
} else {

  echo '<li><a href="index.php?url=settings" class="link-dark rounded">Settings</a></li>';
}
?>
            <li><a href="action.php?action=logout" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php

    if (isset($_GET['url'])) {

      $url= $_GET['url'];
      $includeAddress = $user->getAddress($url);
      if ($includeAddress) {
        include ('includes/'.$includeAddress);
      }
    }

    ?>
</main>

  </div>
</div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
