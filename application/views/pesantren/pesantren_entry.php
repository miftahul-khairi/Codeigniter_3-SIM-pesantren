<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> Form Input <span class="font-weight-semibold">Pesantren</span></h4>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none"></div>
      </div>

      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <span class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</span>
            <span class="breadcrumb-item">Pesantren</span>
            <span class="breadcrumb-item">Form Inputs</span>
          </div>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
          <!-- Flashdata -->
          <font class="mt-3"><?= $this->session->flashdata('error'); ?></font>
          <!-- /.Flashdata -->
        </div>
      </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
      <!-- Form inputs -->
      <div class="card">
        <div class="card-body">
          <form action="<?= site_url('pesantrens/proses'); ?>" id="frmuser" method="post" enctype="multipart/form-data">
            <fieldset class="mb-3">
              <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
              <input type="hidden" name="pesantrenid" value="<?= $pesantrenid; ?>">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Nama Pesantren</label>
                <div class="col-lg-10">
                  <input type="text" name="namap" id="namap" class="form-control" placeholder="Nama Pesantren..." required value="<?= $namap; ?>" inputmode="text">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                  <input type="text" name="alamat" id="alamat" placeholder="Alamat..." class="form-control" required value="<?= $alamat; ?>" inputmode="text">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">No.Hp</label>
                <div class="col-lg-10">
                  <input type="text" name="nohp" id="nohp" placeholder="Nomor Handphone..." class="form-control" required value="<?= $nohp; ?>" inputmode="text">
                </div>
              </div>
            </fieldset>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?= $tombol; ?><i class="icon-paperplane ml-2"></i></button>
              <a href="<?= site_url('kabupatens'); ?>" class="btn btn-danger">Cancel <i class="icon-icon-cancel-square"></i></a>
            </div>
          </form>
        </div>
      </div>
      <!-- /form inputs -->
    </div>
    <!-- /content area -->


    <!-- Footer -->
    <?php $this->load->view('footer'); ?>
    <!-- /footer -->

  </div>
  <!-- /inner content -->

</div>
<!-- /main content -->
