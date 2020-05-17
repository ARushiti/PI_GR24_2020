<?php 
  include('config/db_connect.php');
//write query for all trips
$sql = 'SELECT country, cities, id FROM trips ORDER BY created_at';

// get the result set (set of rows)
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $trips = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free the $result from memory (good practise)
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Go Trip</title>
</head>
<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8">
                            <div class="header-info-left">
                                <ul>                          
                                    <li>needhelp@gotrip.com</li>
                                    <li>+377 45 *** ***</li>
                                    <li>Pristina, Kosovo</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-info-right f-right">
                                <ul class="header-social">   
                                    <li><a href="https://twitter.com/login"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                   <li> <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                  <a href="indexi.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>               
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="indexi.php">Home</a></li>
                                            <li><a href="aboutus.php">About US</a></li>
                                            <li><a href="blog.php">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="elements.html">Best of</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="login1.php">Log In</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="hero__caption">
                                    <h1>Find your <span>Next tour!</span> </h1>
                                    <p>Where would you like to go?</p>
                                </div>
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
	    <title>Latest Tours</title>
	    <style type="text/css">
      .brand{
        background: #014b85 !important;
      }
    .brand-text{
        color: #014b85!important;
    }
    form{
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
    }
    .parisi{
        width: 400px;
        margin: 10px;
        display: block;
        position: relative;
    }
  </style>
	    <h4 class="center grey-text">Latest Trips!</h4>

    <div class="container">
        <div class="row">

             <?php foreach($trips as $trip): ?>

                <div class="col s6 m4">
                    <div class="card z-depth-0">
                        <img src="assets/img/hero/Paris.jpg" class="parisi"
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($trip['country']); ?></h6>
                            <ul class="grey-text">
                                <?php foreach(explode(',', $trip['cities']) as $cit): ?>
                                    <li><?php echo htmlspecialchars($cit); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action center">
                            <a class="brand-text" href="detalis.php?id=<?php echo $trip['id']?>">more info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <body class="grey lighten-4">
    <nav class="white z-depth-0">
    <div class="container">
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="add.php" class="btn border-btn">Add a Trip</a></li>
      </ul>
    </div>
  </nav>
            
        </div>
    </div>
        <!-- Our Services Start -->
        <div class="our-services servic-padding">
            <div class="container">
                <div class="row d-flex justify-contnet-center">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap">
                                <h5>8000+ Our Local<br>Guides</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-pay"></span>
                            </div>
                            <div class="services-cap">
                                <h5>100% Trusted Tour<br>Agency</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-experience"></span>
                            </div>
                            <div class="services-cap">
                                <h5>28+ Years of Travel<br>Experience</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-good"></span>
                            </div>
                            <div class="services-cap">
                                <h5>98% Our Travelers<br>are Happy</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Our Services End -->
        <!-- Video Start Arera -->
        <div class="video-area video-bg pt-200 pb-200"  data-background="assets/img/service/video-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video-caption text-center">
                            <div class="video-icon">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=iYN5SsZ7WsY" tabindex="0"><i class="fas fa-play"></i></a>
                            </div>
                            <p class="pera1">Love where you're going in the perfect time</p>
                            <p class="pera2">Go Trip is a World Leading Online</p>
                            <p class="pera3"> Tour Booking Platform</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Start End -->
        <!-- Support Company Start-->
        <div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img mb-50">
                            <img src="assets/img/service/support-img.jpg" alt="">
                            <div class="support-img-cap">
                                <span>Since 1992</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>About Our Company</span>
                                <h2>We are Go Trip <br>Travel Company</h2>
                            </div>
                            <div class="support-caption">
                                <p>Go Trip agents will take the time to understand your unique travel interests and aspirations, until we "get you." We then use our education, first-hand travel experience and relationships with airlines, car, hotel, resort, tour and cruise supplier partners to make sure you enjoy an exceptional personalized travel experience that will create memories to last a lifetime.</p>
                                <div class="select-suport-items">
                                    <label class="single-items"> Whether you plan 
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="single-items">to use it out of the box 
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="single-items">or fine-tune it further
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="single-items"> the outcome will be remarkable
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <a href="aboutus.php" class="btn border-btn">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- Testimonial Start -->
        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding" data-background="assets/img/testmonial/testimonial_bg.jpg">
            <div class="container ">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-11 col-lg-11 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <img src="assets/img/icon/testimonial.png" alt="">
                                        <p>Live with no excuses and travel with no regrets.</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/img/testmonial/Homepage_testi.png" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Rushiti</span>
                                            <p>Co Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <img src="assets/img/icon/testimonial.png" alt="">
                                        <p>Live with no excuses and travel with no regrets</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/img/testmonial/Homepage_testi.png" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Rushiti</span>
                                            <p>Co Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </main>

	<?php include('header.php'); ?>
	<?php include('footer.php'); ?>
	
</body>
</html>
