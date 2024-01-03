<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yummy</title>
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
  <header id="header" class="header fixed-top d-flex align-items-center">
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
          </li>
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

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Enjoy Your <br>Sweet Moments</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
          
          <form method = "post" action = "{{url('/')}}/searchproduct" name = "search" id = "search" autocomplete = "off">
                        @csrf
                    <input type="search" placeholder = "Search..." name = "search" style = "padding: 6px; font-size: 17px; border: 1px solid grey; cursor: pointer;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search" style = "padding: 6px;"></i>
                    </button>
        </form>

<div class="d-flex" data-aos="fade-up" data-aos-delay="200">
           
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="{{asset('asset/web/img/icecream_cake.png')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


  <main id="main">

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us section-bg">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="why-box">
          <h3>Why Choose Yummy?</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
          </p>
          <div class="text-center">
            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
      </div><!-- End Why Box -->

      <div class="col-lg-8 d-flex align-items-center">
        <div class="row gy-4">

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="fa-fa ice-cream"></i>
              <h4>Ice-Cream</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
          </div><!-- End Icon Box -->

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="fa fa-birthday-cake"></i>
              <h4>Cake</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
          </div><!-- End Icon Box -->

        </div>
      </div>

    </div>

  </div>
</section><!-- End Why Us Section -->

  <!-- ======= Stats Counter Section ======= -->
  <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end= 
              <?php
                echo $totaluser;
              ?>
               data-purecounter-duration="1" class="purecounter"></span>
             
              <p>Total Users</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end= 
              <?php
                echo $totalproduct;
              ?>
               data-purecounter-duration="1" class="purecounter"></span>
             
              <p>Total Products</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end= 
              <?php
                echo $totalcategory;
              ?>
               data-purecounter-duration="1" class="purecounter"></span>
             
              <p>Total Category</p>
            </div>
          </div><!-- End Stats Item -->

          
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end= 
              <?php
                echo $totalcompleteorder;
              ?>
               data-purecounter-duration="1" class="purecounter"></span>
             
              <p>Total Complete Order</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu0">
              <h4>All</h4>
            </a>
          </li><!-- End tab nav item -->
        <?php
foreach($category as $c)
{


?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu<?php echo $c->cid; ?>">
              <h4><?php echo $c->cname; ?></h4>
            </a>
          </li><!-- End tab nav item -->
<?php

}
?>
    

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu0">

            <div class="tab-header text-center">
              <p>All Company List</p>
            
            </div>

            <div class="row gy-5">

<?php

foreach($all as $allc)
{

?>

              <div class="col-lg-4 menu-item">
                <a href="{{asset('asset/web/img/menu/menu-item-1.png')}}" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $allc->cname; ?></h4>
                <p class="ingredients">
         <form method="post" action="{{url('/')}}/web/product1">
@csrf
<input type="hidden" name="catid" value="<?php echo $allc->cid; ?>">
<input type="hidden" name="subid" value="<?php echo $allc->subid; ?>">
<input type="hidden" name="catname" value="<?php echo $allc->cname; ?>">
       <button type="submit" name="submit" value="submit" class="btn btn-link" style="text-decoration: none; color: #555;"> Show All Products </button>
</form>
                </p>
              
              </div><!-- Menu Item -->
<?php

}
?>

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade show" id="menu1">

            <div class="tab-header text-center">
              <p>Ice Cream Company List</p>
             
            </div>

            <div class="row gy-5">

            <?php

            foreach($cat1 as $allc1)
            {

            ?>
              <div class="col-lg-4 menu-item">
                <a href="{{asset('asset/web/img/menu/menu-item-1.png')}}" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $allc1->cname;   ?></h4>
                <p class="ingredients">
                <form method="post" action="{{url('/')}}/web/product1">
@csrf
<input type="hidden" name="catid" value="<?php echo $allc1->cid; ?>">
<input type="hidden" name="subid" value="<?php echo $allc1->subid; ?>">
<input type="hidden" name="catname" value="<?php echo $allc1->cname; ?>">
       <button type="submit" name="submit" value="submit" class="btn btn-link" style="text-decoration: none; color: #555;"> Show All Products </button>
</form>
                </p>
              </div><!-- Menu Item -->

           <?php

}
?>

            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade show" id="menu2">

            <div class="tab-header text-center">
              <p>Cake Company List</p>
           
            </div>

            <div class="row gy-5">
            <?php
             foreach($cat2 as $allc2)
            {

             ?>

              <div class="col-lg-4 menu-item">
                <a href="{{asset('asset/web/img/menu/menu-item-1.png')}}" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4><?php echo $allc2->cname; ?></h4>
                <p class="ingredients">
                <form method="post" action="{{url('/')}}/web/product1">
@csrf
<input type="hidden" name="catid" value="<?php echo $allc2->cid; ?>">
<input type="hidden" name="subid" value="<?php echo $allc2->subid; ?>">
<input type="hidden" name="catname" value="<?php echo $allc2->cname; ?>">
       <button type="submit" name="submit" value="submit" class="btn btn-link" style="text-decoration: none; color: #555;"> Show All Products </button>
</form>
                </p>
              </div><!-- Menu Item -->
              <?php
                }
              ?>
            </div>
          </div><!-- End Lunch Menu Content -->
        </div>

      </div>
    </section><!-- End Menu Section -->






    <!-- baki -->





    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Events</h2>
          <p>Share <span>Your Moments</span> In Our Restaurant</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">


          <?php
              foreach($threeproduct as $three)
              {
                ?>
              
            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="width: 100%; background-image: url({{url('/')}}/profile/<?php echo $three->pimage; ?>);">
              <h3><?php echo $three->pname; ?></h3>
              <div class="price align-self-start"><?php echo $three->pprice; ?></div>
              <p class="description">
              <?php echo $three->description; ?>
              </p>
            </div><!-- End Event item -->

          <?php  
          }
          ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->


    
    
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php
                foreach($mygallery as $g)
                {

                
            ?>
            <div class="swiper-slide">
              <a class="glightbox" data-gallery="images-gallery" href="{{url('/')}}/profile/<?php echo $g->gimage; ?>">
              <img src="{{url('/')}}/profile/<?php echo $g->gimage; ?>" class="img-fluid" alt="" style="width: 100%; height: 250px;">
            </a>
          </div>
          <?php 
          }
          ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->



  </main><!-- End #main -->




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