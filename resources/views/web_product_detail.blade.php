<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yummy Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('asset/web/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('asset/web/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('asset/web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/web/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('asset/web/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('asset/web/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/web/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('asset/web/css/main.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="border: 1px solid #ddd;">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Yummy<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/usersite">Home</a></li>
          <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach($category as $cat)
              <li><a href="/web/category/{{ $cat->cid }}">{{ $cat->cname }}</a></li>
           
             @endforeach
            </ul>
          <li><a href="/web/product">Products</a></li>
          @if(session()->has('usersitesession'))
            <li><a href="/web/profile">My Profile</a></li>
            
          @else
          <li><a href="/web/login">Login</a></li>
          @endif
          <li><a href="/web/about">About</a></li>
          <li><a href="/web/contact">Contact</a></li>
          
        </ul>
      </nav><!-- .navbar -->

      <a href = "/web/cart" class="btn-book-a-table" style = "color:white">
    
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <?php echo $totalcartdata; ?>
    </a>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header><!-- End Header -->

      <div style="height: 60px;"> </div>

<main id="main">
      <section id="chefs" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
        
          <p>Product <span>Detail</span></p>
        </div>

        <div class="row gy-5"> 
<?php
foreach($product as $p)
{
?>
        
<div class="col-lg-5" align="center"> 

<img src="{{url('/')}}/profile/<?php echo $p->pimage; ?>" style="width: 100%;">

</div>

<div class="col-lg-7">

<h3> <?php echo $p->pname; ?> </h3>
<br>
<p> Price : ₹ <?php echo $p->pprice; ?>/-</p>
<hr>

<p style="text-align:justify;">
<?php echo $p->description; ?>
</p>
<br>
<form method = "post" action = "{{url('/')}}/web/addtocart">
                  @csrf
                  <input type = "hidden" name = "pid" value = "<?php echo $p->pid; ?>">
                  <input type = "hidden" name = "pprice" value = "<?php echo $p->pprice; ?>">
                <button type="submit" name="submit" value="submit" class="btn btn-link" style="text-decoration: none; color: red;"> Add to cart 
            </form>


</div>


<?php
}
?>

</div>

      </div>
</section>




<section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
        
          <p>Related <span>Products</span></p>
        </div>

        <div class="row gy-4">

        <?php
            foreach($related as $p1)
            {
        ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{url('/')}}/profile/<?php echo $p1->pimage; ?>" style="height: 200px;" class="img-fluid" alt="">
             
              </div>
              <div class="member-info">
                <h5>
              <form method="post" action="{{url('/')}}/web/productdetail">
                @csrf

              <input type="hidden" name="pid" value="<?php echo $p1->pid; ?>">
              <input type="hidden" name="pname" value="<?php echo $p1->pname; ?>">


              <button type="submit" name="submit" value="submit" class="btn">
                  <?php echo $p1->pname; ?>
              </button>
          </form>
                </h5>
                <span style="color: red; font-size: 18px;">₹ <?php echo $p1->pprice; ?> /-</span>
                <p> <?php echo $p1->description; ?> </p>
              <hr>
                <span>
                <button type="submit" name="submit" value="submit" class="btn btn-link" style="text-decoration: none; color: red;"> Add to cart </button>
              </span>
              </div>
            </div>
          </div><!-- End Chefs Member -->

<?php

}
     ?>  
     
    </div>

      </div>
    </section><!-- End Chefs Section -->




  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022 - US<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('asset/web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('asset/web/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('asset/web/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('asset/web/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('asset/web/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('asset/web/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('asset/web/js/main.js')}}"></script>

</body>

</html>