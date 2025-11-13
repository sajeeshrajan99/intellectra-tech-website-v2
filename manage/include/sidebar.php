<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="text-center w-100 d-block bg-white pb-3 pt-4">
    <img src="dist/img/logo.png" alt="Logo" class="brand-imag w-75 h-auto d-inline-block mb-3">
    <!-- <h6 class="my-0 text-dark border-top pt-2"><?php echo ucwords($_SESSION['SESS_ADMINNAME']) ?></h6> -->
    <hr class="mt-0">
    <a href="javascript:void(0)" style="color:#fff !important;" class="btn btn-dark rounded-pill btn-sm px-4 py-1 dynamicPopup-md" data-url="password.php" data-toggle="modal" data-target="#dynamicPopup-md">Update</a>
    <a href="sign-out" style="color:#fff !important;" class="btn btn-dark rounded-pill btn-sm px-4 py-1">Sign out</a>
  </div>
  <div class="sidebar mt-3">
    <nav class="mt-0">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard
            </p>
          </a>
        </li>
        <?php if ($_SESSION['SESS_ADMINTYP'] == 'admin') { ?>
          <!--<li class="nav-item">
            <a href="projects" class="nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>Projects
                <span class="badge badge-warning right projects"></span>
              </p>
            </a>
          </li>-->
          <!--<li class="nav-item">
            <a href="testimonials" class="nav-link">
              <i class="nav-icon fa fa-comments"></i>
              <p>Testimonials
                <span class="badge badge-warning right reviews"></span>
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="inquiries" class="nav-link">
              <i class="nav-icon fa fa-question-circle"></i>
              <p>Inquiries
                <span class="badge badge-warning right inquiries"></span>
              </p>
            </a>
          </li>
         <!-- <li class="nav-item">
            <a href="settings" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>Settings
                <span class="badge badge-warning right"></span>
              </p>
            </a>
          </li>-->
        <?php } ?>
      </ul>
    </nav>
  </div>
</aside>
<script>
  function getCount() {
    $.ajax({
      url: "actions/get/count.php",
      type: "POST",
      dataType: 'JSON',
      success: function(data) {
        var result = JSON.parse(JSON.stringify(data));
        if (result.status == 1) {
          result.data.forEach(function(data) {
            if (data.value > 0) {
              $('.' + data.id).html(data.value);
            }
          });
        }
      }
    });
  }
  $(document).ready(function() {
    getCount();
  });
  setInterval(getCount, 180000);
</script>