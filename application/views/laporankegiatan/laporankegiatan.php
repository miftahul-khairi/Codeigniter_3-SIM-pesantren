<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
          <h4><i class="mr-2"></i> Cetak Laporan<span class="font-weight-semibold"> Kegiatan Pesantren</span></h4>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
      </div>

      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <span class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</span>
            <span class="breadcrumb-item">Laporan Kegiatan</span>
          </div>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
          <!-- Flashdata -->
          <div class="mt-3"><?= $this->session->flashdata('pesan'); ?></div>
          <!-- /.Flashdata -->
        </div>
      </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

      <!-- Basic responsive configuration -->
      <div class="card">
        <table class="table datatable-responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Laporan</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Laporan Perbulan</td>
              <td class="text-center"><a class="btn btn-sm btn-info" data-toggle="modal" data-target="#lap_perbulan"><span class="fa fa-print"></span> Print</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Laporan Pertahun</td>
              <td class="text-center"><a class="btn btn-sm btn-info" data-target="#lap_pertahun" data-toggle="modal"><span class="fa fa-print"></span> Print</a></td>
            </tr>
          </tbody>
        </table>
        <!-- Modal Laporan Perbulan -->
        <div class="modal fade" id="lap_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <br>
              <form class="form-horizontal" method="post" action="<?php echo base_url() . 'laporankegiatans/proses' ?>" target="_blank">
                <input type="hidden" name="status" value="bulan">
                <center>
                  <h6 class="modal-title" id="myModalLabel">Cetak laporan Per Bulan</h6>
                </center>
                <div class="modal-body">
                  <div class="form-group">
                    <label class="control-label col-xs-3">Bulan</label>
                    <div class="col-xs-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" autocomplete="off" class="form-control pull-right" id="bulan" name="bln_mulai" value="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Laporan Pertahun -->
        <div class="modal fade" id="lap_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Cetak laporan Tahun</h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url() . 'laporankegiatans/proses' ?>" target="_blank">
                <input type="hidden" name="status" value="tahun">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="control-label col-xs-3">Tahun </label>
                    <div class="col-xs-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" autocomplete="off" class="form-control pull-right" id="tahun" name="tahun" value="">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <!-- /basic responsive configuration -->
    </div>
    <!-- /content area -->
    <!-- Footer -->
    <?php $this->load->view('footer'); ?>
    <!-- /footer -->
  </div>
  <!-- /inner content -->
</div>
<!-- /main content -->
