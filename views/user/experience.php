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



    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">



            <h3 class="resume-title">Education</h3>

            <?php



            $query =
              "SELECT  *, DATE_FORMAT(date_start, '%b %Y') AS date_start2 , DATE_FORMAT(date_end, '%b %Y') AS date_end2  FROM experience  WHERE type='education' ORDER BY date_start DESC";


            $results = mysqli_query($db, $query);

            while ($row = $results->fetch_assoc()) { ?>
              <div class="resume-item">
                <h4><?php echo $row['name'] ?></h4>
                <p><em><?php echo $row['description'] ?></em></p>

                <h5><?php echo $row['date_start2'] ?> - <?php echo $row['date_end2'] ?></h5>
                <p><em><?php echo $row['address'] ?></em></p>
              </div>

              <?php

            }



            ?>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Professional Experience</h3>

            <?php



            $query =
              "SELECT  *, DATE_FORMAT(date_start, '%b %Y') AS date_start2 , DATE_FORMAT(date_end, '%b %Y') AS date_end2  FROM experience  WHERE type='working' ORDER BY date_start DESC";


            $results = mysqli_query($db, $query);

            while ($row = $results->fetch_assoc()) { ?>
              <div class="resume-item">
                <h4><?php echo $row['name'] ?></h4>
                <p><em><?php echo $row['description'] ?></em></p>

                <h5><?php echo $row['date_start2'] ?> - <?php echo $row['date_end2'] ?></h5>
                <p><em><?php echo $row['address'] ?></em></p>

                <ul>

                  <?php

                  $id = $row['id'];
                  $query2 =
                    "SELECT *  FROM experience_points  WHERE exp_id='$id' ORDER BY point_order ASC  ";


                  $results2 = mysqli_query($db, $query2);

                  while ($row2 = $results2->fetch_assoc()) { ?>



                    <li><?php echo $row2['content'] ?></li>




                    <?php
                  }
                  ?>
                </ul>
              </div> <?php
            }



            ?>


          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

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