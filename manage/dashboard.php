<?php
require_once("include/auth.php");
$title = 'DASHBOARD';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="dist/img/favicon.png" sizes="32x32" />
  <title>
    <?php if (isset($title) && $title != '') {
      echo ucwords($title) . ' | ';
    } ?>
    Intellectra Tech
  </title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>
  <style>
    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      max-width: 100%;
      margin: 0 auto;
    }

    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      display: flex;
      flex-direction: column;
      cursor: pointer;
      text-decoration: none;
      color: inherit;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .card-accent {
      height: 6px;
      background: #3cb371;
    }

    .card-body {
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .card-icon {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      background-color: rgba(60, 179, 113, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #3cb371;
      font-size: 20px;
    }

    .card-content {
      flex: 1;
    }

    .card-label {
      font-size: 14px;
      font-weight: 600;
      color: #6c757d;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 4px;
    }

    .card-value {
      font-size: 26px;
      font-weight: 700;
      color: #212529;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php
    include("include/header.php");
    include("include/sidebar.php");
    ?>
    <div class="content-wrapper">
      <?php include("include/content-header.php"); ?>
      <section class="content">
        <div class="container-fluid">
          <div class="dashboard-grid pt-3">
            <!--<a href="projects" class="card">
              <div class="card-accent"></div>
              <div class="card-body">
                <div class="card-icon">
                  <i class="fas fa-tasks"></i>
                </div>
                <div class="card-content">
                  <div class="card-label">Projects</div>
                  <div class="card-value projects">0</div>
                </div>
              </div>
            </a>-->
            <!--<a href="testimonials" class="card">
              <div class="card-accent"></div>
              <div class="card-body">
                <div class="card-icon">
                  <i class="fas fa-comments"></i>
                </div>
                <div class="card-content">
                  <div class="card-label">Testimonials</div>
                  <div class="card-value reviews">0</div>
                </div>
              </div>
            </a>-->
            <a href="inquiries" class="card">
              <div class="card-accent"></div>
              <div class="card-body">
                <div class="card-icon">
                  <i class="fas fa-question-circle"></i>
                </div>
                <div class="card-content">
                  <div class="card-label">Inquiries</div>
                  <div class="card-value inquiries">0</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <?php include("include/footer.php"); ?>
    <?php include("include/dynamicPopup.php"); ?>
  </div>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/blockUI/jquery.blockUI.js"></script>
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="dist/js/pages/dashboard2.js"></script>
  <script src="dist/js/custom/dynamicPopup.js"></script>
</body>

</html>