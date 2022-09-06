<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Dashboard</span>
          </div>

          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
      </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
      <!-- Main charts -->
      <div class="row">
        <div class="col-xl-12">
          <!-- Traffic sources -->
          <div class="card">
            <div class="card-header header-elements-inline">
              <!-- <h6 class="card-title">Traffic sources</h6> -->
            </div>

            <div class="card-body py-0">
              <div class="row">
                <div class="col-sm-3">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3">
                      <i class="icon-map4"></i>
                    </a>
                    <div>
                      <div class="font-weight-semibold">Kabupaten</div>
                      <span class="text-muted">2,349 avg</span>
                    </div>
                  </div>
                  <div class="w-75 mx-auto mb-3" id="new-visitors"></div>
                </div>
                <div class="col-sm-3">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3">
                      <i class="icon-map5"></i>
                    </a>
                    <div>
                      <div class="font-weight-semibold">Kacamatan</div>
                      <span class="text-muted">2,349 avg</span>
                    </div>
                  </div>
                  <div class="w-75 mx-auto mb-3" id="new-visitors"></div>
                </div>

                <div class="col-sm-3">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <a href="#" class="btn bg-transparent border-warning text-warning rounded-pill border-2 btn-icon mr-3">
                      <i class="icon-folder-plus2"></i>
                    </a>
                    <div>
                      <div class="font-weight-semibold">Desa</div>
                      <span class="text-muted">08:20 avg</span>
                    </div>
                  </div>
                  <div class="w-75 mx-auto mb-3" id="new-sessions"></div>
                </div>
                <div class="col-sm-3">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <a href="#" class="btn bg-transparent border-indigo text-indigo rounded-pill border-2 btn-icon mr-3">
                      <i class="icon-people"></i>
                    </a>
                    <div>
                      <div class="font-weight-semibold">Case</div>
                      <span class="text-muted"><span class="badge badge-mark border-success mr-2"></span> 5,378 avg</span>
                    </div>
                  </div>
                  <div class="w-75 mx-auto mb-3" id="total-online"></div>
                </div>
              </div>

            </div>
            <div class="chart position-relative" id="traffic-sources"></div>
          </div>
          <!-- /traffic sources -->

        </div>
      </div>
      <!-- /main charts -->
    </div>
    <!-- /content area -->
    <!-- Footer -->
    <?php $this->load->view('footer') ?>
    <!-- /footer -->

  </div>
  <!-- /inner content -->

</div>
<!-- /main content -->
