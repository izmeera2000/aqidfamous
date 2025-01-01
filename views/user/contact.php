<?php include "app/server.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include "layouts/head.php" ?>

</head>
<?php include "layouts/header.php" ?>

<body class="index-page">


  <main class="main">

    <?php include "layouts/pagetitle.php" ?>


    <!-- Contact Section -->
    <section id="contact" class="contact section">


      <?php



      $query =
        "SELECT  * FROM about  ";

      $aboutarr = array();

      $results = mysqli_query($db, $query);

      while ($row = $results->fetch_assoc()) {

        $aboutarr[$row['name']] = $row;
      }



      ?>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p><?php if (isset($aboutarr['address'])) {
                  echo $aboutarr['address']['content'];
                } ?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Me</h3>
                <p><a href="tel:<?php echo $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $aboutarr['phone']['content']) ?>"><?php if (isset($aboutarr['email'])) {
                   echo $aboutarr['phone']['content'];
                 } ?></a></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p><a href="mailto:<?php if (isset($aboutarr['email'])) {
                  echo $aboutarr['email']['content'];
                } ?>"><?php if (isset($aboutarr['email'])) {
                   echo $aboutarr['email']['content'];
                 } ?></a></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Social Profiles</h3>
                <div class="social-links">


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
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>



      </div>

    </section><!-- /Contact Section -->

  </main>

  <?php include "layouts/footer.php" ?>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <?php include "layouts/script.php" ?>


</body>

</html>