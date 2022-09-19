<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <?= $subtitle; ?></span></h4>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
        </div>
      </div>

      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <span class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</span>
            <span class="breadcrumb-item">Santri</span>
            <span class="breadcrumb-item"><?= $subtitle; ?></span>
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
          <form action="<?= site_url('santri_berprestasis/proses'); ?>" id="frmuser" method="post" enctype="multipart/form-data">
            <fieldset class="mb-3">
              <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
              <input type="hidden" name="santriberprestasiid" value="<?= $santriberprestasiid; ?>">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Pilih Santri Berprestasi</label>
                <div class="col-lg-10">
                  <?= form_dropdown('santriid', $dropdown_santri, $santriid, 'id="santriid" class="form-control" required="required"'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Keterangan</label>
                <div class="col-lg-10">
                  <textarea name="keterangan" id="keterangan" placeholder="Masukkan Keterangan..." class="form-control" required rows="4" cols="50">
                  <?= $keterangan; ?>
                  </textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Isi</label>
                <div class="col-lg-10">
                  <!-- <textarea type="text" name="isi" id="isi" placeholder="Masukkan Isi..." class="form-control" required value="" inputmode="text"> -->
                  <textarea name="isi" id="isi" placeholder="Masukkan Isi..." class="form-control" required rows="4" cols="50">
                  <?= $isi; ?>
                  </textarea>
                </div>
              </div>
            </fieldset>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?= $tombol; ?><i class="icon-paperplane ml-2"></i></button>
              <a href="<?= site_url('santri_berprestasis'); ?>" class="btn btn-danger">Cancel <i class="icon-icon-cancel-square"></i></a>
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
