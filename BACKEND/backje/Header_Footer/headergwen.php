
<header>
    <!-- Navigation -->
    <?php session_start();
if ((isset($_SESSION['login'])) || (!empty($_SESSION['login']))) 
{$user=$_SESSION['login']; }
if (isset($_SESSION["name"])) {
   echo '<H1 class="form-legend">Bienvenue ' . $_SESSION["name"] . '!</H1>';} ?>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
      <img class="logo footLogo " src="img\MenuizMan_logo.png" alt="logo">

     
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php" onclick="session_destroy()">Deconnexion</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Articles
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Tasse</a></li>
            <li><a class="dropdown-item" href="#">T-shirt</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Promo</a></li>
          </ul>
        </li>
      </ul>
     
    </div>
  </div>
</nav>


</header>