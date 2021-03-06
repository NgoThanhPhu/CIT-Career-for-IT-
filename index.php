<?php
  require_once "connection.php";
  session_start();

  $sql = "SELECT * FROM citj";
  $result = $conn->query($sql);

  #Count Sinh vien
  $sqlsv = "SELECT id FROM cituser";
  $result1 = $conn->query($sqlsv);
  $sv = mysqli_num_rows($result1);

  #Count jobs
  $sqljob = "SELECT id FROM citj";
  $result2 = $conn->query($sqljob);
  $jobs = mysqli_num_rows($result2);

  #Success Jobs - Incoming

  #Count company/personal hire
  $sqle = "SELECT id FROM cite";
  $result3 = $conn->query($sqle);
  $company = mysqli_num_rows($result3);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Trang chủ | CAREER FOR IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="./images/CIT.png" type="image/x-icon">
    
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php"><img src="./images/CIT.png" class="CIT" style="float: left; padding-left: 20px;padding-top: 10px; height: auto;width: 100px"></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link active" style="font-size: 20px">Home</a></li>
              <li><a href="https://it.tdtu.edu.vn/gioi-thieu" target="_blank" style="font-size: 20px">About</a></li>
              <li><a href="https://it.tdtu.edu.vn/tin-tuc" target="_blank" style="font-size: 20px">News</a></li>
              <li><a href="contact.php" style="font-size: 20px">Contact</a></li>
              <li class="d-lg-none" ><a href="post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
              <?php
                if(isset($_SESSION['Username'])) {
              ?>
                <li class="d-lg-none"><a href="logout.php">Log Out</a></li>
              <?php
                }else{
              ?>
                <li class="d-lg-none"><a href="loginsignup.php">Log In</a></li>
              <?php
                }
              ?>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
              <?php 
                if(isset($_SESSION['Username'])) {
              ?>
                <a href="logout.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
              <?php
                }else{
              ?>
                <a href="loginsignup.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
              <?php
                }
              ?>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" id="home-section">
      <video width="100%" height="auto" autoplay loop style="position: absolute;">
        <source src="video.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="container"  style="position: relative">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center" style="position: absolute">
              <h1 class="text-white font-weight-bold" style=" margin-top:380px; text-align: center;">Do you need a job?</h1>
              <p>An website help IT student can reach job easily.</p>
            </div>
            <form method="post" class="search-jobs-form" style=" margin-top:500px;">
              <div class="row mb-5">

                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="City/Province">
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option>Part Time</option>
                    <option>Full Time</option>
                  </select>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                  <h3>Trending Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                    <li><a href="#" class="" style="font-size: 17px">Tester</a></li>
                    <li><a href="#" class="" style="font-size: 17px">Front-end Developer</a></li>
                    <li><a href="#" class="" style="font-size: 17px">Full-stack Developer</a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <a href="#next" class="scroll-button smoothscroll">
        <span class=" icon-keyboard_arrow_down"></span>
      </a>

    </section>


    <!--COUNTER-->
    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('images/banner.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white"><img src="./images/CIT.png" style="width: 100px; height: auto"></h2>
            <p class="lead text-white" style="font-weight: bold; font-size: 26px">What do we have?</p>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $sv; ?>">0</strong>
            </div>
            <span class="caption">Candidates</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $jobs; ?>"></strong>
            </div>
            <span class="caption">Jobs Posted</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="180">0</strong><span style="color: white;font-size: 30px; font-weight: bold">+</span>
            </div>
            <span class="caption">Jobs Fields</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?php echo $company; ?>"></strong>
            </div>
            <span class="caption">Companies</span>
          </div>

            
        </div>
      </div>
    </section>
    <!--END COUNTER-->
    

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Job Listed</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5">
          <!--JOBS HERE-->

          <?php 
            if($result->num_rows>0) {
              while($row = $result->fetch_assoc()) {
          
          ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                  <a href="job-single.php"></a>
                  <div class="job-listing-logo">
                    <img src="images/job_logo_1.jpg" alt="Logo" class="img-fluid">
                  </div>

                  <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      <h2><?php echo $row['TieuDe']; ?></h2>
                      <strong><?php echo $row['CongTy']; ?></strong>
                    </div>
                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                      <span class="icon-room"></span> <?php echo $row['DiaChi']; ?>
                    </div>
                    <div class="job-listing-meta">
                      <span class="badge badge-danger"><?php echo $row['CapDo']; ?></span>
                    </div>
                  </div>
                  
                </li>
          <?php 
              }
            }
          ?>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php"></a>
            <div class="job-listing-logo">
              <img src="images/job_logo_2.jpg" alt="Logo" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Software Developer</h2>
                <strong>FPT Software</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Ho Chi Minh, Ha Noi
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Senior</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php"></a>
            <div class="job-listing-logo">
              <img src="images/job_logo_3.jpg" alt="logo" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Back-end Engineer (Python)</h2>
                <strong>TMA Solutions</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Ho Chi Minh
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Fresher</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php"></a>
            <div class="job-listing-logo">
              <img src="images/job_logo_4.jpg" alt="logo" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Game Developer</h2>
                <strong>GAMELOFT</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Binh Thanh, Ho Chi Minh
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Fresher</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="job-single.php"></a>
            <div class="job-listing-logo">
              <img src="images/job_logo_5.jpg" alt="logo" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Nash Tech</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Ha Noi, Ho Chi Minh, Da Nang
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-info">Intern</span>
                <span class="badge badge-danger">Fresher</span>
                <span class="badge badge-success">Senior</span>
              </div>
            </div>
          </li>
        </ul>

        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-5 Of <?php echo $jobs; ?> Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/banner.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For A Good Job?</h2>
            <p class="mb-0 text-white lead">Create an account to easy apply.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section py-4">
      <div class="container">
  
        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Our Partner Company</h2>
                <p class="lead">These are companies with many years of experience in the field of software outsourcing</p>
              </div>
            </div>
            
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_1.jpg" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_2.jpg" alt="Image" class="img-fluid logo-2">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_3.jpg" alt="Image" class="img-fluid logo-3">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_4.jpg" alt="Image" class="img-fluid logo-4">
          </div>

          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_5.jpg" alt="Image" class="img-fluid logo-5">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_6.jpg" alt="Image" class="img-fluid logo-6">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_7.jpg" alt="Image" class="img-fluid logo-7">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="images/job_logo_8.jpg" alt="Image" class="img-fluid logo-8">
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light pt-5 testimony-full">
        
        <div class="owl-carousel single-carousel">

        
          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Không gì quan trọng hơn việc bảo đảm HIỆU QUẢ trong mọi hành động.&rdquo;</p>
                  <p><cite> &mdash; Phương châm hành động của toàn thể giảng viên, viên chức và sinh viên TDTU</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/school.png" alt="Image" class="img-fluid mb-0" style="border-radius: 5px; padding-bottom: 50px">
              </div>
            </div>
          </div>


          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;Không gì đáng quý hơn sự CÔNG BẰNG trong mọi ứng xử.&rdquo;</p>
                  <p><cite> &mdash; Phương châm hành động của toàn thể giảng viên, viên chức và sinh viên TDTU</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/school.png" alt="Image" class="img-fluid mb-0" style="border-radius: 5px; padding-bottom: 50px">
              </div>
            </div>
          </div>



          <div class="container">
            <div class="row">
              <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                  <p>&ldquo;
                    Không có gì đạo đức hơn TINH THẦN PHỤNG SỰ đất nước.&rdquo;</p>
                  <p><cite> &mdash; Phương châm hành động của toàn thể giảng viên, viên chức và sinh viên TDTU</cite></p>
                </blockquote>
              </div>
              <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/school.png" alt="Image" class="img-fluid mb-0" style="border-radius: 5px; padding-bottom: 50px">
              </div>
            </div>
          </div>

      </div>

    </section>


    <footer class="site-footer" style="background-color: #171619">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5" style="margin-left: -150px">
          <div class="col-6 col-md-6 mb-0 mb-md-0">
            <h1 style="font-size: 25px">KHOA CÔNG NGHỆ THÔNG TIN</h1>
            <hr>
            <i class="fas fa-home" style="color: white"></i><span style="padding-left: 10px; color: white">Địa chỉ: Phòng C004, Số 19 Nguyễn Hữu Thọ, P. Tân Phong, Quận 7, Tp. Hồ Chí Minh.</span><br><br>
            <i class="fas fa-phone-alt" style="color: white"></i><span style="padding-left: 10px; color: white">Điện thoại: (028) 37755046 - (028) 37755046.</span>

          </div>


          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"  style="font-size: 20px; color: white; padding: 40px"><small>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Ngô Thanh Phú, Nguyễn Phạm Mạnh Cường, Trương Võ Ngọc Châu, Khấu Minh Hà<br>Khoa Công nghệ Thông tin</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
          </div>
        </div>
      </div>
    </footer>

  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>

     
  </body>
</html>