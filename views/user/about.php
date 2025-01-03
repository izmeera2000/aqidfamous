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
        <!-- About Section -->
        <section id="about" class="about section">

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

                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4">
                        <img src="assets/user/img/mraqid3.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 content">
                        <h2><?php if (isset($aboutarr['title'])) {
                            echo $aboutarr['title']['content'];
                        } ?></h2>

                        <p class="fst-italic py-3">
                         <?php if (isset($aboutarr['subtitle'])) {
                            echo $aboutarr['subtitle']['content'];
                        } ?> 
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>
                                            <?php if (isset($aboutarr['birthday'])) {
                                                 $timestamp = strtotime($aboutarr['birthday']['content']);
                                                echo date('jS F Y', $timestamp);
                                            } ?>
                                        </span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <span>
                                            <?php if (isset($aboutarr['website'])) {
                                                echo $aboutarr['website']['content'];
                                            } ?>
                                        </span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>
                                            <?php if (isset($aboutarr['phone'])) {
                                                echo $aboutarr['phone']['content'];
                                            } ?>
                                        </span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>
                                            <?php if (isset($aboutarr['address'])) {
                                                echo $aboutarr['address']['content'];
                                            } ?>
                                        </span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                        <span><?php if (isset($aboutarr['birthday'])) {
                                            echo calculateAge($aboutarr['birthday']['content']);
                                        } ?></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Education:</strong> <span><?php if (isset($aboutarr['education'])) {
                                        echo $aboutarr['education']['content'];
                                    } ?></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span><?php if (isset($aboutarr['email'])) {
                                            echo $aboutarr['email']['content'];
                                        } ?></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span><?php if (isset($aboutarr['status_freelance'])) {
                                            echo $aboutarr['status_freelance']['content'];
                                        } ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="py-3">
                            <?php if (isset($aboutarr['description'])) {
                                echo $aboutarr['description']['content'];
                            } ?>
                        </p>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-emoji-smile"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end=" <?php if (isset($aboutarr['clients'])) {
                                echo $aboutarr['clients']['content'];
                            } ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Happy Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end=" <?php if (isset($aboutarr['projects'])) {
                                echo $aboutarr['projects']['content'];
                            } ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-headset"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end=" <?php if (isset($aboutarr['hours'])) {
                                echo $aboutarr['hours']['content'];
                            } ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <!-- <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-people"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div> -->
                    <!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Skills</h2>
                <div><span>My</span> <span class="description-title">Skills</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row skills-content skills-animation">

                    <div class="col-lg-6">





                        <?php



                        $query =
                            "SELECT  *   FROM skills  LIMIT 3 ";


                        $results = mysqli_query($db, $query);

                        while ($row = $results->fetch_assoc()) { ?>


                            <div class="progress">
                                <span class="skill"><span><?php echo $row['name'] ?></span> <i
                                        class="val"><?php echo $row['percentage'] ?>%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="<?php echo $row['percentage'] ?>" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->
                            <?php

                        }



                        ?>

                    </div>

                    <div class="col-lg-6">




                        <?php



                        $query =
                            "SELECT  *   FROM skills  LIMIT 3 OFFSET 3 ";


                        $results = mysqli_query($db, $query);

                        while ($row = $results->fetch_assoc()) { ?>


                            <div class="progress">
                                <span class="skill"><span><?php echo $row['name'] ?></span> <i
                                        class="val"><?php echo $row['percentage'] ?>%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="<?php echo $row['percentage'] ?>" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div><!-- End Skills Item -->
                            <?php

                        }



                        ?>

                    </div>

                </div>

            </div>

        </section><!-- /Skills Section -->

        <!-- Interests Section -->
        <section id="interests" class="interests section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Skills</h2>
                <div><span>My</span> <span class="description-title">Skills</span></div>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">




                    <?php



                    $query =
                        "SELECT  *   FROM skills  ";


                    $results = mysqli_query($db, $query);

                    while ($row = $results->fetch_assoc()) { ?>


                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="features-item">
                                <i class="<?php echo $row['logo'] ?>" style="color: <?php echo $row['color'] ?>;"></i>
                                <h3><a href="" class="stretched-link"><?php echo $row['name'] ?></a></h3>
                            </div>
                        </div><!-- End Feature Item -->
                        <?php

                    }



                    ?>

                </div>

            </div>

        </section><!-- /Interests Section -->



        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Reference</h2>
                <div><span>Check my</span> <span class="description-title">Reference</span></div>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper" data-speed="600" data-delay="5000">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">



                        <?php



                        $query =
                            "SELECT  *   FROM reference   ORDER BY ref_order ASC";


                        $results = mysqli_query($db, $query);

                        while ($row = $results->fetch_assoc()) { ?>

                            <div class="swiper-slide">

                                <div class="testimonial-item">
                                    <div class="box">
                                        <p>Email : <a
                                                href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                                        </p>
                                        <p>Phone : <a
                                                href="tel:<?php echo $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $row['phone_num']) ?>"><?php echo $row['phone_num'] ?></a>
                                        </p>
                                    </div>

                                    <!-- <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> -->
                                    <h3><?php echo $row['name'] ?></h3>
                                    <h5 class="fst-italic"><?php echo $row['title'] ?></h5>
                                    <h4><?php echo $row['place'] ?></h4>
                                </div>
                            </div>
                            <?php

                        }



                        ?>


                    </div>

                    <div class="swiper-pagination"></div>
                </div>



            </div>

        </section><!-- /Testimonials Section -->

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