<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="<?php echo $site_url ?> " class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/user/img/logo.png" alt=""> -->
      <h1 class="sitename">aqidfamous</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?php echo $site_url ?> " class="<?php echo ($current_page == 'home') ? 'active' : '' ?>">Home</a>
        </li>
        <li><a href="<?php echo $site_url ?>about"
            class="<?php echo ($current_page == 'about') ? 'active' : '' ?>">About</a></li>
        <li><a href="<?php echo $site_url ?>experience"
            class="<?php echo ($current_page == 'experience') ? 'active' : '' ?>">Experience</a></li>
        <!-- <li><a href="<?php echo $site_url ?>gallery">Services</a></li> -->
        <li><a href="<?php echo $site_url ?>gallery"
            class="<?php echo ($current_page == 'gallery') ? 'active' : '' ?>">Gallery</a></li>
        <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul> -->
        </li>
        <li><a href="<?php echo $site_url ?>contact"
            class="<?php echo ($current_page == 'contact') ? 'active' : '' ?>">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>