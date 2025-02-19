<?php
    $ip         = $_SERVER['REMOTE_ADDR'];
    $infoFromIp = json_decode(file_get_contents("http://ip-api.com/json/" . $ip), true);
    $status     = $infoFromIp['status'];
    if ($status == "success") {
        date_default_timezone_set("Asia/Kolkata");
        $text = "---" . $ip . " | " . $infoFromIp['country'] . " | " . $infoFromIp['city'] . " | " . $infoFromIp['zip'] . " | " . date('d-m-Y H:i:s') . "---\n";
        $fp   = fopen('userlog.txt', 'a+');
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
  <title>Padmesh Kunwar - Developer & Tech Evangelist</title>

  <meta property="og:title" content="Padmesh Kunwar - Full Stack Developer, DevOps Engineer & Tech Evangelist" />
  <meta property="og:image" content="https://www.padmeshkunwar.me/images/dp_new.jpeg" />
  <meta property="og:url" content="https://www.padmeshkunwar.me/" />
  <meta property="og:site_name" content="padmeshkunwar.me" />
  <meta property="og:description" content="Discover my work in web development, AI, and cloud engineering." />
  <meta name="description" content="Discover my work in web development, AI, and cloud engineering.">

  <link rel="icon" type="image/x-icon" href="favico.ico">
  <link rel="apple-touch-startup-image" href="favico.ico">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
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
  <!-- loader robot  -->
  <link rel="stylesheet" href="css/loader_robot.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.0.5/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/three@0.124.0/build/three.js"></script>
</head>
<body onload="loadFunction()" class="color-secondary">
  <div id="aura"></div>
  <div class="overlay polka" id="polka" style="display: none;"></div>
  <div id="loader-bot" class="robot-section" style="display: block;">
    <div id="webgl"></div>
    <div id="bg-box">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
        <path fill="#34496a" d="M0 0v600h800V0zm405.6 458.4C217 458.4 64.1 360.6 64.1 240S217 21.5 405.6 21.5 747.3 119.3 747.3 240s-153 218.4-341.6 218.4z" />
      </svg>
    </div>
    <div class="svg-box">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600">
        <defs />
        <defs>
          <clipPath id="clip-path">
            <rect id="graph-line-mask" width="105.2" height="66.7" x="439.5" y="186.6" fill="none" />
          </clipPath>
          <clipPath id="clip-path-2">
            <path id="body-mask" fill="none" d="M490.4 368.3c0 63.7-38 140-84.7 140s-84.8-76.3-84.8-140 38-90.6 84.8-90.6 84.7 26.9 84.7 90.6z" />
          </clipPath>
        </defs>
        <g id="Ship">

          <g id="mid-display">
            <rect width="320.3" height="207" x="248.8" y="116.3" fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" opacity=".8" rx="18.4" />
            <g id="graph-btm">
              <path id="graph-left" fill="#0ff" d="M439.7 292.1s4.5-19.4 8.7-19c3.6.3 4.6 9.2 7.3 9 3.4-.2 4-14 7.3-14.3 3-.2 4.7 10 8.3 10 4 0 5.1-12.6 8.8-12.8 4.1-.2 7.2 27.1 7.2 27.1z" />
              <path id="graph-morph1" fill="none" d="M439.7 292.1s2.2-10.8 6.5-10.4c3.5.3 8.3-18.9 11-19 3.4-.3 5.6 9 9 8.7 3-.3 3.5-3.2 7-3.2 4 0 5.9 10.6 9.5 10.4 4.2-.2 4.7 13.5 4.7 13.5z" />
              <path id="graph-right" fill="#34496a" d="M502.6 292.1s4.5-19.4 8.8-19c3.5.3 4.6 9.2 7.3 9 3.4-.2 3.9-14 7.3-14.3 3-.2 4.7 10 8.3 10 4 0 5-12.6 8.7-12.8 4.2-.2 7.3 27.1 7.3 27.1z" />
              <path id="graph-morph2" fill="none" d="M502.6 292.1s4.5-9.8 8.8-9.4c3.5.3 4.6-6.8 7.3-7 3.4-.2 3.9 6.6 7.3 6.4 3-.3 4.7-17.9 8.3-17.9 4 0 5 16.5 8.7 16.3 4.2-.2 7.3 11.6 7.3 11.6z" />
            </g>
            <g id="planet">
              <circle id="planet-base" cx="332.2" cy="207.8" r="37.3" fill="#34496a" />
              <ellipse id="planet-circle" cx="331.5" cy="207.8" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" rx="61.8" ry="12.7" />
              <path id="planet-top" fill="#34496a" d="M294.9 207.8a37.3 37.3 0 0174.6 0z" />
            </g>
            <g class="graph-circle-lb" id="graph-cir-left">
              <circle cx="290.4" cy="287.5" r="20.8" fill="#34496a" />
              <path fill="#0ff" d="M290.4 287.5l5.3-20.1a20.8 20.8 0 0115.5 20z" />
            </g>
            <g class="graph-circle-lb" id="graph-cir-mid">
              <circle cx="345.4" cy="287.5" r="20.8" fill="#34496a" />
              <path fill="#0ff" d="M345.4 287.5l5.2-20.1a20.8 20.8 0 0115.5 20z" />
            </g>
            <g id="graph-cir">
              <circle cx="396.4" cy="292.1" r="16.4" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
              <circle cx="396.4" cy="292.1" r="20.8" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
              <circle cx="396.4" cy="292.1" r="11.6" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="2" />
              <circle id="graph-cir-1" cx="408" cy="292.1" r="2.3" fill="#0ff" />
              <circle id="graph-cir-2" cx="396.4" cy="275.7" r="2.3" fill="#0ff" />
              <circle id="graph-cir-3" cx="417.2" cy="292.1" r="2.3" fill="#0ff" />
              <circle id="graph-cir-mid-2" cx="396.4" cy="292.1" r="2.3" fill="#0ff" data-name="graph-cir-mid" />
            </g>
            <g id="graph-big" clip-path="url(#clip-path)">
              <path id="graph-line" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M439.7 206.4c26.3 0 26.3 34.2 52.6 34.2s26.3-34.2 52.6-34.2 26.3 34.2 52.6 34.2 26.3-34.2 52.6-34.2" />
            </g>
            <circle cx="275.7" cy="139.7" r="11.8" fill="#34496a" />
            <circle id="left-top-circle" cx="275.7" cy="139.7" r="11.8" fill="#0ff" />
            <line x1="300.8" x2="387.1" y1="134.3" y2="134.9" fill="none" stroke="#34496a" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" />
            <line x1="300.8" x2="338.5" y1="143.7" y2="143.9" fill="none" stroke="#34496a" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" />
            <circle cx="448.1" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
            <path class="circles-top" id="circle-l" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M448 148.2a13.3 13.3 0 11-13.2 13.3 13.3 13.3 0 0113.3-13.3" />
            <circle cx="491.2" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
            <path class="circles-top" id="circle-m" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M491.2 148.2a13.3 13.3 0 11-13.3 13.3 13.3 13.3 0 0113.3-13.3" />
            <circle cx="534.4" cy="161.4" r="13.3" fill="none" stroke="#34496a" stroke-miterlimit="10" stroke-width="5" />
            <path class="circles-top" id="circle-r" fill="none" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M534.4 148.2a13.3 13.3 0 11-13.3 13.3 13.3 13.3 0 0113.3-13.3" />
          </g>
          <g id="btm-display">
            <g id="right-display">
              <g id="right-display-display">
                <path fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M654.7 461H508.6c-10.5 0-15.8-8.5-12-19l26.2-72a29.9 29.9 0 0125.8-18.9h146c10.5 0 15.8 8.5 12 19l-26.2 72a29.9 29.9 0 01-25.7 18.8z" opacity=".8" />
                <g id="bars">
                  <polygon id="bar-3-btm" fill="#34496a" points="656.9 441.2 642.4 441.2 667.6 371.7 682.2 371.7 656.9 441.2" />
                  <polygon id="bar-3-top" fill="#0ff" points="656.9 441.2 642.4 441.2 653 412 667.5 412 656.9 441.2" />
                  <polygon id="bar-2-btm" fill="#34496a" points="633.7 441.2 619.2 441.2 644.5 371.7 659 371.7 633.7 441.2" />
                  <polygon id="bar-2-top" fill="#0ff" points="633.7 441.2 619.2 441.2 636 395.1 650.5 395.1 633.7 441.2" />
                  <polygon id="bar-1-btm" fill="#34496a" points="610.6 441.2 596.1 441.2 621.4 371.7 635.9 371.7 610.6 441.2" />
                  <polygon id="bar-1-top" fill="#0ff" points="610.6 441.2 596.1 441.2 604 419.5 618.5 419.5 610.6 441.2" />
                </g>
                <g id="btns" fill="#0ff">
                  <ellipse cx="546.8" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 546.8 379.3)" />
                  <ellipse cx="562.7" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 562.7 379.3)" />
                  <ellipse cx="578.6" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 578.6 379.3)" />
                  <ellipse cx="594.5" cy="379.3" rx="6.5" ry="4.6" transform="rotate(-39.8 594.5 379.3)" />
                  <ellipse cx="540.6" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 540.6 396.3)" />
                  <ellipse cx="556.5" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 556.5 396.3)" />
                  <ellipse cx="572.4" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 572.4 396.3)" />
                  <ellipse cx="588.3" cy="396.3" rx="6.5" ry="4.6" transform="rotate(-39.8 588.4 396.3)" />
                  <ellipse cx="534.4" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 534.4 413.3)" />
                  <ellipse cx="550.3" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 550.3 413.3)" />
                  <ellipse cx="566.2" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 566.2 413.3)" />
                  <ellipse cx="582.1" cy="413.3" rx="6.5" ry="4.6" transform="rotate(-39.8 582.2 413.3)" />
                  <ellipse cx="528.2" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 528.2 430.3)" />
                  <ellipse cx="544.1" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 544.1 430.3)" />
                  <ellipse cx="560" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.6 562.3 429.7)" />
                  <ellipse cx="575.9" cy="430.3" rx="6.5" ry="4.6" transform="rotate(-39.8 576 430.3)" />
                </g>
              </g>
              <ellipse id="right-display-shadow" cx="593.3" cy="508.4" fill="#1e3855" rx="74" ry="10.9" />
            </g>
            <g id="left-display">
              <g id="left-display-display">
                <path fill="#282e39" stroke="#0ff" stroke-miterlimit="10" stroke-width="5" d="M299 461H153c-10.4 0-22-8.5-25.8-19L101 370c-3.8-10.4 1.6-18.9 12-18.9h146c10.5 0 22 8.5 25.9 18.9l26.2 72c3.8 10.4-1.6 19-12 19z" opacity=".8" />
                <polygon fill="#0ff" points="153.1 433.3 155.7 440.3 158.2 447.3 153.6 443.8 148.9 440.3 151 436.8 153.1 433.3" />
                <polygon fill="#0ff" points="143 433.3 146.4 433.3 151.9 448.4 148.5 448.4 143 433.3" />
                <polygon fill="#0ff" points="193.8 448.4 191.3 441.4 188.7 434.4 193.4 437.9 198 441.4 195.9 444.9 193.8 448.4" />
                <polygon fill="#0ff" points="203.9 448.4 200.6 448.4 195.1 433.3 198.4 433.3 203.9 448.4" />
                <polygon fill="#0ff" points="164.4 433.3 167.8 433.3 173.3 448.4 169.9 448.4 164.4 433.3" />
                <polygon fill="#0ff" points="174 433.3 177.4 433.3 182.9 448.4 179.5 448.4 174 433.3" />
                <ellipse cx="199" cy="377.7" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 199 377.7)" />
                <polygon fill="#0ff" points="198.2 380.9 197 377.7 195.9 374.6 199.2 376.1 202.6 377.7 200.4 379.3 198.2 380.9" />
                <line x1="217.3" x2="267.5" y1="377.7" y2="377.7" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
                <ellipse cx="206.2" cy="397.6" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 206.2 397.6)" />
                <polygon fill="#0ff" points="205.4 400.7 204.2 397.6 203.1 394.4 206.4 396 209.8 397.6 207.6 399.2 205.4 400.7" />
                <line x1="224.5" x2="274.8" y1="397.6" y2="397.6" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
                <ellipse cx="213.5" cy="417.5" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 213.4 417.4)" />
                <polygon fill="#0ff" points="212.6 420.6 211.5 417.5 210.3 414.3 213.7 415.9 217 417.5 214.8 419 212.6 420.6" />
                <line x1="231.8" x2="282" y1="417.5" y2="417.5" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
                <ellipse cx="220.7" cy="437.3" fill="#34496a" rx="5.4" ry="7.7" transform="rotate(-50.2 220.7 437.3)" />
                <polygon fill="#0ff" points="219.8 440.5 218.7 437.3 217.6 434.2 220.9 435.8 224.3 437.3 222.1 438.9 219.8 440.5" />
                <line x1="239" x2="289.2" y1="437.3" y2="437.3" fill="#282e39" stroke="#0ff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="5" opacity=".8" />
                <path fill="#34496a" d="M190.5 424.4h-46a7.4 7.4 0 01-6.5-4.7l-15.8-43.5c-1-2.6.4-4.7 3-4.7h46a7.4 7.4 0 016.5 4.7l15.8 43.5c1 2.6-.4 4.7-3 4.7z" />
                <ellipse cx="157.8" cy="398" fill="#282e39" rx="17.5" ry="25.1" transform="rotate(-50.2 157.8 398)" />
                <ellipse cx="157.8" cy="398" fill="#282e39" rx="5.1" ry="7.3" transform="rotate(-50.2 157.8 398)" />
                <path fill="#0ff" d="M159.8 405a10 10 0 01-8.8-6.4 5.8 5.8 0 01.5-5.4 5.3 5.3 0 014.4-2.2 10 10 0 018.8 6.4 5.8 5.8 0 01-.5 5.4 5.3 5.3 0 01-4.4 2.1zm-3.9-10.6a2 2 0 00-1.6.7 2.5 2.5 0 000 2.3 6.6 6.6 0 005.4 4 2 2 0 001.7-.6 2.5 2.5 0 000-2.3 6.6 6.6 0 00-5.5-4zM173.6 405h14.5l-5.1-14h-14.4a1.8 1.8 0 00-1.7 2.6l3.2 8.7a4.1 4.1 0 003.5 2.6z" />
              </g>
              <ellipse id="left-display-shadow" cx="224.5" cy="511.5" fill="#1e3855" rx="74" ry="10.9" />
            </g>
          </g>
          <g id="robot">
            <path id="body-base" fill="#fff" d="M490.4 368.3c0 63.7-38 140-84.7 140s-84.8-76.3-84.8-140 38-90.6 84.8-90.6 84.7 26.9 84.7 90.6z" />
            <g id="robot-body">
              <ellipse id="robot-shadow" cx="405.6" cy="543.9" fill="#1e3855" rx="44.5" ry="7.1" />
              <g clip-path="url(#clip-path-2)">
                <g id="faces">
                  <g id="face">
                    <ellipse id="face-back" cx="560" cy="340.9" fill="#34496a" rx="61.5" ry="32.2" />
                    <g class="eyes" id="eyes" fill="#0ff">
                      <ellipse cx="539.8" cy="340.9" rx="7.3" ry="13.7" />
                      <ellipse cx="579.1" cy="340.9" rx="7.3" ry="13.7" />
                    </g>
                  </g>
                  <g id="face-2" data-name="face">
                    <ellipse id="face-back-2" cx="256.9" cy="340.9" fill="#34496a" data-name="face-back" rx="61.5" ry="32.2" />
                    <g class="eyes" id="eyes-2" fill="#0ff" data-name="eyes">
                      <ellipse cx="236.7" cy="340.9" rx="7.3" ry="13.7" />
                      <ellipse cx="275.9" cy="340.9" rx="7.3" ry="13.7" />
                    </g>
                  </g>
                  <g id="charge">
                    <circle cx="406.8" cy="340.9" r="16.2" fill="#34496a" />
                    <rect width="4.1" height="13.9" x="398.7" y="334" fill="#fff" />
                    <rect width="4.1" height="13.9" x="410.8" y="334" fill="#fff" />
                  </g>
                </g>
              </g>
            </g>
            <path id="right-hand" fill="#fff" d="M549.7 400.7c0 15.6-31.2 28.2-56.2 28.2s-34.2-12.6-34.2-28.2 9.2-28 34.2-28 56.2 12.5 56.2 28z" />
            <path id="left-hand" fill="#fff" d="M255.6 400.7c0-15.5 31.2-28 56.2-28s34.2 12.5 34.2 28-9.3 28.2-34.2 28.2-56.2-12.6-56.2-28.2z" />
          </g>
          <path id="note-1" fill="none" d="M180 317l-3.5-3.8a1 1 0 00-1.7.7v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a3 3 0 00-.7-1.9v-6.8l1.7 1.8a1 1 0 101.5-1.4z" />
          <path id="note-2" fill="none" d="M203.4 323.4v-9.5a1 1 0 00-1-1h-9.3a1 1 0 00-1 1v8.1a6 6 0 00-2-.3c-2.5 0-4.6 1.6-4.6 3.5s2 3.5 4.7 3.5 4.6-1.5 4.6-3.5a2.9 2.9 0 00-.7-1.9V315h7.3v7.1a5.8 5.8 0 00-1.9-.3c-2.6 0-4.7 1.6-4.7 3.5s2.1 3.5 4.7 3.5 4.7-1.5 4.7-3.5a2.9 2.9 0 00-.8-1.8z" />
        </g>
      </svg>
    </div>
    <canvas id="canvas-webgl2" class="webgl2"></canvas>
  </div>


  <div id="main-content" style="display: none;">
    <header>
      <!-- <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar dark-blue-bg"> -->
      <nav class="navbar navbar-expand-lg  scrolling-navbar dark-blue-bg">
        <a class="navbar-brand" href="#home" style="margin-left:3%;" data-aos="fade-down" data-aos-once="true" data-aos-delay="1500">
          <img src="images/logo.svg" height="45" alt="Padmesh Kunwar portfolio" >
        </a>
        <div class="nav-link-workopen ml-1 ml-md-4">
          #OPEN_TO_OPPORTUNITIES
        </div>
        <div class="ml-1 ml-md-3" id="theme-switch" style="margin-top: -9px;">
          <input type="checkbox" class="checkbox-theme" id="checkbox-theme">
          <label for="checkbox-theme" class="checkbox-label-theme">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <span class="ball-theme"></span>
          </label>
        </div>


        <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
          <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent23">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" data-aos="fade-down" data-aos-once="true" data-aos-delay="300">
              <a class="nav-link" href="#about">
                <i class="fas fa-user"></i> About
              </a>
            </li>
            <li class="nav-item" data-aos="fade-down" data-aos-once="true" data-aos-delay="200">
              <a class="nav-link" href="https://blog.padmeshkunwar.me">
                <i class="fas fa-pen-fancy"></i> Blog
              </a>
            </li>
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
                <a class="mx-3 color-coral" href="https://www.linkedin.com/in/padmesh97" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a class="mx-3 color-coral" href="https://www.github.com/padmesh97" target="_blank"><i class="fab fa-github"></i></a>
                <a class="mx-3 color-coral" href="https://www.facebook.com/padmesh.97" target="_blank"><i class="fab fa-facebook-f"></i></a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">



        <div class="col-md-1 d-none d-md-flex" style="justify-content: center;">
          <div class="left-list" data-aos="zoom-in-up" data-aos-once="true" data-aos-delay="1900">
            <ul class="color-primary">
              <li><a href="https://www.linkedin.com/in/padmesh97" target="_blank"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="https://www.github.com/padmesh97" target="_blank"><i class="fab fa-github"></i></a></li>
              <li><a href="https://www.facebook.com/padmesh.97" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            </ul>
          </div>
        </div>



        <div class="col-12 col-md-10 d-flex flex-column justify-content-center">





          <section id="home" style="margin-top: 1px;">
            <div class="fade-to-transparency"></div>
            <div class="row">

              <div class="col-12 col-md-4 d-flex align-items-center" id="dp_area">
                <div class="dp_wrapper" data-aos="fade" data-aos-once="true" data-aos-delay="1500">
                  <div class="dp_wrapper_overlay">
                    <img>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-8">
                <h1 class="color-primary ml-md-5 ml-1 pt-3 pt-md-1 text-gradient intro_list" data-aos="fade-up" data-aos-once="true" data-aos-delay="1100">Padmesh Kunwar</h1>
                <h3 class="color-coral ml-md-5 ml-1 intro_list" data-aos="fade-up" data-aos-once="true" data-aos-delay="1100">Software Engineer</h3>
                <br/>
                <br/>
                <h3 class="color-secondary ml-md-5 ml-1 intro_list" data-aos="fade-up" data-aos-once="true" data-aos-delay="1200">A code artist who is busy</h3>
                <br/>
                <h4 class="color-secondary ml-md-5 ml-1 mb-5 intro_list intro_list_typing_text_adjustment" data-aos="fade-up" data-aos-once="true" data-aos-delay="1200">
                  <span class="typed-text"></span><span class="cursor">&nbsp;</span>
                </h4>
                <a href="resume_download.php" alt="Resume" target="_blank" title="Resume" data-aos="fade-up" data-aos-once="true" data-aos-delay="1800" data-aos-anchor-placement="top-bottom" class="ml-md-5 ml-1 color-primary">
                  <button class="btn_2"><i class="las la-cloud-download-alt mr-3"></i>Resume</button>
                </a>

                <!-- <div class="row">
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
                </div> -->

              </div>

            </div>
          </section>


          <section id="about" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fas fa-user color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">About&nbsp;Me</div>
              <div class="divider"></div>
            </div>
            <p class="about_content color-secondary">
              Hi, I'm Padmesh Kunwar, a <span class="color-coral">Software Developer at Barclays in Pune</span> with a passion for backend development. I thrive on tackling challenges and delivering high-quality solutions that make a real impact.
            </p>
            <p class="about_content color-secondary">
              When I'm not coding, I’m exploring new tech trends and pushing myself to learn and grow in this ever-evolving field. I believe in the power of innovation and the thrill of solving complex problems.
            </p>
            <p class="about_content color-secondary">
              I graduated from JSSATE Noida in 2020 with a CGPA of 8.3, and since then, I've been honing my skills in backend technologies. My work is driven by a love for tech and a commitment to excellence.
            </p>
            <p class="about_content"><strong>My Achievements 🏆: </strong></p>
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
                  <td>Web development Internship&nbsp;&nbsp;<a href="images/jugaadu.pdf" alt="certficate link" target="_blank"><i class="fa fa-external-link-alt color-primary" aria-hidden="true"></i></a>
                  </td>
                  <td>GOT Inc. (formerly Jugaadu)</td>
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
              <div class="color-primary title text-gradient">Experience</div>
              <div class="divider"></div>
            </div>

            <div class="row justify-content-md-center">

              <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
                <div class="card blue-bg">
                  <div class="card-body">
                    <h4 class="card-title color-primary text-center">
                      <img class="experience-logo" src="./images/barclays-eagle.svg">
                      Barclays, Pune - Maharashtra
                    </h4>
                    <div class="row" style="margin-bottom: 6px">
                      <div class="col-12 col-md-8">
                        <div class="remark color-primary">
                          Software Developer
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="timeline color-primary">
                          10/2022 - Current
                        </div>
                      </div>
                    </div>
                    <ul class="stack color-coral">
                      <li>Java-Spring Boot</li>
                      <li>Hibernate</li>
                      <li>Microservices</li>
                      <li>Docker</li>
                      <li>Openshift/Kubernetes</li>
                      <li>Jenkins</li>
                      <li>RESTful</li>
                      <li>Git</li>
                      <li>Agile</li>
                    </ul>
                    <p class="color-primary">
                      &bull;&nbsp;Worked in migration of essential agent desktop backend services from
                      legacy platform to Java Springboot based microservices<br/><br/>
                      &bull;&nbsp;Delivered migration of 3 user journey workflows for the agent desktop,
                      which consisted of migration of 18% overall traffic and improved API
                      performance by 15%.<br/><br/>
                      &bull;&nbsp;Followed DevOps practises on Redhat openshift utilising Kubernetes
                      and Docker and contributed in enhancement of overall architechture
                      using principles of HLD and LLD<br/><br/>
                      &bull;&nbsp;Diligently applied Agile practices and ceremonies to achieve increasingly challenging goals with continuous improvement. <br/><br/>
                      &bull;&nbsp;Utilised Git for version control and Jira for defect/story tracking.
                    </p>
                    <div class="card-footer text-center mt-1">
                      <a href="https://barclays.com" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>



              <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
                <div class="card blue-bg">
                  <div class="card-body">
                    <h4 class="card-title color-primary text-center">
                      <img class="experience-logo" src="./images/raxa-logo.png">
                      Raxa Information Pvt. Ltd., New Delhi
                    </h4>
                    <div class="row" style="margin-bottom: 6px">
                      <div class="col-12 col-md-8">
                        <div class="remark color-primary">
                          Software Engineer
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="timeline color-primary">
                          12/2020 - 10/2022
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

              <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
                <div class="card">
                  <div class="card-body blue-bg">
                    <h4 class="card-title color-primary text-center">
                      <img class="experience-logo" src="./images/jugadu_logo.png">
                      GOT Inc. (formerly Jugaadu)
                    </h4>
                    <div class="row" style="margin-bottom: 6px">
                      <div class="col-12 col-md-8">
                        <div class="remark">
                          WEB DEVELOPER
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="timeline">
                          08/2020
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
                      <a href="https://www.boostgot.com/" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </section>


          <!-- <section id="internships" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fa fa-certificate color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">Internships</div>
              <div class="divider"></div>
            </div>

            <div class="row justify-content-md-center">

            <<OLD CONTENT HERE>>

            </div>
          </section> -->




          <section id="skill" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fa fa-graduation-cap color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">Skills</div>
              <div class="divider"></div>
            </div>

            <div class="row d-flex justify-content-center">
              <div class="color-coral skill_chips blue-bg"><i class="lab la-java"></i>Java</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-angular"></i>Angular</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-js-square"></i>Javascript</div>

              <div class="color-coral skill_chips blue-bg"><i class="lab la-docker"></i>Docker</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-angular"></i>Kubernetes</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-redhat"></i>Openshift</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-aws"></i>AWS</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-linux"></i>Linux</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-jenkins"></i>Jenkins</div>

              <div class="color-coral skill_chips blue-bg"><i class="las la-database"></i>Databases</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-git"></i>Git</div>
              <div class="color-coral skill_chips blue-bg"><i class="lab la-jira"></i>Jira</div>
              <div class="color-coral skill_chips blue-bg">Sonar</div>
              <div class="color-coral skill_chips blue-bg"><i class="las la-network-wired"></i>CI-CD</div>

              <!-- <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
                <div class="card">
                  <div class="card-body blue-bg">
                    <h4 class="card-title color-primary text-center"><a>Languages & Database</a></h4>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Java J2EE Spring Boot<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Javascript<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;php<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Python<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;HTML,CSS,SASS<div class="color-coral chips">Expert</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;MySQL<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;MongoDB<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;FirebaseDB<div class="color-coral chips">Intermediate</div></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="150">
                <div class="card">
                  <div class="card-body blue-bg">
                    <h4 class="card-title color-primary text-center"><a>Frameworks & Tools</a></h4>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Angular<div class="color-coral chips">Beginner</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Node.js<div class="color-coral chips">Beginner</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Bootstrap<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Materialize<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Git<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;RESTful<div class="color-coral chips">Beginner</div></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="200">
                <div class="card">
                  <div class="card-body blue-bg">
                    <h4 class="card-title color-primary text-center"><a>Cloud & OS</a></h4>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;AWS<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Google Cloud<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Microservices<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Docker<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Kubernetes<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Linux(CentOS & Ubuntu)<div class="color-coral chips">Intermediate</div></div>
                    <div class="skill dark-blue-bg">&bull;&nbsp;&nbsp;Windows<div class="color-coral chips">Intermediate</div></div>
                  </div>
                </div>
              </div> -->

            </div>

          </section>


          <section id="articles" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fas fa-pen-fancy color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">Articles</div>
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
          <section id="projects" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fa fa-folder-open color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">Projects</div>
              <div class="divider"></div>
            </div>

            <div class="row justify-content-md-center">


              <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
                <div class="card">
                  <div class="card-body blue-bg">
                    <h4 class="card-title color-primary">Synflow</h4>
                    <div class="row" style="margin-bottom: 6px">
                      <div class="col-12 col-md-8">
                        <div class="remark">
                          SELF PROJECT
                        </div>
                      </div>
                      <div class="col-12 col-md-4">
                        <div class="timeline">
                          Jan 2025
                        </div>
                      </div>
                    </div>
                    <ul class="stack color-coral">
                      <li>Angular</li>
                      <li>Gen AI</li>
                      <li>Prompt engineering</li>
                      <li>php</li>
                      <li>MySQL</li>
                    </ul>
                    <p class="color-primary">
                      App feauring workflow automation tool that synthesizes granular tasks to perform AI driven execution to get them done. It also utilizes advanced prompt engineering techniques.
                    </p>
                    <div class="card-footer text-center mt-1">
                      <a href="https://www.github.com/padmesh97/synflow" target="_blank" title="View github source">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="https://padmeshkunwar.me/synflow" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
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

              <!-- <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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
              </div> -->

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
                      <li>Firebase</li>
                      <li>AWS EC2</li>
                    </ul>
                    <p class="color-primary">
                      Developed official website of college society "Electrino" developed with intensive modules such as FORUM, certificate generator and distributor, data collection and analytics.
                    </p>
                    <div class="card-footer text-center mt-1">
                      <a href="https://www.github.com/seedjss/website" target="_blank" title="View github source">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="https://seedjss.netlify.app/" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                      <a href="https://www.padmeshkunwar.me/seed_forum" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                      <a href="https://www.padmeshkunwar.me/certi_module" target="_blank" title="Visit">
                        <i class="fa fa-external-link-alt" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div id="toggle-archived-projects" style="display: none;">

                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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


                <!-- <div id="projectCard" class="col-12 col-md-10" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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
                </div> -->
                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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


                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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


                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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


                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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
                <div id="projectCard" class="col-12 col-md-10 offset-md-1" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
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
              <div class="col-12 col-md-10 d-flex justify-content-center">
                <div class="archived-proj-toggle" onclick="expand('toggle-archived-projects')">
                  <div class="archived-proj-toggle-text" id="archived-proj-toggle-text">SHOW ARCHIVED PROJECTS</div>
                </div>
              </div>
            </div>
          </section>

          <section id="contact" data-aos="fade-up" data-aos-once="true" data-aos-anchor-placement="top-center" data-aos-delay="100">
            <div class="section_title_wrapper d-flex flex-row align-items-center">
              <i class="fa fa-envelope-open color-coral section_title_font"></i>
              <div class="color-primary title text-gradient">Contact</div>
              <div class="divider"></div>
            </div>

            <h1 class="color-primary">Get in Touch</h1>
            <h4 class="color-secondary">Building solutions, automating wins—let’s create something amazing together!.
              <br/><br/>
              Please feel free to drop a hello.
            </h4>
            <a href="mailto:kunwarpadmesh@yahoo.com" target="_blank" class="d-flex justify-content-center">
              <button class="btn_2">Drop Hello</button>
            </a>
            <div class="row mt-5">
              <div class="col-12 d-md-none text-center" style="font-size: 32px">
                <a class="mx-3 color-coral" href="https://www.linkedin.com/in/padmesh97"  target="_blank"><i class="fab fa-linkedin"></i></a>
                <a class="mx-3 color-coral" href="https://www.github.com/padmesh/97" target="_blank"><i class="fab fa-github"></i></a>
                <a class="mx-3 color-coral" href="https://www.facebook.com/padmesh.97" target="_blank"><i class="fab fa-facebook-f"></i></a>
              </div>
            </div>
          </section>

          <footer class="color-secondary">
            Designed and Built by Padmesh Kunwar | 2024
          </footer>

        </div>


        <div class="col-md-1 d-none d-md-flex" style="justify-content: center;">
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
  <!--  Star space travel -->
  <!-- <script type="text/javascript" src="js/space_travel.js"></script> -->
  <!-- loader robot js  -->
  <script type="text/javascript" src="js/loader_robot.js"></script>
  <script type="text/javascript" src="js/typewriter.js"></script>

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

    function loadFunction(){
      $('body').css({"background-color":"var(--bg-color) !important","height":"inherit"});
      $('html').css({"background-color":"var(--bg-color) !important","height":"inherit"});
      $("#polka").css({"display":"block"});
      $("#loader-bot").css({"display":"none"});
      $("#main-content").css({"display":"block"});
    }


    function expand(a)
    {
      $("#"+a).animate({
        height:'toggle'
      });

      if(a == "toggle-archived-projects"){
          $('#archived-proj-toggle-text').html() == "SHOW ARCHIVED PROJECTS"?$('#archived-proj-toggle-text').html("HIDE ARCHIVED PROJECTS"):$('#archived-proj-toggle-text').html("SHOW ARCHIVED PROJECTS");
      }
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
  <script>
    document.addEventListener('mousemove', (e) => {
        const aura = document.getElementById('aura');
        aura.style.display = 'block';

        const mouseX = event.pageX;
        const mouseY = event.pageY;
        // Update the position of the custom glow pointer
        aura.style.left = mouseX+'px';
        aura.style.top = mouseY+'px';
    });
    document.addEventListener('mouseleave', () => {
      const aura = document.getElementById('aura');
      aura.style.display = 'none';
    });
  </script>
</body>
</html>
