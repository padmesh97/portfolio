<?php
$ip = $_SERVER['REMOTE_ADDR'];
$infoFromIp = json_decode(file_get_contents("http://ip-api.com/json/" . $ip), true);
$status = $infoFromIp['status'];
if($status == "success")
{
  date_default_timezone_set("Asia/Kolkata");
  $text = "---".$ip." | ".$infoFromIp['country']." | ".$infoFromIp['city']." | ".$infoFromIp['zip']." | ".date('d-m-Y H:i:s')."---\n";
  $fp = fopen('userlog.txt', 'a+');
  fwrite($fp, $text);
  fclose($fp);
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Padmesh Kunwar" />
  <title>Padmesh Kunwar | Portfolio</title>

  <meta property="og:type" content="article">
  <meta property="og:title" content="Padmesh Kunwar | Portfolio" />
  <meta property="og:image" content="https://www.padmeshkunwar.me/images/dp.png" />
  <meta property="og:url" content="https://www.padmeshkunwar.me/" />
  <meta property="og:site_name" content="padmeshkunwar.me" />
  <meta property="og:description" content="Hi, I am an aspiring Software Developer who is enthusiatic working in latest technologies." />
  <meta name="description" content="Hi I am Padmesh Kunwar currently working as Software engineer in Full Stack and Cloud.">
  <meta name="keywords" content="Full Stack developer,developer,development,job,SDE,SE,search,geek,hire,professional,2020,2021,experience,bachelor,technology,cloud,services,frontend,backend,AWS,GCP,Linux,bash,shell,unix,ubuntu,centos,docker,machine,learning,java,javascript,electronics,communication,b.tech,btech,high aggregate,7 cgpa,8 cgpa,7,8,cgpa,hiring,first class,honours,full time hire">

  <link rel="icon" type="image/x-icon" href="favico.ico">
  <link rel="apple-touch-startup-image" href="favico.ico">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
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
<body class="color-secondary">

  <header>
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar dark-blue-bg">
      <a class="navbar-brand" href="#home" style="margin-left:3%;" data-aos="fade-down" data-aos-once="true" data-aos-delay="1500">
        <img src="images/logo.svg" height="45" alt="Padmesh Kunwar portfolio" >
      </a>
      <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent23">
        <ul class="navbar-nav ml-auto">
          <br/>
          <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23">
            <div id="theme-switch">
              <input type="checkbox" class="checkbox-theme" id="checkbox-theme">
              <label for="checkbox-theme" class="checkbox-label-theme">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <span class="ball-theme"></span>
              </label>
            </div>
          </li>
          <!-- <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="300">
            <a class="nav-link nav-link-workopen" style="padding:0.5rem 1.3rem 0.5rem 1.3rem !important;" href="#">
              #OPEN_TO_WORK
            </a>
          </li> -->
          <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="300">
            <a class="nav-link" href="#about">
              <i class="fas fa-user"></i> About
            </a>
          </li>
          <!-- <li class="nav-item" data-aos="fade-down" data-aos-once="true" data-aos-delay="200">
            <a class="nav-link" href="https://blog.padmeshkunwar.me">
              <i class="fas fa-pen-fancy"></i> Blog
            </a>
          </li> 
          -->
          <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="400">
            <a class="nav-link" href="#skill">
              <i class="fa fa-graduation-cap"></i> Skills
            </a>
          </li>
          <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="500">
            <a class="nav-link" href="#projects">
              <i class="fa fa-folder-open"></i> Projects
            </a>
          </li>
          <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="600">
            <a class="nav-link" href="#contact">
              <i class="fa fa-envelope-open"></i> Contact
            </a>
          </li>
          <br/>
          <li class="nav-item d-md-none" data-aos="fade-down" data-aos-once="true" data-aos-delay="700">
            <div class="col-12 d-md-none text-center" style="font-size: 32px">
              <a class="mx-3 color-coral" href="https://www.github.com/padmesh/97"><i class="fab fa-linkedin"></i></a>
              <a class="mx-3 color-coral" href="https://www.linkedin.com/in/padmesh97"><i class="fab fa-github"></i></a>
              <a class="mx-3 color-coral" href="https://www.facebook.com/padmesh.97"><i class="fab fa-facebook-f"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">



      <div class="col-md-1 d-none d-md-block">
        <div class="left-list" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="1900">
          <ul class="color-primary">
            <li><a href="https://www.github.com/padmesh/97"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.linkedin.com/in/padmesh97"><i class="fab fa-github"></i></a></li>
            <li><a href="https://www.facebook.com/padmesh.97"><i class="fab fa-facebook-f"></i></a></li>
          </ul>
        </div>
      </div>



      <div class="col-12 col-md-10 d-flex flex-column justify-content-center">
        <section id="home">
          <div class="row">
            <div class="col-12 order-md-2 col-md-4 d-flex align-items-center">
              <div class="dp_wrapper" data-aos="fade" data-aos-once="true" data-aos-delay="1500">
                <div class="dp_wrapper_overlay">
                  <img>
                </div>
              </div>
            </div> 
            <div class="col-12 order-md-1 col-md-8">
              <h6 class="color-coral ml-md-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="1000">Hi, I am</h6>
              <h1 class="color-primary ml-md-4" data-aos="fade-up" data-aos-once="true" data-aos-delay="1100">Padmesh Kunwar</h1>
              <!--
              <h1 class="color-secondary" data-aos="fade-up" data-aos-once="true" data-aos-delay="1200">I build things for web.</h1>
              -->
              <div class="row">
                <div class="col-12 col-lg-8 ml-md-4" style="padding-left: 5px">
                  <p class="intro color-primary" data-aos="fade-up" data-aos-once="true" data-aos-delay="1300" data-aos-anchor-placement="top-bottom">
                    A technology enthusiast who likes to work focused on -
                    <ul class="intro_list color-primary">
                      <li data-aos="fade-up" data-aos-once="true" data-aos-delay="1400" data-aos-anchor-placement="top-bottom"> Full Stack Web Development </li>
                      <li data-aos="fade-up" data-aos-once="true" data-aos-delay="1500" data-aos-anchor-placement="top-bottom"> Data Structure and Algorithms</li>
                      <li data-aos="fade-up" data-aos-once="true" data-aos-delay="1600" data-aos-anchor-placement="top-bottom"> Cloud Engineering and DevOps</li>
                    </ul>
                    <br>
                    <a href="resume_download.php" alt="Resume" target="_blank" title="Resume" data-aos="fade-up" data-aos-once="true" data-aos-delay="1800" data-aos-anchor-placement="top-bottom"><div class="btn-p intro-btn-p">Resume</div></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        <section id="articles" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fas fa-pen-fancy color-coral section_title_font"></i>
            <div class="color-primary title">Articles</div>
            <div class="divider"></div>
          </div>
          <div class="article_wrapper blue-bg">
            <!-- Dont delete this,being used for calculating article readTime -->
            <div id="contentMarkdown" style="display:none">
            </div>

            <div class="row justify-content-center" id="blogContainer">

              <div class="col-12 col-lg-4 p-3">
                <div class="ph-item">
                  <div class="ph-col-12">
                      <div class="ph-picture"></div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-2 empty big"></div>
                        <div class="ph-col-8 big"></div>
                        <div class="ph-col-2 empty big"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-4 empty"></div>
                        <div class="ph-col-4"></div>
                        <div class="ph-col-4 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-4 p-3">
                <div class="ph-item">
                  <div class="ph-col-12">
                      <div class="ph-picture"></div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-2 empty big"></div>
                        <div class="ph-col-8 big"></div>
                        <div class="ph-col-2 empty big"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-4 empty"></div>
                        <div class="ph-col-4"></div>
                        <div class="ph-col-4 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-4 p-3">
                <div class="ph-item">
                  <div class="ph-col-12">
                      <div class="ph-picture"></div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-2 empty big"></div>
                        <div class="ph-col-8 big"></div>
                        <div class="ph-col-2 empty big"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-4 empty"></div>
                        <div class="ph-col-4"></div>
                        <div class="ph-col-4 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12 empty"></div>
                      </div>
                      <div class="ph-row">
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                      </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>


        <section id="about" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fas fa-user color-coral section_title_font"></i>
            <div class="color-primary title">About&nbsp;Me</div>
            <div class="divider"></div>
          </div>
          <p class="about_content color-secondary">
            Hello! Welcome to my portfolio,my name is Padmesh, I enjoy building fascinating things which promotes ease in user's everyday lifestyle. My endless love for technologies began back in my school days when I was first introduced to coding with Java in 2012.
          </p>
          <p class="about_content color-secondary">
            Currently I am working as <span class="color-coral"> Software Engineer in a healtcare startup Raxa Information Services Pvt. Ltd.</span> I always love working on challenging projects with optimistic teams and focus on minute details and use cases so that a smooth user delivery and satisfaction can be acheived. Achieving such satisfactory milestones is what always keeps me motivated.
          </p>
          <p class="about_content color-secondary">
            I have done my <span class="color-coral">undergraduation with Honours from JSS Academy of Technical Education, Noida, Uttar Pradesh, India</span> with major in Electronics & Communication Engineering, CGPA - 8.39
          </p>
          <p class="about_content"><strong>My Achievements <span style="text-shadow:0 0 1px white,0 0 3px yellow;">🏆</span>: </strong></p>
          <table class="col-md-10 offset-md-1 table color-secondary" data-aos="fade-up" data-aos-once="true" data-aos-delay="50" data-aos-anchor-placement="center-bottom">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col-5">CERTIFICATE</th>
                <th scope="col">ORGANISATION</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Neural Networks and Deep Learning&nbsp;&nbsp;<a href="images/deep_learning_coursera.jpg" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a>
                </td>
                <td>DeepLearning.AI and Coursera</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jugaadu.in Web Internship&nbsp;&nbsp;<a href="images/jugaadu.pdf" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a>
                </td>
                <td>jugaadu.in</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>JP Morgan Chase & Co. Virtual Internship&nbsp;&nbsp;<a href="images/jpmorgan.png" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a>
                </td>
                <td>InsideSherpa (now Forage)</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Google Dev Group Hackathon-Winner&nbsp;&nbsp;<a href="images/gdg.jpg" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>DSC - JIIT,Noida</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Smart India Hackathon-Finalist&nbsp;&nbsp;<a href="images/sih.jpg" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>MHRD,India</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>IICDC Silver Cerificate-Seminalist&nbsp;&nbsp;<a href="images/ti_semifinalist.png" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>Texas Instrument</td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>AWS Builder Series&nbsp;&nbsp;<a href="images/aws_builder.png" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>AWS (Amazon)</td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>AWSome Day Conference&nbsp;&nbsp;<a href="images/aws_conference.png" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>AWS (Amazon)</td>
              </tr>
              <tr>
                <th scope="row">9</th>
                <td>Learning Bash&nbsp;&nbsp;<a href="images/bash.jpg" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>Udemy</td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td>SEO Training&nbsp;&nbsp;<a href="images/seo.jpg" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>Udemy</td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td>Hands-on Angular&nbsp;&nbsp;<a href="images/angularhackon.png" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a></td>
                <td>Github HACK-ON</td>
              </tr>
            </tbody>
          </table>
        </section>

         <section id="experience" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fas fa-award color-coral section_title_font"></i>
            <div class="color-primary title">Experience</div>
            <div class="divider"></div>
          </div>
          
          <div class="row justify-content-md-center">


            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card blue-bg">
                <div class="card-body">
                  <h4 class="card-title color-primary text-center">Raxa Information Pvt. Ltd., New Delhi</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark color-primary">
                        Software Engineer
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline color-primary">
                        Dec 2020 - Current
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>Java-Spring Boot</li>
                    <li>Hibernate</li>
                    <li>Microservices</li>
                    <li>Docker</li>
                    <li>RESTful</li>
                    <li>AWS</li>
                    <li>Git</li>
                    <li>CentOS</li>
                    <li>Product Management</li>
                  </ul>
                  <p class="color-primary">
                     &bull;&nbsp;Single handedly worked on migration of backend framework to Bahmni open source medical record system platform, which scaled features of PACS,ERP and Lab management.<br/><br/>
                     &bull;&nbsp;Integrated different services with existing architecture and effectively worked along with Bahmni community with further improvement of their product by identifying and resolving existing bugs and flows. Total 5 issues resolved.<br/><br/>
                     &bull;&nbsp;Worked with Java-Spring boot and hibernate for development of REST API's<br/><br/>
                     &bull;&nbsp;Worked on AWS services RDS, ECS, Route53, EC2, Cloudwatch for containerization and deployment.<br/><br/>
                     &bull;&nbsp;Utilised Git for version control and Jira for defect/story tracking.<br/><br/>
                     &bull;&nbsp;Research and developement for implementing new components and increasing performance.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://raxa.com" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


        <section id="internships" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fa fa-certificate color-coral section_title_font"></i>
            <div class="color-primary title">Internships</div>
            <div class="divider"></div>
          </div>
          
          <div class="row justify-content-md-center">


            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary text-center">Jugaadu.in</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        WEB DEVELOPER
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        Aug 2020
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>php</li>
                    <li>CodeIgniter</li>
                    <li>MySQL</li>
                    <li>REST API's</li>
                  </ul>
                  <p class="color-primary">
                     &bull;&nbsp;Worked on building features for news polling app such as explore feed generation,push notiﬁcations.</br>
                     &bull;&nbsp;Developed additional REST API’s for new features and admin dashboard for new news Poll using CodeIgniter.</br>
                     &bull;&nbsp;All the code was reviewed and pushed to production and a positive feedback was obtained by the user base for the new features.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://concordapp.in" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>




        <section id="skill" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fa fa-graduation-cap color-coral section_title_font"></i>
            <div class="color-primary title">Skills</div>
            <div class="divider"></div>
          </div>

          <div class="row d-flex justify-content-center">

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary text-center"><a>Languages & Database</a></h4>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Java J2EE Spring Boot<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Javascript<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;php<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Python<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;HTML,CSS,SASS<!--<div class="color-coral chips">Expert</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;MySQL<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;MongoDB<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;FirebaseDB<!--<div class="color-coral chips">Intermediate</div>--></div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="150">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary text-center"><a>Frameworks & Tools</a></h4>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Angular<!--<div class="color-coral chips">Beginner</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Node.js<!--<div class="color-coral chips">Beginner</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Bootstrap<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Materialize<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Git<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;RESTful<!--<div class="color-coral chips">Beginner</div>--></div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="200">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary text-center"><a>Cloud & OS</a></h4>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;AWS<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Google Cloud<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Microservices<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Docker<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Kubernetes<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Linux(CentOS & Ubuntu)<!--<div class="color-coral chips">Intermediate</div>--></div>
                  <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Windows<!--<div class="color-coral chips">Intermediate</div>--></div>
                </div>
              </div>
            </div>
          </div>

        </section>

        <section id="projects" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fa fa-folder-open color-coral section_title_font"></i>
            <div class="color-primary title">Projects</div>
            <div class="divider"></div>
          </div>
          
          <div class="row justify-content-md-center">


            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Cosmos hub</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        Apr 2020 - May 2020
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Angular</li>
                    <li>Javascript</li>
                    <li>Neumorphic-UI</li>
                    <li>Materialize</li>
                    <li>php</li>
                    <li>MySQL</li>
                  </ul>
                  <p class="color-primary">
                    App feauring content exclusive to astronomy in various fields designed for astronomy learners and explorers.Features include blog publishing, astronomy news updates, usage of NASA openAPI utilities to provide processed relevant content under different categories.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/padmesh97/cosmos" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="https://padmeshkunwar.me/cosmos" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Robotic Prosthetic Hand</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        FINAL YEAR PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>Electromyography (EMG)</li>
                    <li>Python</li>
                    <li>Xbee Communication</li>
                    <li>ANN</li>
                    <li>Arduino</li>
                  </ul>
                  <p class="color-primary">
                    Artificial Neural network based intelligent Robotic arm whose movement can be controlled using amputee brain's Electromyography(EMG) Signals. Demonstrated faster learning rate using unsupervised learning.
                  </p>
                  <div class="card-footer text-center mt-1" style="display: none;">
                    <a href="" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a title="View Demo on Youtube">
                      <i class="fab fa-youtube" onclick="expand('finalYr')"></i>
                    </a>
                    <a href="" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div id="finalYr" style="display: none" class="youtube-video embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wip0EAJcAuE" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>

             <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">My Portfolio</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF - PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Bootstrap</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>php</li>
                  </ul>
                  <p class="color-primary">
                    My online portfolio made with Bootstrap and Material Design using MDB framework.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/padmesh97/portfolio/portfolio_v3.0" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.padmeshkunwar.me" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Foodshala</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        June 2020
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>Bootstrap</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>php</li>
                    <li>MySQL</li>
                  </ul>
                  <p class="color-primary">
                     Online food ordering web application with separate Customer and Restaurant roles. Features include Order place, Order history, Cart, Editing Food Menu. All the features are personalized according to user role.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/padmesh97/foodshala" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="https://padmeshkunwar.me/foodshala" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Docker Chatroom</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF - PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>Docker</li>
                    <li>Linux</li>
                    <li>Bash</li>
                    <li>netcat</li>
                  </ul>
                  <p class="color-primary">
                    A chat service using linux netcat between master container server and slave containers.
                  </p>
                <!--
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/seedjss/certi_module" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a title="View Demo on Youtube">
                      <i class="fab fa-youtube" onclick="expand('certi')"></i>
                    </a>
                    <a href="https://www.padmeshkunwar.me/certi_module" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div id="certi" style="display: none" class="youtube-video embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gHXAqZcRH9s" allowfullscreen></iframe>
                  </div>
                -->
                </div>
              </div>
            </div>

            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Cerificate Module</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF - PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>php</li>
                    <li>phpMailer</li>
                  </ul>
                  <p class="color-primary">
                    Certificate generator with send via e-mail functionality module for technical workshops held in our college society "Electrino".
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/seedjss/certi_module" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a title="View Demo on Youtube">
                      <i class="fab fa-youtube" onclick="expand('certi')"></i>
                    </a>
                    <a href="https://www.padmeshkunwar.me/certi_module" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div id="certi" style="display: none" class="youtube-video embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gHXAqZcRH9s" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>

            
            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Electrino Website</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        Web Team (Electrino)
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        Jun 2019 - Sep 2019
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Bootstrap</li>
                    <li>Materialize</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>AWS EC2</li>
                    <li>AWS S3</li>
                  </ul>
                  <p class="color-primary">
                    Official website of college society "Electrino" developed by the web team with me working on Forum, responsiveness and deployment on AWS.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://www.github.com/seedjss/website" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="https://seedjss.netlify.app/" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>



            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Electrino Forum.js</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF - PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Materialize</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>Firebase DB</li>
                  </ul>
                  <p class="color-primary">
                    Forum for student interaction and discussion, based on material design.
                    All the data storage and retrieval is handled with help of javascript and Firebase realtime DB.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://github.com/seedjss/website/blob/master/forum/forum.js" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="https://www.padmeshkunwar.me/seed_forum" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Smart Home Entrance Security System</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF - PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Bootstrap</li>
                    <li>Javascript</li>
                    <li>Jquery</li>
                    <li>php</li>
                    <li>MySQL</li>
                    <li>Image Recognition</li>
                    <li>cURL</li>
                    <li>IFTTT Webhook</li>
                  </ul>
                  <p class="color-primary">
                    A smart home entrance system for access to visitors at door. Recognition done via camera module and matching it to the known peoples of house in database. Information log retrival done via google assistant webhook.
                  </p>
                  <div class="card-footer text-center mt-1" style="display: none;">
                    <a href="" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="" target="_blank" title="Visit">
                      <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>


            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Smart Railway Announcement</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        Smart India Hackathon - Finalist
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        Dec 2018 - Jul 2019
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>Firebase DB</li>
                    <li>Python</li>
                    <li>Linux-SSH</li>
                    <li>RPi 3</li>
                    <li>GSM</li>
                    <li>Google TTS</li>
                  </ul>
                  <p class="color-primary">
                     Developed IoT based e2e solution for railway station announcement system using FM transmission, Webapp and SMS services in realtime. Our idea was titled to be most innovative by Ministry of Railways.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://github.com/padmesh97/sih2019" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>


            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body blue-bg">
                  <h4 class="card-title color-primary">Next Smart Junk</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        IICDC by Texas Instrument and DST - Semifinalist
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                        Aug 2018 - May 2019
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Javascript</li>
                    <li>php</li>
                    <li>Firebase DB</li>
                    <li>Google Maps API</li>
                    <li>TI MSP430</li>
                    <li>Sensors</li>
                  </ul>
                  <p class="color-primary">
                    Build real time IoT based Smart Waste pickup system with driver portal and smart dustbin, both working coherently. 
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://github.com/padmesh97/iicdc2018" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                    <a title="View Demo on Youtube">
                      <i class="fab fa-youtube" onclick="expand('ti')"></i>
                    </a>
                  </div>
                  <div id="ti" style="display: none" class="youtube-video embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wip0EAJcAuE" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>

            <!--
            <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title color-primary">Musical bot</h4>
                  <div class="row" style="margin-bottom: 6px">
                    <div class="col-12 col-md-8">
                      <div class="remark">
                        SELF PROJECT
                      </div>
                    </div>
                    <div class="col-12 col-md-4">
                      <div class="timeline">
                      </div>
                    </div>
                  </div>
                  <ul class="stack color-coral">
                    <li>Python</li>
                    <li>numpy</li>
                    <li>scipy</li>
                    <li>matplotlib</li>
                    <li>audio processing</li>
                  </ul>
                  <p class="color-primary">
                     A python project for notes extraction and identification in monophonic sounds using window techniques of audio processing.
                  </p>
                  <div class="card-footer text-center mt-1">
                    <a href="https://github.com/padmesh97/eyantra2018" target="_blank" title="View github source">
                      <i class="fab fa-github"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          -->


          </div>
        </section>

        <section id="contact" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
          <div class="section_title_wrapper d-flex flex-row align-items-center">
            <i class="fa fa-envelope-open color-coral section_title_font"></i>
            <div class="color-primary title">Contact</div>
            <div class="divider"></div>
          </div>

          <h1 class="color-primary">Get in Touch</h1>
          <h4 class="color-secondary"><span class="color-coral">Curently open to</span> to roles related to Full Stack development, Software engineering and DevOps. Please feel free to drop a hello.</h4>
          <a href="mailto:kunwarpadmesh@yahoo.com" target="_blank" class="d-flex justify-content-center">
            <button class="btn-p">Drop Hello</button>
          </a>
          <div class="row mt-5">
            <div class="col-12 d-md-none text-center" style="font-size: 32px">
              <a class="mx-3 color-coral" href="https://www.github.com/padmesh/97"><i class="fab fa-linkedin"></i></a>
              <a class="mx-3 color-coral" href="https://www.linkedin.com/in/padmesh97"><i class="fab fa-github"></i></a>
              <a class="mx-3 color-coral" href="https://www.facebook.com/padmesh.97"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
        </section>

        <footer class="color-secondary">
          Designed and Built by Padmesh Kunwar | 2021
        </footer>

      </div>


      <div class="col-md-1 d-none d-md-block">
        <div class="right-list" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="1900">
          <div class="wrapper">
            <a href="mailto:kunwarpadmesh@yahoo.com">
              kunwarpadmesh@yahoo.com
            </a>
          </div>
        </div>
      </div>


    </div>
  </div>


  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Hashnode article fetch JavaScript -->
  <script type="text/javascript" src="js/hashnode_fetch.js"></script>
  <!-- Readibility.js jquery plugin -->
  <script type="text/javascript" src="js/readability.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
     var ROOT_URL="https://padmeshkunwar.me/";
     var ROOT_URL_BLOG="https://blog.padmeshkunwar.me/";

    $(document).ready(function() {

      $('.second-button').on('click', function () {
          $('.animated-icon2').toggleClass('open');
      });
      $('.nav-item').on('click', function () {
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

    var toggle=true;
    $('#theme-switch').on('change', function() {
      $('body').toggleClass("dark-theme");
    });

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
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript">
    AOS.init();
  </script>
  
</body>
</html>
