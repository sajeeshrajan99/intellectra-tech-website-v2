<?php
require_once("include/auth.php");
require_once("include/dbConnect.php");
$title = 'Inquiries';
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
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/select2.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php
    include("include/header.php");
    include("include/sidebar.php");
    ?>

    <div class="content-wrapper">
      <?php include("include/content-header.php"); ?>
      <!-- <input type="hidden" id="type" value="< ?php echo $type ?>"> -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-0">
              <div class="card">
                <div class="card-body table-responsive" id="dataTableDiv">
                  <table id="dataTable" class="table table-hover table-borderless table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include("include/footer.php"); ?>
      <?php include("include/dynamicPopup.php"); ?>
    </div>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/blockUI/jquery.blockUI.js"></script>
    <script src="actions/inquiries/jscript.js?v=2"></script>
    <script src="dist/js/custom/dynamicPopup.js"></script>
    <script src="dist/js/select2.min.js"></script>
</body>

</html>