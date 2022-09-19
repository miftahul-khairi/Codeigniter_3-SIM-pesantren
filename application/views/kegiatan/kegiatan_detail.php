<!-- <?php var_dump($detail); ?> -->
<!-- Scrollable modal -->
<!-- <div id="modal_scrollable" class="modal fade" tabindex="-1"> -->
<div class="modal-dialog modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header pb-3 bg-info text-white">
      <h5 class="modal-title">Santri Berprestasi</h5>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="modal-body py-0">
      <h6 class="font-weight-semibold">Nama Santri</h6>
      <p><?= $detail['judul']; ?></p>
      <hr>
      <h6 class="font-weight-semibold">Keterangan</h6>
      <p><?= $detail['deskripsi']; ?></p>
      <h6 class="font-weight-semibold">Isi</h6>
      <p><?= $detail['isi']; ?></p>
      <h6 class="font-weight-semibold">Tanggal</h6>
      <p><?= $detail['tanggal']; ?></p>
      <h6 class="font-weight-semibold">Gambar</h6>
      <img src="" alt="Gambar Kegiatan">
    </div>

    <div class="modal-footer pt-3">
      <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
<!-- </div> -->
<!-- /scrollable modal -->
