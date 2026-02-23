<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title>404 — Page Not Found · Padmesh Kunwar</title>
  <meta name="description" content="Oops! This page doesn't exist."/>


  <!-- OG Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Padmesh K. - Senior Software Engineer" />
    <meta property="og:image" content="https://www.padmeshkunwar.me/images/dp_dark.png" />
    <meta property="og:url" content="https://www.padmeshkunwar.me/" />
    <meta property="og:site_name" content="padmeshkunwar.me" />
    <meta property="og:description" content="Discover my work in software engineering, AI, and cloud architecture." />

    <!-- Twitter card Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Padmesh K. - Senior Software Engineer" />
    <meta name="twitter:description" content="Discover my work in software engineering, AI, and cloud architecture." />
    <meta name="twitter:image" content="https://www.padmeshkunwar.me/images/og_tile.png" />

    <link rel="icon" type="image/x-icon" href="./images/favico/android-chrome-512x512.png">
    <link rel="apple-touch-startup-image" href="./images/favico/favicon.ico">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122721080-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-122721080-2');
    </script>



  <link rel="stylesheet" href="../../css/style.css"/>
  <style>
    /* ── NEON EXTRAS (scoped to 404 only) ─────── */

    /* Neon color vars layered on top of existing theme */
    :root {
      --neon-cyan:   #00f5ff;
      --neon-green:  #39ff14;
      --neon-pink:   #ff2d78;
      --neon-purple: #bf5fff;
      --neon-amber:  #ffb300;
    }

    /* Override bg for this page to go slightly darker/moodier even in light mode */
    #pg404 {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 7rem 2rem 4rem;
      position: relative;
      z-index: 2;
      overflow: hidden;
    }

    /* ── BIG 404 GLITCH TEXT ──────────────────── */
    .err-code {
      font-family: 'Outfit', sans-serif;
      font-weight: 900;
      font-size: clamp(7rem, 22vw, 18rem);
      line-height: 1;
      letter-spacing: -0.05em;
      color: transparent;
      -webkit-text-stroke: 2px var(--text);
      position: relative;
      user-select: none;
      animation: glitchShift 5s infinite;
    }

    /* Neon glow layers via pseudo-elements */
    .err-code::before,
    .err-code::after {
      content: '404';
      position: absolute;
      inset: 0;
      -webkit-text-stroke: 2px transparent;
      font-family: inherit;
      font-weight: inherit;
      font-size: inherit;
      line-height: inherit;
      letter-spacing: inherit;
    }
    .err-code::before {
      color: var(--neon-cyan);
      text-shadow:
        0 0 8px  var(--neon-cyan),
        0 0 20px var(--neon-cyan),
        0 0 50px var(--neon-cyan);
      clip-path: polygon(0 0, 100% 0, 100% 40%, 0 40%);
      animation: glitchTop 5s infinite;
    }
    .err-code::after {
      color: var(--neon-pink);
      text-shadow:
        0 0 8px  var(--neon-pink),
        0 0 20px var(--neon-pink),
        0 0 50px var(--neon-pink);
      clip-path: polygon(0 60%, 100% 60%, 100% 100%, 0 100%);
      animation: glitchBot 5s infinite;
    }

    @keyframes glitchTop {
      0%, 90%, 100% { transform: translate(0, 0); opacity: 1; }
      92%            { transform: translate(-4px, -2px); opacity: 0.8; }
      94%            { transform: translate(4px, 2px);  opacity: 0.6; }
      96%            { transform: translate(-2px, 1px); opacity: 0.9; }
    }
    @keyframes glitchBot {
      0%, 90%, 100% { transform: translate(0, 0); opacity: 1; }
      93%            { transform: translate(4px, 2px);  opacity: 0.7; }
      95%            { transform: translate(-4px, -2px); opacity: 0.5; }
      97%            { transform: translate(2px, -1px); opacity: 0.9; }
    }
    @keyframes glitchShift {
      0%, 89%, 100% { transform: skewX(0deg); }
      91%            { transform: skewX(-1.5deg); }
      93%            { transform: skewX(1.5deg); }
      95%            { transform: skewX(0deg); }
    }

    /* ── SCANLINE OVERLAY (extra dense for 404 mood) */
    #pg404::before {
      content: '';
      position: absolute; inset: 0;
      background: repeating-linear-gradient(
        0deg,
        transparent, transparent 2px,
        rgba(0,245,255,0.025) 2px, rgba(0,245,255,0.025) 4px
      );
      pointer-events: none;
      z-index: 0;
      animation: scanMove 8s linear infinite;
    }
    @keyframes scanMove {
      from { background-position: 0 0; }
      to   { background-position: 0 80px; }
    }

    /* ── NEON RING BEHIND 404 ─────────────────── */
    .err-ring {
      position: absolute;
      width: clamp(280px, 50vw, 600px);
      aspect-ratio: 1/1;
      border-radius: 50%;
      border: 1px solid rgba(0,245,255,0.15);
      box-shadow:
        0 0 30px rgba(0,245,255,0.08),
        0 0 80px rgba(0,245,255,0.05),
        inset 0 0 30px rgba(0,245,255,0.04);
      animation: ringPulse 4s ease-in-out infinite;
      pointer-events: none;
      z-index: 0;
    }
    .err-ring-2 {
      width: clamp(200px, 38vw, 450px);
      border-color: rgba(255,45,120,0.12);
      box-shadow:
        0 0 30px rgba(255,45,120,0.06),
        0 0 80px rgba(255,45,120,0.04),
        inset 0 0 30px rgba(255,45,120,0.03);
      animation: ringPulse 6s ease-in-out infinite reverse;
    }
    @keyframes ringPulse {
      0%,100% { transform: scale(1);   opacity: 1; }
      50%      { transform: scale(1.04); opacity: 0.6; }
    }

    /* ── CONTENT BELOW 404 ───────────────────── */
    .err-content { position: relative; z-index: 1; }

    .err-mono {
      font-family: 'DM Mono', monospace;
      font-size: 0.7rem;
      letter-spacing: 0.28em;
      text-transform: uppercase;
      color: var(--neon-cyan);
      text-shadow: 0 0 10px var(--neon-cyan), 0 0 25px var(--neon-cyan);
      margin-bottom: 1.25rem;
      opacity: 0;
      animation: fadeUp 0.7s 0.3s forwards;
    }

    .err-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 800;
      font-size: clamp(1.4rem, 4vw, 2.2rem);
      color: var(--text);
      letter-spacing: -0.025em;
      margin-bottom: 1rem;
      opacity: 0;
      animation: fadeUp 0.7s 0.5s forwards;
    }

    .err-desc {
      font-family: 'Nunito', sans-serif;
      font-size: clamp(0.9rem, 2vw, 1.05rem);
      color: var(--text2);
      max-width: 460px;
      margin: 0 auto 2.5rem;
      line-height: 1.75;
      opacity: 0;
      animation: fadeUp 0.7s 0.7s forwards;
    }

    .err-actions {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      opacity: 0;
      animation: fadeUp 0.7s 0.9s forwards;
    }

    /* Neon-glowing primary button override for this page */
    .btn-neon {
      background: transparent;
      color: var(--neon-cyan);
      border: 1.5px solid var(--neon-cyan);
      box-shadow:
        0 0 8px  rgba(0,245,255,0.4),
        0 0 20px rgba(0,245,255,0.2),
        inset 0 0 12px rgba(0,245,255,0.05);
      text-shadow: 0 0 8px var(--neon-cyan);
      transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
    }
    .btn-neon:hover {
      background: rgba(0,245,255,0.08);
      box-shadow:
        0 0 14px rgba(0,245,255,0.7),
        0 0 40px rgba(0,245,255,0.35),
        inset 0 0 20px rgba(0,245,255,0.1);
      transform: translateY(-3px) scale(1.04);
    }

    .btn-neon-pink {
      background: transparent;
      color: var(--neon-pink);
      border: 1.5px solid var(--neon-pink);
      box-shadow:
        0 0 8px  rgba(255,45,120,0.4),
        0 0 20px rgba(255,45,120,0.2),
        inset 0 0 12px rgba(255,45,120,0.05);
      text-shadow: 0 0 8px var(--neon-pink);
      transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
    }
    .btn-neon-pink:hover {
      background: rgba(255,45,120,0.08);
      box-shadow:
        0 0 14px rgba(255,45,120,0.7),
        0 0 40px rgba(255,45,120,0.35),
        inset 0 0 20px rgba(255,45,120,0.1);
      transform: translateY(-3px) scale(1.04);
    }

    /* ── TERMINAL BLOCK ──────────────────────── */
    .err-terminal {
      margin: 3rem auto 0;
      max-width: 480px;
      background: var(--bg3);
      border: 1px solid var(--border2);
      border-radius: 14px;
      overflow: hidden;
      box-shadow:
        0 0 0 1px rgba(0,245,255,0.08),
        0 8px 32px var(--shadow, rgba(0,0,0,0.1)),
        0 0 40px rgba(0,245,255,0.04);
      opacity: 0;
      animation: fadeUp 0.7s 1.1s forwards;
    }
    .term-bar {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 10px 16px;
      background: var(--bg2);
      border-bottom: 1px solid var(--border);
    }
    .term-dot {
      width: 11px; height: 11px; border-radius: 50%;
    }
    .term-dot:nth-child(1) {
      background: #ff5f57;
      box-shadow: 0 0 6px rgba(255,95,87,0.7);
    }
    .term-dot:nth-child(2) {
      background: #febc2e;
      box-shadow: 0 0 6px rgba(254,188,46,0.7);
    }
    .term-dot:nth-child(3) {
      background: #28c840;
      box-shadow: 0 0 6px rgba(40,200,64,0.7);
    }
    .term-title {
      font-family: 'DM Mono', monospace;
      font-size: 0.6rem;
      color: var(--text3);
      letter-spacing: 0.15em;
      margin-left: auto;
    }
    .term-body {
      padding: 1.25rem 1.5rem;
      font-family: 'DM Mono', monospace;
      font-size: 0.72rem;
      line-height: 2;
      text-align: left;
    }
    .term-line { display: flex; gap: 10px; }
    .term-prompt { color: var(--neon-green); text-shadow: 0 0 8px var(--neon-green); }
    .term-cmd    { color: var(--text2); }
    .term-out    {
      color: var(--neon-pink);
      text-shadow: 0 0 6px rgba(255,45,120,0.5);
      padding-left: 20px;
    }
    .term-out-dim { color: var(--text3); padding-left: 20px; }
    .term-cursor {
      display: inline-block;
      width: 7px; height: 1.1em;
      background: var(--neon-cyan);
      box-shadow: 0 0 8px var(--neon-cyan);
      vertical-align: middle;
      margin-left: 2px;
      animation: blink 1s step-end infinite;
    }

    /* ── FLOATING NEON PARTICLES ─────────────── */
    .particles {
      position: absolute; inset: 0;
      pointer-events: none; z-index: 0; overflow: hidden;
    }
    .p {
      position: absolute;
      border-radius: 50%;
      animation: floatP var(--dur, 8s) ease-in-out infinite;
      animation-delay: var(--delay, 0s);
    }
    @keyframes floatP {
      0%,100% { transform: translateY(0) scale(1);   opacity: var(--op, 0.5); }
      50%      { transform: translateY(-30px) scale(1.2); opacity: calc(var(--op, 0.5) * 0.4); }
    }

    /* Dark theme: intensify neons */
    [data-theme="dark"] .err-code {
      -webkit-text-stroke-color: rgba(255,255,255,0.15);
    }
    [data-theme="dark"] .err-code::before {
      text-shadow:
        0 0 10px  var(--neon-cyan),
        0 0 30px  var(--neon-cyan),
        0 0 80px  var(--neon-cyan),
        0 0 140px rgba(0,245,255,0.4);
    }
    [data-theme="dark"] .err-code::after {
      text-shadow:
        0 0 10px  var(--neon-pink),
        0 0 30px  var(--neon-pink),
        0 0 80px  var(--neon-pink),
        0 0 140px rgba(255,45,120,0.4);
    }
    [data-theme="dark"] .err-mono {
      text-shadow: 0 0 14px var(--neon-cyan), 0 0 40px var(--neon-cyan);
    }
    [data-theme="dark"] .err-terminal {
      box-shadow:
        0 0 0 1px rgba(0,245,255,0.15),
        0 8px 32px rgba(0,0,0,0.4),
        0 0 60px rgba(0,245,255,0.07);
    }

    /* Responsive */
    @media (max-width: 500px) {
      .err-actions { flex-direction: column; align-items: center; }
      .btn { justify-content: center; }
    }
  </style>
</head>
<body>

<!-- ══ NAV ══════════════════════════════════════ -->
<nav id="navbar">
  <a href="#home" class="nav-logo">PK<span class="cursor"></span></a>
  <ul class="nav-links">
    <li><a href="../index.html#home">Home</a></li>
    <li><a href="../index.html#experience">Experience</a></li>
    <li><a href="../index.html#impact">Impact</a></li>
    <li><a href="../index.html#skills">Skills</a></li>
    <li><a href="../index.html#projects">Projects</a></li>
    <li><a href="../index.html#contact">Contact</a></li>
  </ul>
  <div class="nav-right">
    <button class="theme-btn" id="themeBtn" aria-label="Toggle theme">
      <span class="t-icon sun">☀</span>
      <span class="t-icon moon">☽</span>
    </button>
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Nav -->
<ul class="mob-menu" id="mobMenu">
  <li><a href="../index.html#home"       class="m-link">Home</a></li>
  <li><a href="../index.html#experience" class="m-link">Experience</a></li>
  <li><a href="../index.html#impact"     class="m-link">Impact</a></li>
  <li><a href="../index.html#skills"     class="m-link">Skills</a></li>
  <li><a href="../index.html#projects"   class="m-link">Projects</a></li>
  <li><a href="../index.html#contact"    class="m-link">Contact</a></li>
</ul>

<!-- ══ 404 PAGE ══════════════════════════════════ -->
<div id="pg404">

  <!-- Neon ambient rings -->
  <div class="err-ring"></div>
  <div class="err-ring err-ring-2"></div>

  <!-- Floating neon particles -->
  <div class="particles">
    <div class="p" style="width:4px;height:4px;background:var(--neon-cyan);top:18%;left:12%;
         box-shadow:0 0 8px var(--neon-cyan);--dur:7s;--delay:0s;--op:0.55"></div>
    <div class="p" style="width:3px;height:3px;background:var(--neon-pink);top:72%;left:80%;
         box-shadow:0 0 8px var(--neon-pink);--dur:9s;--delay:1.5s;--op:0.5"></div>
    <div class="p" style="width:5px;height:5px;background:var(--neon-green);top:30%;left:85%;
         box-shadow:0 0 10px var(--neon-green);--dur:11s;--delay:0.8s;--op:0.4"></div>
    <div class="p" style="width:3px;height:3px;background:var(--neon-purple);top:65%;left:15%;
         box-shadow:0 0 8px var(--neon-purple);--dur:8s;--delay:2s;--op:0.45"></div>
    <div class="p" style="width:6px;height:6px;background:var(--neon-amber);top:82%;left:48%;
         box-shadow:0 0 10px var(--neon-amber);--dur:10s;--delay:3s;--op:0.35"></div>
    <div class="p" style="width:2px;height:2px;background:var(--neon-cyan);top:50%;left:5%;
         box-shadow:0 0 6px var(--neon-cyan);--dur:13s;--delay:0.5s;--op:0.4"></div>
    <div class="p" style="width:4px;height:4px;background:var(--neon-pink);top:10%;left:60%;
         box-shadow:0 0 8px var(--neon-pink);--dur:6s;--delay:4s;--op:0.45"></div>
  </div>

  <!-- Big 404 -->
  <div class="err-code" style="position:relative;z-index:1">404</div>

  <!-- Content -->
  <div class="err-content">
    <br/>
    <div class="err-mono">// error occured</div>

    <h1 class="err-title">Lost in the void?</h1>

    <p class="err-desc">
      The page you're looking for doesn't exist, was moved, or maybe it never did.
    </p>

    <div class="err-actions">
      <a href="../index.html" class="btn btn-neon">
        ← Back to Home
      </a>
      <a href="../../index.php#contact" class="btn btn-neon-pink">
        Report Issue
      </a>
    </div>

    <!-- Terminal block -->
    <!-- <div class="err-terminal">
      <div class="term-bar">
        <div class="term-dot"></div>
        <div class="term-dot"></div>
        <div class="term-dot"></div>
        <span class="term-title">bash — padmesh@portfolio</span>
      </div>
      <div class="term-body">
        <div class="term-line">
          <span class="term-prompt">~$</span>
          <span class="term-cmd">curl https://padmesh.dev<span id="typed-path"></span></span>
        </div>
        <div class="term-line" style="margin-top:4px">
          <span class="term-out">Error 404: Not Found</span>
        </div>
        <div class="term-line">
          <span class="term-out-dim">→ Suggestion: navigate to /home</span>
        </div>
        <div class="term-line" style="margin-top:4px">
          <span class="term-prompt">~$</span>
          <span class="term-cmd"><span class="term-cursor"></span></span>
        </div>
      </div>
    </div> -->

  </div>
</div>

<!-- ══ FOOTER ════════════════════════════════════ -->
<footer>
  <span class="f-txt">© 2026 Padmesh Kunwar</span>
  <!-- <div class="f-tags">
    <span class="f-tag">Error</span>
    <span class="f-tag">404</span>
    <span class="f-tag">Not Found</span>
  </div> -->
</footer>

<!-- ══ JS ════════════════════════════════════════ -->
<script>
  /* ── Theme (mirrors main site) ── */
  const html = document.documentElement;
  const themeBtn = document.getElementById('themeBtn');
  html.setAttribute('data-theme', localStorage.getItem('pk-theme') || 'light');
  themeBtn.addEventListener('click', () => {
    const next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', next);
    localStorage.setItem('pk-theme', next);
  });

  /* ── Mobile Nav ── */
  const hbg = document.getElementById('hamburger');
  const mobMenu = document.getElementById('mobMenu');
  hbg.addEventListener('click', () => {
    hbg.classList.toggle('open');
    mobMenu.classList.toggle('open');
  });
  document.querySelectorAll('.m-link').forEach(a => {
    a.addEventListener('click', () => {
      hbg.classList.remove('open');
      mobMenu.classList.remove('open');
    });
  });

  /* ── Type the current bad path into terminal ── */
  const typedEl = document.getElementById('typed-path');
  const path = window.location.pathname.replace(/.*\//, '/') || '/???';
  let i = 0;
  const typeIt = () => {
    if (i <= path.length) {
      typedEl.textContent = path.slice(0, i);
      i++;
      setTimeout(typeIt, 80);
    }
  };
  setTimeout(typeIt, 1400);
</script>

</body>
</html>