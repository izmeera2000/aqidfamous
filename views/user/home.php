<?php include "app/server.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include "layouts/head.php" ?>

</head>
<?php include "layouts/header.php" ?>

<body class="index-page">


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/user/img/bg2.jpg" alt="" data-aos="fade-in">

      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h2>Aqid Danial</h2>
        <p>I'm <span class="typed" data-typed-items="Freelancer,Gooner,  Graphic Designer">Graphic
            designer</span><span class="typed-cursor typed-cursor--blink"></span></p>
        <div class="social-links">

          <?php



          $query =
            "SELECT  *   FROM social   ";


          $results = mysqli_query($db, $query);

          while ($row = $results->fetch_assoc()) { ?>
            <a href="<?php echo $row['link'] ?>" onclick="trackClick(event, this.href)"><i
                class="<?php echo $row['logo'] ?>"></i></a>
            <?php

          }
          ?>
        </div>
      </div>

    </section><!-- /Hero Section -->

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