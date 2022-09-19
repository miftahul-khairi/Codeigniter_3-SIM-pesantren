<!-- Main content -->
<div class="content-wrapper">

  <!-- Inner content -->
  <div class="content-inner">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-lg-inline">
        <div class="page-title d-flex">
          <h4><i class="mr-2"></i> List Data<span class="font-weight-semibold"> Santri</span></h4>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
        </div>
      </div>

      <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
        <div class="d-flex">
          <div class="breadcrumb">
            <span class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</span>
            <span class="breadcrumb-item">Santri</span>
            <span class="breadcrumb-item">List Data Santri</span>
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
        <?php if ($this->session->userdata('level') == 'adminpesantren') { ?>
        <div class="card-header">
          <a href="<?= site_url('santris/entry'); ?>" class="btn btn-success">Tambah Data</a>
        </div>
        <?php } ?>
        <table class="table datatable-responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pesantren</th>
              <th>NIS</th>
              <th>Nama Santri</th>
              <th>Tempat Lahir</th>
              <th style="padding:0 60px;">Tanggal Lahir </th>
              <th>Nomor Hp</th>
              <th>Alamat</th>
              <th>Pas Photo</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Admin Pesantren -->
            <?php if ($result && count($result) > 0) {
              foreach ($result as $key => $val) {
                if ($this->session->userdata('adminid') == $val['adminid']) {
                  $no = 1; ?>
            <tr>
              <td><?= $key + $no; ?></td>
              <td><?= $val['namapesantren']; ?></td>
              <td><?= $val['nis']; ?></td>
              <td><?= $val['nama']; ?></td>
              <td><?= $val['tmpLahir']; ?></td>
              <td><?= format_tanggal($val['tglLahir']); ?></td>
              <td><?= $val['nohp']; ?></td>
              <td><?= substr($val['alamat'], 0, 60) ?></td>
              <td><img src="<?= config_item('base_url') ?>asset/pasphoto/<?= $val['pasPhoto']; ?>" alt="Pas Photo Santri" style="width: 70px;height: 70px;border-radius: 10px;"></td>
              <?php if ($this->session->userdata('level') == 'adminpesantren') { ?>
              <td class="text-center">
                <div class="list-icons">
                  <div class="dropdown">
                    <a href="#" class="list-icon-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="<?= site_url('santris/entry/' . $val['id']); ?>" class="dropdown-item"><i class="icon-pencil"></i>Edit Data</a>
                      <a href="<?= site_url('santris/delete/' . $val['id']); ?>" class="dropdown-item" onclick="return confirm('Yakin ingin menghapus data ini...?')"><i class="icon-trash"></i>Delete</a>
                    </div>
                  </div>
                </div>
              </td>
              <?php } ?>
            </tr>
            <?php }
              }
            }  ?>
            <!-- Admin -->
            <?php if ($result && count($result) > 0) {
              foreach ($result as $key => $val) {
                if ($this->session->userdata('level') == 'admin') {
                  $no = 1; ?>
            <tr>
              <td><?= $key + $no; ?></td>
              <td><?= $val['namapesantren']; ?></td>
              <td><?= $val['nis']; ?></td>
              <td><?= $val['nama']; ?></td>
              <td><?= $val['tmpLahir']; ?></td>
              <td><?= format_tanggal($val['tglLahir']); ?></td>
              <td><?= $val['nohp']; ?></td>
              <td><?= substr($val['alamat'], 0, 60) ?>
              <td><img src="" alt="Pas Photo Santri"></td>
              <?php if ($this->session->userdata('level') == 'admin') { ?>
              <td class="text-center">
                <a href="<?= site_url('santris/detail_santri/' . $val['id']); ?>" class="btn btn-light">Lihat <i class="icon-eye ml-2"></i></a>
              </td>
              <?php } ?>
            </tr>
            <?php
                }
              }
            }  ?>
          </tbody>
        </table>
      </div>
      <!-- /Basic responsive configuration -->
    </div>
    <!-- /Content area -->
    <!-- Footer -->
    <?php $this->load->view('footer'); ?>
    <!-- /Footer -->
  </div>
  <!-- /Inner Content -->
</div>
