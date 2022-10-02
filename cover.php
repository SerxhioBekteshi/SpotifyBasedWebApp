<!DOCTYPE html>
<html lang="en">
<head>
<?php include("BootstrapJquery/BootstrapJquery.php") ?>
    <link rel="stylesheet" href="css/cover.css" />
    <style>
      .aa 
      {
        color: pink;
      }

      .responsive 
      {
        width: 100%;
        height: auto;
      }
    </style>
</head>
<body >

    <nav class="color-white" style= "background-color: black;">
        <ul class="nav justify-content-center">
            <li class="nav-item ">
              <a class="nav-link aa" href="#">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link aa" href="#">About us</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link aa" href="login.php">Log In</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link aa" href="registration.php"  >Register</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid responsive"  style = " background-image: url('foto/cover.png'); background-repeat: no-repeat; background-size: cover; background-color: transparent;">
        <div class = "d-flex justify-content-center">
              <div style = "margin-top: 300px; margin-bottom: 300px">
                <h1>YOUR MUSIC</h1>
                <p>LISTEN AND EDIT YOUR PLAYLIST SONG AS YOU LIKE WHENEVER AND WHEREVER YOU ARE</p>
                <button class = "btn btn-warning" type = "button"> Get Started </button>
              
              </div>
        </div>
    </div>

    <footer class="footer-14398">
        <div class="container">
              <div class="row mb-5">

                  <div class="col-md-3">
                    <a href="#" class="footer-site-logo">Colorlib</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit officiis corporis optio natus. </p>
                  </div>

                <div class="col-md-2 ml-auto">
                    <h3>Shop</h3>
                    <ul class="list-unstyled links">
                      <li><a href="#">Sell online</a></li>
                      <li><a href="#">Features</a></li>
                      <li><a href="#">Examples</a></li>
                      <li><a href="#">Website editors</a></li>
                      <li><a href="#">Online retail</a></li>
                    </ul>
                </div>

                <div class="col-md-2 ml-auto">
                    <h3>Press</h3>
                    <ul class="list-unstyled links">
                      <li><a href="#">Events</a></li>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Awards</a></li>
                      <li><a href="#">Testimonials</a></li>
                      <li><a href="#">Online retail</a></li>
                    </ul>
                </div>

                <div class="col-md-2 ml-auto">
                    <h3>About</h3>
                    <ul class="list-unstyled links">
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Team</a></li>
                      <li><a href="#">Career</a></li>
                      <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
              </div>

              <div class="row mb-4">

                  <div class="col-12 pb-4">
                    <div class="line"></div>
                  </div>

                  <div class="col-md-6 text-md-left">
                      <ul class="list-unstyled link-menu nav-left">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Code of Conduct</a></li>
                      </ul>
                  </div>
                  <div class="col-md-6 text-md-right">
                      <ul class="list-unstyled social nav-right">
                        <li><a href="https://twitter.com"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://pinterest.com"><i class="bi bi-pinterest"></i></a></li>
                      </ul>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-7">
                    <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, fuga. Ex at maxime eum odio quibusdam pariatur expedita explicabo harum! Consectetur ducimus delectus nemo, totam odit!</small></p>
                  </div>
              </div>
        </div>
    </footer>
</body>
</html>