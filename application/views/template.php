<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= config_item('base_url') ?>asset\logo\logaster.png" />

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= config_item('base_url') ?>template/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= config_item('base_url') ?>template\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= config_item('base_url') ?>template/layout_1/ltr/material/full/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="<?= config_item('base_url') ?>asset/select2-master/dist/css/select2.min.css" />
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= config_item('base_url') ?>template\global_assets\dist\css\bootstrap-datepicker.min.css">

    <?= isset($_style) ? $_style : ""; ?>
  </head>
  <?php $url_1 = $this->uri->segment('1'); ?>

  <body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
      <div class="d-flex flex-1 d-lg-none">
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
          <i class="icon-paragraph-justify3"></i>
        </button>

        <button data-target="#navbar-search" type="button" class="navbar-toggler" data-toggle="collapse">
          <i class="icon-search4"></i>
        </button>
      </div>

      <div class="navbar-brand text-center text-lg-left">
        <a href="<?= site_url() ?>" class="d-inline-block">
          <img src="<?= config_item('base_url') ?>asset\logo\logaster.png" class="d-none d-sm-block" alt="Logo SIMP" style="width:120px;height:50px;border-radius: 30px;">
          <img src="<?= config_item('base_url') ?>asset\logo\logaster.png" class="d-sm-none" alt="Logo SIMP">
        </a>
      </div>

      <div class="navbar-collapse collapse flex-lg-1 mx-lg-3 order-2 order-lg-1" id="navbar-search">
        <div class="navbar-search d-flex align-items-center py-2 py-lg-0">
        </div>
      </div>

      <div class="d-flex justify-content-end align-items-center flex-1 flex-lg-0 order-1 order-lg-2">
        <ul class="navbar-nav flex-row">
          <li class="nav-item">
            <div class="dropdown">
              <?php if ($this->session->userdata('gambar') == 'no-image.png') { ?>
              <a href="#" class="list-icon-item navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
                <img src="<?= config_item('base_url') ?>asset\profile.png" class="img-fluid rounded-circle shadow-sm" width="50" height="50" alt="profile">
              </a>
              <?php } else { ?>
              <a href="#" class="list-icon-item navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
                <img src="<?= config_item('base_url') ?>asset/Gadmin/<?= $this->session->userdata('gambar') ?>" class="img-fluid rounded-circle shadow-sm" width="50" height="50" alt="User Image">
              </a>
              <?php } ?>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item"><i class="icon-profile"></i>Akun Saya</a>
                <a href="<?= site_url('logins/logout') ?>" class="dropdown-item"><i class="icon-switch"></i>Log out</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

      <!-- Main sidebar -->
      <div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">

        <!-- Sidebar content -->
        <div class="sidebar-content  bg-info">

          <!-- User menu -->
          <div class="sidebar-section">
            <div class="sidebar-user-material">
              <div class="sidebar-section-body bg-info">
                <div class="d-flex">
                  <div class="flex-1">
                  </div>
                  <?php if ($this->session->userdata('gambar') == 'no-image.png') { ?>
                  <a href="#" class="flex-1 text-center">
                    <img src="<?= config_item('base_url') ?>asset\profile.png" class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt="profile">
                  </a>
                  <?php } else { ?>
                  <a href="#" class="flex-1 text-center">
                    <img src="<?= config_item('base_url') ?>asset/Gadmin/<?= $this->session->userdata('gambar') ?>" class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt="User Image">
                  </a>
                  <?php } ?>
                  <div class="flex-1 text-right">
                    <button type="button" class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                      <i class="icon-transmission"></i>
                    </button>

                    <button type="button" class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                      <i class="icon-cross2"></i>
                    </button>
                  </div>
                </div>

                <div class="text-center">
                  <h6 class="mb-0 text-white text-shadow-dark mt-3 text-uppercase"><?= $this->session->userdata('username') ?></h6>
                  <span class="font-size-sm text-white text-shadow-dark"><?= $this->session->userdata('email'); ?></span>
                </div>
              </div>

              <div class="sidebar-user-material-footer">
                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle bg-info" data-toggle="collapse"><span>Akun Saya</span></a>
              </div>
            </div>

            <div class="collapse border-bottom" id="user-nav">
              <ul class="nav nav-sidebar">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="icon-user-plus"></i>
                    <span>My profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="icon-cog5"></i>
                    <span>Account settings</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="icon-switch2"></i>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /user menu -->


          <!-- Main navigation -->
          <div class="sidebar-section">
            <ul class="nav nav-sidebar">

              <!-- Main -->
              <li class="nav-item-header">
                <div class="text-uppercase font-size-xs line-height-xs mt-1"></div> <i class="icon-menu" title="Main"></i>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('utamas'); ?>" class="nav-link <?= $url_1 == "" ? "active" : ""; ?>">
                  <i class="icon-home4"></i>
                  <span>
                    Dashboard
                  </span>
                </a>
              </li>
              <!-- Tables -->
              <li class="nav-item-header">
                <div class="text-uppercase font-size-xs line-height-xs"></div> <i class="icon-menu" title="Tables"></i>
              </li>
              <?php if ($this->session->userdata('level') == 'admin') { ?>
              <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-home9"></i> <span>Pesantren</span>
                </a>
                <ul class="nav nav-group-sub <?= $url_1 == "#" ? "active" : ""; ?>" data-submenu-title="Responsive tables">
                  <li class="nav-item"><a href="<?= site_url('pesantrens'); ?>" class="nav-link"><i class="icon-arrow-right6"></i>Management Data Pesantren</a></li>
                </ul>
              </li>

              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-collaboration"></i> <span>Admin Pesantren</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('admin_pesantrens'); ?>" class="nav-link"><i class="icon-arrow-right6"></i>Data Admin Pesantren</a></li>
                </ul>
              </li>
              <?php } ?>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-users4"></i> <span>Santri</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('santris'); ?>" class="nav-link"><i class="icon-arrow-right6"></i> Data Santri</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="fa fa-award"></i> <span>Santri Berprestasi</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('santri_berprestasis') ?>" class="nav-link"><i class="icon-arrow-right6"></i> Data Santri Berprestasi</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span>Alumni</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('alumnis'); ?>" class="nav-link"><i class="icon-arrow-right6"></i> Data Alumni</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-calendar3"></i> <span>Kegiatan</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('kegiatans'); ?>" class="nav-link"><i class="icon-arrow-right6"></i> List Kegiatan</a></li>
                </ul>
              </li>
              <?php if ($this->session->userdata('level') == 'adminpesantren') { ?>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-printer"></i> <span>Laporan</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('laporankegiatans'); ?>" class="nav-link"><i class="icon-arrow-right6"></i> Laporan Kegiatan</a></li>
                </ul>
              </li>
              <?php } ?>
              <?php if ($this->session->userdata('level') == 'admin') { ?>
              <li class="nav-item nav-item-submenu <?= $url_1 == "#" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-printer"></i> <span>Laporan Admin</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('#'); ?>"><a href="<?= site_url('#'); ?>" class="nav-link"><i class="icon-arrow-right6"></i> Laporan Kegiatan Pesantren</a></li>
                </ul>
              </li>
              <li class="nav-item nav-item-submenu <?= $url_1 == "admins" ? "active" : ""; ?>">
                <a href="#" class="nav-link"><i class="icon-crown"></i> <span>Admin Management</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Responsive tables">
                  <li class="nav-item <?= site_url('admins'); ?>"><a href="<?= site_url('admins'); ?>" class="nav-link"><i class="icon-arrow-right6"></i>List Data Admin</a></li>
                </ul>
              </li>
              <?php } ?>
              <!-- /tables -->
              <!-- /main -->
            </ul>
          </div>
          <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

      </div>
      <!-- /main sidebar -->


      <?= $contents; ?>

    </div>
    <!-- /page content -->
    <!-- Core JS files -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<? config_item('base_url') ?>template/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="<? config_item('base_url') ?>template/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="<? config_item('base_url') ?>template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="<? config_item('base_url') ?>template/global_assets/js/plugins/pickers/daterangepicker.js"></script>

    <script src="<?= config_item('base_url') ?>template/layout_1/ltr/material/full/assets/js/app.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/lines.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/areas.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/donuts.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/bars.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/progress.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/pies.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_charts/pages/dashboard/light/bullets.js"></script>
    <!-- /theme JS files -->
    <!-- Theme JS files -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="<?= config_item('base_url') ?>/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>

    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_pages/datatables_responsive.js"></script>
    <!-- /theme JS files -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>

    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <!-- Add JS for Notification -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/notifications/noty.min.js"></script>

    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_pages/extra_jgrowl_noty.js"></script>
    <!-- Add JS External -->
    <script src="<?= config_item('base_url') ?>template/global_assets/addjs/addjs.js"></script>
    <!-- Load plugin -->
    <script src="<?= config_item('base_url') ?>/global_assets/js/plugins/notifications/bootbox.min.js"></script>

    <!-- Maps -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk"></script> -->
    <!-- <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_maps/google/basic/basic.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_maps/google/basic/geolocation.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_maps/google/basic/coordinates.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_maps/google/basic/click_event.js"></script> -->
    <!-- /Maps -->
    <script src="<?= config_item('base_url') ?>asset/select2-master/dist/js/select2.min.js"></script>
    <!-- datepicker -->
    <script src="<?= config_item('base_url') ?>template\global_assets\dist\js\bootstrap-datepicker.min.js"></script>
    <!-- CKeditor -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/demo_pages/editor_ckeditor_material.js"></script>
    <script>
    var base_url = "<?= config_item('base_url') ?>";
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })

      //Date picker
      $('#datepicker').datepicker({
        orientation: "bottom auto",
        autoclose: true,
        format: 'dd-mm-yyyy'
      });

      $('#tgl_mulai').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });

      $('#tgl_akhir').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });

      $('#bln_mulai').datepicker({
        format: "yyyy-mm",
        minViewMode: 1,
        autoclose: true
      });

      $('#bln_akhir').datepicker({
        format: "yyyy-mm",
        minViewMode: 1,
        autoclose: true
      });

      $('#bulan').datepicker({
        format: "yyyy-mm",
        minViewMode: 1,
        autoclose: true
      });

      $('#tahun_mulai').datepicker({
        format: "yyyy",
        minViewMode: 2,
        autoclose: true
      });

      $('#tahun_akhir').datepicker({
        format: "yyyy",
        minViewMode: 2,
        autoclose: true
      });

      $('#tahun_mulaia').datepicker({
        format: "yyyy",
        minViewMode: 2,
        autoclose: true
      });

      $('#tahun_akhira').datepicker({
        format: "yyyy",
        minViewMode: 2,
        autoclose: true
      });

      $('#tahun').datepicker({
        format: "yyyy",
        minViewMode: 2,
        autoclose: true
      });

      $('.separator_uang').maskMoney({
        precision: 0
      });

      $('.timepicker').timepicker({
        showInputs: false
      });

    });
    </script>
    <?= isset($_scripts) ? $_scripts : ""; ?>
  </body>

</html>
