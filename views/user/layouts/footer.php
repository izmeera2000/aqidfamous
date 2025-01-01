<footer id="footer" class="footer dark-background">
  <div class="container">
    <h3 class="sitename">aqidfamous</h3>
    <p>Your trustworthy graphic designer.</p>
    <div class="social-links d-flex justify-content-center">
      <?php



      $query =
        "SELECT  *   FROM social   ";


      $results = mysqli_query($db, $query);

      while ($row = $results->fetch_assoc()) { ?>
        <a href="<?php echo $row['link'] ?>"><i class="<?php echo $row['logo'] ?>"></i></a>
        <?php

      }
      ?>
    </div>
    <div class="container">
      <div class="copyright">
        <span>Copyright</span> <strong class="px-1 sitename">aqidfamous</strong> <span>All Rights Reserved</span>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by Izmeer Aiman
      </div>
    </div>
  </div>
</footer>