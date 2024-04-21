<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Padmesh Kunwar" />
  <title>Maintenance</title>

  <meta property="og:type" content="article">
  <meta property="og:title" content="Padmesh Kunwar | Personal website" />
  <meta property="og:image" content="https://www.padmeshkunwar.me/images/dp.png" />
  <meta property="og:url" content="https://www.padmeshkunwar.me/" />
  <meta property="og:site_name" content="padmeshkunwar.me" />
  <meta property="og:description" content="Hi, I am an aspiring Software Developer who is enthusiatic working in latest technologies." />
  <link rel="icon" type="image/x-icon" href="favico.ico">
  <link rel="apple-touch-startup-image" href="favico.ico">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
  <style type="text/css">
    #st-anim-maintenance {
    width: 192px;
    height: 192px;
    margin: 128px auto;
    margin-bottom: 2rem;
    position: relative;
  }

  #st-anim-maintenance__shape {
    left: 8px;
    top: 3px;
  }

  #st-anim-maintenance__gear-l {
    position: absolute;
    left: 42px;
    top: 33px;
    
    animation: anim-spin-gear-l linear 6s;
    animation-iteration-count: infinite;
    transform-origin: 50% 50%;
  }

  @keyframes anim-spin-gear-l {
    0%    { transform:  rotate(0deg) ; }
    100%  { transform:  rotate(-360deg) ; }
  }

  #st-anim-maintenance__gear-s {
    position: absolute;
    left: 98px;
    top: 80px;
    
    animation: anim-spin-gear-s linear 4.0s;
    animation-iteration-count: infinite;
    transform-origin: 50% 50%;
  }

  @keyframes anim-spin-gear-s {
    0%    { transform:  rotate(0deg) ; }
    100%  { transform:  rotate(360deg) ; }
  }
  </style>
</head>
<body class="color-secondary" style="overflow:hidden">

  <header>
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar dark-blue-bg">
      <a class="navbar-brand" href="#" style="margin-left:3%;" data-aos="fade-down" data-aos-once="true" data-aos-delay="50">
        <img src="images/logo.svg" height="45" alt="Padmesh Kunwar portfolio" >
      </a>
      <!-- <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
      </button> -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent23">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" data-aos="fade-down" data-aos-once="true" data-aos-delay="50">
            <!-- <a class="nav-link" href="index.php">
              <i class="fa fa-info-circle"></i> Home
            </a> -->
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
        <center>
          <div id="st-anim-maintenance">
            <svg id="st-anim-maintenance__shape" width="176" height="188" xmlns="http://www.w3.org/2000/svg"><path d="M175.077 93.71c-6.255 95.573-79.776 93.788-85.377 93.788-1.95 0-2.728-2.261 0-3.896 9.75-5.844 17.55-13.635 19.5-27.27 0-.975 0-1.948-1.95-1.948H71.88c-18.08 0-29.789-2.894-39.958-8.326-10.168-5.433-18.15-13.405-23.587-23.562C2.896 112.338 0 100.64 0 82.58V72.303c0-18.06 2.896-29.757 8.335-39.915 5.438-10.158 13.419-18.13 23.587-23.562C42.092 3.393 53.8.5 71.881.5h31.738c18.08 0 29.79 2.893 39.959 8.326 10.168 5.432 18.15 13.404 23.587 23.562 5.439 10.158 8.335 21.854 8.335 39.915V82.58c0 4.006-.142 7.698-.423 11.13z" fill="#1b365e" fill-rule="evenodd"/></svg>

            <svg id="st-anim-maintenance__gear-l" width="74" height="74" xmlns="http://www.w3.org/2000/svg"><path d="M30.87 73.078a36.582 36.582 0 0 1-6.679-1.83l.642-7.668a29.467 29.467 0 0 1-4.895-2.87l-6.277 4.38a36.906 36.906 0 0 1-4.901-4.95l4.372-6.313a29.215 29.215 0 0 1-2.79-4.889l-7.619.642a36.261 36.261 0 0 1-1.765-6.773l6.947-3.281a29.527 29.527 0 0 1 .047-5.539L1.04 30.723a36.254 36.254 0 0 1 1.875-6.796l7.66.645a29.24 29.24 0 0 1 2.742-4.642l-4.36-6.295a36.91 36.91 0 0 1 5.048-4.993l6.305 4.397a29.46 29.46 0 0 1 4.566-2.625l-.642-7.664A36.586 36.586 0 0 1 31.097.897l3.26 6.953a29.965 29.965 0 0 1 5.286-.044L42.92.819a36.6 36.6 0 0 1 6.842 1.744l-.638 7.625c1.692.742 3.3 1.638 4.807 2.67l6.324-4.411a36.914 36.914 0 0 1 5.003 4.848l-4.342 6.27a29.254 29.254 0 0 1 2.99 4.965l7.665-.646a36.251 36.251 0 0 1 1.85 6.611l-6.898 3.258a29.464 29.464 0 0 1 .052 6.01l6.93 3.272a36.258 36.258 0 0 1-1.743 6.588l-7.623-.642a29.229 29.229 0 0 1-3.036 5.215l4.354 6.287a36.91 36.91 0 0 1-4.855 4.803l-6.296-4.391a29.454 29.454 0 0 1-5.14 2.912l.638 7.629a36.596 36.596 0 0 1-6.656 1.723l-3.268-6.97a29.989 29.989 0 0 1-5.757-.048l-3.252 6.937zm6.38-25.346c5.902 0 10.686-4.802 10.686-10.725S43.152 26.282 37.25 26.282s-10.686 4.802-10.686 10.725 4.784 10.725 10.686 10.725z" fill="#FFF" fill-rule="evenodd"/></svg>

            <svg id="st-anim-maintenance__gear-s" width="52" height="52" xmlns="http://www.w3.org/2000/svg"><path d="M26.574 51.12a25.828 25.828 0 0 1-6.987-.806l-.773-5.561a20.566 20.566 0 0 1-5.335-2.949l-5.16 2.291a24.947 24.947 0 0 1-4.368-5.503l3.426-4.504a20.085 20.085 0 0 1-1.59-5.725L.53 26.373a24.97 24.97 0 0 1 .895-7.045l5.638-.799a20.58 20.58 0 0 1 2.849-4.99L7.623 8.42a25.83 25.83 0 0 1 5.664-4.467l4.513 3.37a21.177 21.177 0 0 1 5.52-1.63L25.375.406a25.832 25.832 0 0 1 7.11.683l.766 5.51a20.59 20.59 0 0 1 5.397 2.825l5.21-2.313a24.978 24.978 0 0 1 4.412 5.337L44.884 16.9a20.047 20.047 0 0 1 1.822 6.166l5.266 1.994a24.956 24.956 0 0 1-.808 6.798l-5.597.793a20.577 20.577 0 0 1-3.193 5.595l2.272 5.085a25.83 25.83 0 0 1-5.498 4.266l-4.52-3.376a21.183 21.183 0 0 1-6.023 1.676l-2.031 5.224zm1.722-18.234c3.975-1.14 6.282-5.256 5.153-9.195-1.13-3.939-5.268-6.208-9.243-5.068-3.975 1.14-6.282 5.257-5.152 9.196 1.13 3.938 5.267 6.207 9.242 5.067z" fill="#FFF" fill-rule="evenodd"/></svg>
          </div>
          <h3  class="color-primary" data-aos="fade-up" data-aos-once="true" data-aos-delay="100">Currently Under Maintenance. Please check back later.
          </h3>
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
    <footer class="color-secondary" style="position: absolute;bottom: 0;margin-left: -0.5rem">
      Designed and Built by Padmesh Kunwar
      <br>
      &copy;&nbsp;2021
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
