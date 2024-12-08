<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LYDO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Sora">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../landingPAGE/landing.css">
  <style>

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg py-1 sticky-top bg-body-tertiary">
    <div class="container">
      <a href="#" class="navbar-logo">
        <img src="../landingPAGE/lydo-logo-hd.png" alt="logo">
        <span style="color:black;">Lucena City Youth Development Council</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropbtn">Programs</a>
            <div class="dropdown-content">
              <a href="scholar.php" onclick="showContent('scholar')">Scholarships</a>
              <a href="youthprofiling.php">Youth Profiling</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#news">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#notifications">
              <i class='bx bxs-bell'></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropbtn">
              <i class='bx bxs-user-circle profile-icon'></i> Profile
            </a>
            <div class="dropdown-content" style="font: size 13px;">
              <a href="#dashboard">Dashboard</a>
              <a href="application-status.php">Monitor Application Status</a>
              <a href="#account-settings">Account Settings</a>
              <a href="#logout">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero vh-100 d-flex align-items-center" id="home">
    <div class="hero-container container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-center">
          <h1 class="display-4 text-white">Lucena City Youth Development Council Portal</h1>
          <p class="text-white my-3">
            Specifically provided in Republic Act 10742 or the SK Reform Act of 2015, LDYO aims to ensure that all programs for the youth are well implemented with a long-term goal of creating future leaders with imbued patriotism and drive for growth.
          </p>
          <a href="applicationform.php" class="btn btn-primary" style="padding:20px;">Apply for Accreditation</a>
        </div>

        <div class="col-lg-5 d-flex justify-content-center align-items-center">
          <img src="../landingPAGE/LYDO-logo.png" alt="LYDO Logo" width="400" height="400">
        </div>
      </div>
    </div>
  </div>

  <section class="banner" id="home">
    <div class="banner-content">

      <div class="slideshow-container">
        <div class="mySlides fade">
          <img src="assets/images/news1.jpg" style="width:100%" alt="Banner Image">
        </div>
        <div class="mySlides fade">
          <img src="assets/images/news2.jpg" style="width:100%" alt="Banner Image">
        </div>
        <div class="mySlides fade">
          <img src="assets/images/news3.jpg" style="width:100%" alt="Banner Image">
        </div>
      </div>

    </div>
  </section>



  <section id="about" class="container flex-center flex-column">
    <h2 class="col-md-8 mx-auto text-center">About Us</h2>
    <div class="features text-center">
      <div class="sub-feature" style="--color: #fe6786">
        <div class="feature_icon">
          <i class='bx bxs-show'></i>
        </div>
        <h3 class="feature_title">VISION</h3>
        <p>“Enabled, involved and patriotic youth
          realizing their aspirations.”
        </p>
      </div>
      <div class="sub-feature" style="--color: #fea95b">
        <div class="feature_icon">
          <i class='bx bx-target-lock'></i>
        </div>
        <h3 class="feature_title">MISSION</h3>
        <p>“To promote sustainable developmental
          policies and programs for and with the Filipino Youth.”
        </p>
      </div>
    </div>

    <div class="about-core flex-center" style="margin-left: 100px; margin-right:100px;">
      <div class="about-core-content">
        <h2>CORE VALUES</h2>
        <div class="core-container" style="--color:var(--color)">
          <i class='bx bx-shield-quarter icon' style="--color: #81A263"></i>
          <div class="core-text" style="padding:15px;">
            <h3>INTEGRITY</h3>
            <p>We shall be honest in all our dealings and transactions, adhering to moral principles and character.
              We shall be ruled with righteousness at all times be it in our decisions or actions; demonstrating mutual respect and trust in others.
            </p>
          </div>
        </div>

        <div class="core-container" style="--color:var(--color)">
          <i class='bx bxs-donate-heart icon' style="--color: #F4A261"></i>
          <div class="core-text">
            <h3>RESPECT</h3>
            <p>We shall regard everyone, in our words and actions, with high esteem and courtesy, understanding where our rights end and someone else’s begin.
            </p>
          </div>
        </div>

        <div class="core-container" style="--color:var(--color)">
          <i class='bx bx-anchor icon' style="--color: #FF6969"></i>
          <div class="core-text">
            <h3>EQUALITY </h3>
            <p>We shall not discriminate by word or conduct, anyone on account of personality, physical appearance, race, perceived economic status, gender, political and religious beliefs.
            </p>
          </div>
        </div>

        <div class="core-container" style="--color:var(--color)">
          <i class='bx bxs-timer icon' style="--color: #9B86BD"></i>
          <div class="core-text">
            <h3>DISCIPLINE </h3>
            <p>We shall act with strength of character and self-control in accordance with rules and norms.
            </p>
          </div>
        </div>

        <div class="core-container" style="--color:var(--color)">
          <i class='bx bxs-award' style="--color: #1679AB"></i>
          <div class="core-text">
            <h3>EXCELLENCE</h3>
            <p> We shall constantly undertake our tasks with highest standards not setting for anything less.
            </p>
          </div>
        </div>
        <div class="core-container" style="--color:var(--color)">
          <i class='bx bx-shape-circle' style="--color: #597445"></i>
          <div class="core-text">
            <h3>TEAMWORK </h3>
            <p>We shall remain united, loyal and committed; acting together with dynamism working toward a shared responsibility in the interest of the common good.
            </p>
          </div>
        </div>
        <div class="core-container" style="--color:var(--color)">

          <i class='bx bx-cross' style="--color: #E88D67"></i>


          <div class="core-text">
            <h3>GOD-CENTEREDNESS</h3>
            <p>We shall glorify and revere the Almighty God. We offer to Him all that we are and all that we do; and submit ourselves to His will.
            </p>
          </div>
        </div>

      </div>
    </div>

  </section>

  <section id="news">
    <div class="news">
      <div class="news-item">
        <img src="../assets/images/news1.jpg" alt="News Image">
        <div class="news-content">
          <h2>LYDO Kabilang Sa Hinirang Na 25 Outstanding Lydo Sa Buong Bansa</h2>
          <p>Malugod na tinanggap ni LYDO Head, Jordan Romulo kasama si Lucena Youth Ambassador Angelica Alcala ang pagkilala mula sa Philippine Sangguniang Kabataan Awards. Nakatuwang sa pagpaparangal ang Positive Youth Development Network, Galing Pook at GoodGovPH..</p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>

      <div class="news-item">
        <img src="../assets/images/news2.jpg" alt="News Image">
        <div class="news-content">
          <h2>Data Gathering</h2>
          <p>Ngayong araw, July 2, 2024 ay nagsadya sa ating tanggapan ang IT Students ng DLL para sa consultation ng kanilang gagawing thesis.</p>
          <a href="#" class="read-more">Read More</a>
        </div>
      </div>

      <div class="news-item">
        <img src="../assets/images/news3.jpg" alt="News Image">
        <div class="news-content">
          <h2>Bagong Youth Ambassador ng lungsod hinirang</h2>
          <p>Hinirang na bagong Youth Ambassador ng lungsod si Angelica Alcala ng Brgy. Mayao Crossing. Sa ilalim ng mandato bilang tagapangulo ng Local Youth Development Council (LYDC), hinirang ni Konsehal Rolden Garcia si Bb. Alcala kahalili ni Mayor Mark Alcala, dating youth ambassador./p>
            <a href="#" class="read-more">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>