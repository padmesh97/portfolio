<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Padmesh Kunwar" />
  <title>Padmesh Kunwar | ERROR!</title>
  <base href="https://www.padmeshkunwar.me">

  <meta property="og:type" content="article">
  <meta property="og:title" content="Padmesh Kunwar | Personal website" />
  <meta property="og:image" content="https://www.padmeshkunwar.me/images/dp.png" />
  <meta property="og:url" content="https://www.padmeshkunwar.me/" />
  <meta property="og:site_name" content="padmeshkunwar.me" />
  <meta property="og:description" content="Hi, I am an aspiring Software Developer who is enthusiatic working in latest technologies." />
  <link rel="icon" type="image/x-icon" href="favico.ico">
  <link rel="apple-touch-startup-image" href="favico.ico">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <meta name="description" content="Hi I am Padmesh Kunwar,Noida based fresher looking for opportunities in Software development.">
  <meta name="keywords" content="Full Stack developer,developer,geek,IoT,hire,Hire,fresher,2020,bachelor,technology,cloud,services,frontend,backend,raspberry pi,pi,Rpi,AWS,GCP,batch 2020,electronics,communication,b.tech,btech,noida,delhi,ncr,delhi ncr,gautam buddha nagar,high aggregate,first class,honours,final year,intern hire,full time hire">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122721080-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122721080-2');
  </script>

  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#0a192f">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#0a192f">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#0a192f">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet"> 
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="color-secondary" style="overflow:hidden">

  <header>
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar dark-blue-bg">
      <a class="navbar-brand" href="#home" style="margin-left:3%;" data-aos="fade-down" data-aos-once="true" data-aos-delay="50">
        <img src="images/logo.svg" height="45" alt="Padmesh Kunwar portfolio" >
      </a>
      <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent23">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" data-aos="fade-down" data-aos-once="true" data-aos-delay="50">
            <a class="nav-link" href="index.php">
              <i class="fa fa-info-circle"></i> Home
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">



      <div class="col-md-1 d-none d-md-block">
        <div class="left-list" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="100">
          <ul class="color-primary">
            <li><a href="https://www.github.com/padmesh/97"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.linkedin.com/in/padmesh97"><i class="fab fa-github"></i></a></li>
            <li><a href="https://www.facebook.com/padmesh.97"><i class="fab fa-facebook-f"></i></a></li>
          </ul>
        </div>
      </div>



      <div class="col-12 col-md-10">
        <h1 style="margin-top: 13.5rem" class="color-primary" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">Server Unavailable.Please Retry.<br>Error - 503
        <?php
        if(isset($_GET['e']))
          echo $_GET['e']
        ?>
        </h1><br>
        <center>
          <a href="index.php" alt="Home" target="_blank" title="Home" data-aos="fade-up" data-aos-once="true" data-aos-delay="200">
            <div class="btn-p intro-btn-p">Home</div>
          </a>
        </center>
      </div>


      <div class="col-md-1 d-none d-md-block">
        <div class="right-list" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="100">
          <div class="wrapper">
            <a class="color-primary" href="mailto:kunwarpadmesh@yahoo.com">
              kunwarpadmesh@yahoo.com
            </a>
          </div>
        </div>
      </div>


    </div>
    <footer class="color-secondary" style="position: absolute;bottom: 0;margin-left: -3rem">
      Designed and Built by Padmesh Kunwar
      <br>
      &copy;&nbsp;2020
    </footer>
  </div>


  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
    $( document ).ready(function() {

      $('.second-button').on('click', function () {
          $('.animated-icon2').toggleClass('open');
      });

      var selector = '.nav-link';
      $(selector).on('click', function(){
          $(selector).removeClass('active');
          $(this).addClass('active');
      });

    });
    function expand(a)
    {
      $("#"+a).animate({
        height:'toggle'
      });
    }
  </script>
  <script>
    $(document).ready(function(){
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        } 
      });
    });
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript">
    AOS.init();
  </script>
  
</body>
</html>
