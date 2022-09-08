<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selamat Datang | SIMP</title>
    <link rel="icon" type="image/x-icon" href="<?= config_item('base_url') ?>asset\logo\logaster.png" />

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= config_item('base_url') ?>template/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?= config_item('base_url') ?>template/layout_1/ltr/material/full/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?= config_item('base_url') ?>template/global_assets/js/main/jquery.min.js"></script>
    <script src="<?= config_item('base_url') ?>template/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= config_item('base_url') ?>template/layout_1/ltr/material/full/assets/js/app.js"></script>
    <!-- /theme JS files -->
    <script>
    var base_url = "<?= config_item('base_url') ?>";

    function login(e) {
      var e = e || window.event;
      $("#konfirmasi").html("<div class='alert alert-info' role='alert'>Sedang Proses...</div>");
      var data = $('#f_login').serialize();
      $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url: base_url + "logins/cek_login",
        success: function(response) {
          if (response.status == 0) {
            $("#konfirmasi").html(response.keterangan);
          } else {
            $("#konfirmasi").html(response.keterangan);
            window.location.assign(base_url + 'utamas');
          }
        }
      });
      return false;
    }
    </script>

  </head>

  <body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
      <div class="navbar-brand ml-2 ml-lg-0">
        <a href="index.html" class="d-inline-block">
          <img src="<?= config_item('base_url') ?>asset\logo\logaster.png" alt="" style="width:120px;height:50px;border-radius: 30px;">
        </a>
      </div>

    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

          <!-- Content area -->
          <div class="content d-flex justify-content-center align-items-center">

            <!-- Login form -->
            <form class="login-form" action="" id="f_login" method="post" onsubmit="return login();">
              <div class="card mb-0">
                <div class="card-body">
                  <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Selamat Datang Silahkan Login</h5>
                    <span class="d-block text-muted" id="konfirmasi"></span>
                  </div>

                  <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="form-control-feedback">
                      <i class="icon-user text-muted"></i>
                    </div>
                  </div>

                  <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="form-control-feedback">
                      <i class="icon-lock2 text-muted"></i>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>

                </div>
              </div>
            </form>
            <!-- /login form -->

          </div>
          <!-- /content area -->


          <!-- Footer -->
          <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
              <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
              </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
              <span class="navbar-text">&copy; 2021 - 2022. <a href="#">Tiga Berlian Code</a></span>
            </div>
          </div>
          <!-- /footer -->

        </div>
        <!-- /inner content -->

      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

  </body>

</html>
