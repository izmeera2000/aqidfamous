<?php include "app/server.php"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "layouts/head.php" ?>


<body>


  <?php include "layouts/header.php" ?>

  <?php include "layouts/sidebar.php" ?>


  <main id="main" class="main">

    <?php include "layouts/pagetitle.php" ?>


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-12">
          <div class="row">

             

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card" id ="click_card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="year">This Year</a></li>
                  </ul>
                </div>
 
                <div class="card-body">
                  <h5 class="card-title" id="card_title">Clicks <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="count">1244</h6>
                      <span class="text-danger small pt-1 fw-bold" id="percentage">12%</span> <span
                        class="text-muted small pt-2 ps-1" id="incordec">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card" id ="visitor_card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="year">This Year</a></li>
                  </ul>
                </div>
 
                <div class="card-body">
                  <h5 class="card-title" id="card_title">Visitor <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="count">1244</h6>
                      <span class="text-danger small pt-1 fw-bold" id="percentage">12%</span> <span
                        class="text-muted small pt-2 ps-1" id="incordec">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card" id ="report_card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

 
                    
                    <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="year">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title" id="card_title">Reports <span>| Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

 

          </div>
        </div><!-- End Left side columns -->

 
      </div>
    </section>

  </main><!-- End #main -->


  <?php include "layouts/footer.php" ?>


  <?php include "layouts/script.php" ?>


</body>

</html>