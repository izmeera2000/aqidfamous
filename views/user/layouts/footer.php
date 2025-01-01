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
        <a href="<?php echo $row['link'] ?>"  onclick="trackClick(event, this.href)"><i class="<?php echo $row['logo'] ?>"></i></a>
        <?php

      }
      ?>
    </div>
    <div class="container">
      <div class="copyright">
        <span>Copyright</span> <strong class="px-1 sitename">aqidfamous</strong> <span>All Rights Reserved</span>
      </div>
      <div class="credits">
 
        Designed by Izmeer Aiman
      </div>
    </div>
  </div>
</footer>