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
            <span class="breadcrumb-item">Kegiatan</span>
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
          <form action="<?= site_url('kegiatans/proses'); ?>" id="frmuser" method="post" enctype="multipart/form-data">
            <fieldset class="mb-3">
              <legend class="text-uppercase font-size-sm font-weight-bold border-bottom"></legend>
              <input type="hidden" name="kegiatanid" value="<?= $kegiatanid ?>">
              <div class="form-group form-group-floating row">
                <label class="col-form-label col-lg-2">Judul Kegiatan</label>
                <div class="col-lg-10">
                  <div class="position-relative">
                    <textarea name="judul" id="judul" placeholder="Masukkan Judul Kegiatan..." class="form-control form-control-filled" required><?= $judul; ?></textarea>
                    <label class="label-floating">Judul Kegiatan</label>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-floating row">
                <label class="col-form-label col-lg-2">Deskripsi Kegiatan</label>
                <div class="col-lg-10">
                  <div class="position-relative">
                    <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Kegiatan..." class="form-control form-control-filled" required><?= $deskripsi; ?></textarea>
                    <label class="label-floating">Deskripsi Kegiatan</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Isi</label>
                <div class="col-lg-10">
                  <textarea name="isi" id="editor-full" rows="4" cols="4"><?= $isi; ?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Tanggal</label>
                <div class="col-lg-10">
                  <input type="text" name="tanggal" id="datepicker" class="form-control" placeholder="Masukkan Tanggal Kegiatan..." required value="<?= explode_tanggal($tanggal) ?>">
                </div>
              </div>
              <?php if ($gambar) { ?>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label font-weight-semibold">Preview</label>
                <div class="col-lg-2">
                  <img src="<?= $gambar ?>" class="file-preview-image kv-preview-data" title="" alt="" style="width: 150px; height: 150px; max-width: 100%; max-height: 100%; image-orientation: from-image;">
                </div>
              </div>
              <?php } ?>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label font-weight-semibold">Upload Gambar:</label>
                <div class="col-lg-10">
                  <input type="file" name="gambar" id="gambar" class="file-input" data-browse-on-zone-click="true" multiple="multiple" data-fouc accept=".jpg,.png">
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
