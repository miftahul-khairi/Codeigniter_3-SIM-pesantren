<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
          <h4><i class="mr-2"></i> List Data<span class="font-weight-semibold"> Admin Pesantren</span></h4>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
      </div>

      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <span class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</span>
            <span class="breadcrumb-item">Admin Pesantren</span>
            <span class="breadcrumb-item">Data Admin Pesantren</span>
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
        <div class="card-header">
          <a href="<?= site_url('admin_pesantrens/entry') ?>" class="btn btn-success">Tambah Data</a>
        </div>
        <table class="table datatable-responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pesantren</th>
              <th>Nama Lengkap Admin</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No. Handphone</th>
              <th>Username</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && count($result) > 0) {
              foreach ($result as $key => $val) {
                $no = 1; ?>
            <tr>
              <td><?= $key + $no; ?></td>
              <td><?= $val['namapesantren']; ?></td>
              <td><?= $val['nama']; ?></td>
              <td><?= $val['alamat']; ?></td>
              <td><?= $val['email']; ?></td>
              <td><?= $val['nohp']; ?></td>
              <td><span class="badge badge-warning"><?= $val['username']; ?></span></td>
              <td class="text-center">
                <div class="list-icons">
                  <div class="dropdown">
                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                      <i class="icon-menu9"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="<?= site_url('admin_pesantrens/entry/' . $val['id']); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit Data</a>
                      <?php if ($this->session->userdata('level') == "admin") {
                            if ($val['id'] != '1') { ?>
                      <a href="<?= site_url('admin_pesantrens/delete/' . $val['id']); ?>" class="dropdown-item" onclick="return confirm('Mau Menghapus Data ini... ?')"><i class="icon-trash"></i> Delete</a>
                      <?php }
                          } ?>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php  }
            } else { ?>
            <p>Tidak Ada Data</p>
            <?php } ?>
          </tbody>
        </table>
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
