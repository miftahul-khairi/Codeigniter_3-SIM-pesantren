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
          <form action="<?= site_url('santris/proses'); ?>" id="frmuser" method="post" enctype="multipart/form-data">
            <fieldset class="mb-3">
              <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
              <input type="hidden" name="santriid" value="<?= $santriid ?>">
              <!-- <div class="form-group row">
                <label class="col-form-label col-lg-2">Pilih Pesantren</label>
                <div class="col-lg-10">
                  <?= form_dropdown('pesantrenid', $dropdown_pesantren, $pesantrenid, 'id="pesantrenid" class="form-control" required="required"'); ?>
                </div>
              </div> -->
              <div class="form-group row">
                <label class="col-form-label col-lg-2">NIS</label>
                <div class="col-lg-10">
                  <input type="text" name="nis" id="nis" placeholder="NIS..." class="form-control" required value="<?= $nis; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Nama</label>
                <div class="col-lg-10">
                  <input type="text" name="nama" id="nama" placeholder="Masukkan Nama..." class="form-control" required value="<?= $nama; ?>" inputmode="text">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Tempat Lahir</label>
                <div class="col-lg-10">
                  <input type="text" name="tmpLahir" id="tmpLahir" placeholder="Masukkan Tempat Lahir..." class="form-control" required value="<?= $tmpLahir ?>" inputmode="text">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Tanggal Lahir</label>
                <div class="col-lg-10">
                  <input type="text" name="tglLahir" id="datepicker" class="form-control" placeholder="Masukkan Tanggal Lahir..." required value="<?= explode_tanggal($tglLahir) ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">No.Hp</label>
                <div class="col-lg-10">
                  <input type="tel" name="nohp" id="nohp" placeholder="Masukkan Nomor HandPhone..." class="form-control" required value="<?= $nohp; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                  <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat..." class="form-control" required rows="4" cols="50">
                  <?= $alamat; ?>
                  </textarea>
                </div>
              </div>
              <?php if ($pasPhoto) { ?>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label font-weight-semibold">Preview</label>
                <div class="col-lg-2">
                  <img src="<?= $pasPhoto ?>" class="file-preview-image kv-preview-data" title="" alt="" style="width: 150px; height: 150px; max-width: 100%; max-height: 100%; image-orientation: from-image;">
                </div>
              </div>
              <?php } ?>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label font-weight-semibold">Upload Gambar:</label>
                <div class="col-lg-10">
                  <input type="file" name="pasPhoto" id="pasPhoto" class="file-input" data-browse-on-zone-click="true" multiple="multiple" data-fouc accept=".jpg,.png">
                </div>
              </div>
            </fieldset>
            <div class="text-center">
              <button type="submit" class="btn btn-primary"><?= $tombol; ?><i class="icon-paperplane ml-2"></i></button>
              <a href="<?= site_url('santris'); ?>" class="btn btn-danger">Cancel <i class="icon-icon-cancel-square"></i></a>
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
