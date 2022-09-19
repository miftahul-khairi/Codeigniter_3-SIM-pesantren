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
      <h6 class="font-weight-semibold">Nama Pesantren</h6>
      <p><?= $detail['namapesantren']; ?></p>
      <hr>
      <h6 class="font-weight-semibold">NIS</h6>
      <p><?= $detail['nis']; ?></p>
      <h6 class="font-weight-semibold">Nama Santri</h6>
      <p><?= $detail['nama']; ?></p>
      <h6 class="font-weight-semibold">Tempat Lahir</h6>
      <p><?= $detail['tmpLahir']; ?></p>
      <h6 class="font-weight-semibold">No.Hp</h6>
      <p><?= $detail['nohp']; ?></p>
      <h6 class="font-weight-semibold">Alamat</h6>
      <p><?= $detail['alamat']; ?></p>
      <h6 class="font-weight-semibold">Pas Photo</h6>
      <p><img src="" alt="Pas Photo"></p>
    </div>

    <div class="modal-footer pt-3">
      <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
<!-- </div> -->
<!-- /scrollable modal -->
