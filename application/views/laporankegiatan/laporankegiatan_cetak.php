<head>
  <title>Cetak Data Laporan Kegiatan</title>
  <script language="Javascript1.2">
  function printpage() {
    window.print();
  }
  </script>
</head>

<body onLoad="printpage()">
  <div id="laporan">
    <table align="center" style="width:1000px; border-bottom:6px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
    </table>
    <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
      <tr>
        <td colspan="2" style="width:800px; padding-left:20px;">
          <center>
            <h3>Laporan Kegiatan</h3>
            <br />
            <h4><?= format_tanggal($tahun) ?> <?= format_tanggal($bln_mulai) ?></h4>
          </center>
        </td>
      </tr>
    </table>

    <table border="0" align="center" style="width:900px;border:none;">
      <tr>
        <th style="text-align:left"></th>
      </tr>
    </table>
    <table border="1" align="center" style="width:900px;margin-bottom:20px;">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Judul Kegiatan</th>
          <th>Deskripsi</th>
          <th>Isi</th>
          <th>Gambar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result && count($result) > 0) {
          foreach ($result as $key => $val) {
            if ($this->session->userdata('adminid') == $val['adminid']) { ?>
        <tr>
          <td><?= $key + 1; ?></td>
          <td><?= $val['judul'] ?></td>
          <td><?= $val['deskripsi'] ?></td>
          <td><?= $val['isi'] ?></td>
          <td><?= $val['gambar'] == "" ? "-" : '<img src="' . config_item('base_url') . "asset/gkegiatan/" . $val['gambar'] . '" width="70px">'; ?></td>
        </tr>
        <?php
            } else {
              echo "<tr align='center'><td colspan='8'>== Data Kegiatan Kosong ==</td></tr>";
            } ?>
        <?php }
        } else {
          echo "<tr align='center'><td colspan='8'>== Data Kosong ==</td></tr>";
        } ?>
      </tbody>
      <tfoot>
      </tfoot>
      <!-- </table> -->
      <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
          <td></td>
      </table>
      <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>

        </tr>
        <tr>
          <td align="right"></td>
        </tr>

        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>
        <tr>


      </table>
      <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <td width="65"></td>
        <td width="50%">
          <center>
            <?= date("d M Y", time()); ?><br>
            SIMP
            <br><br><br><br><br><br>
            <br>
          </center>
        </td>
      </table>
    </table>
  </div>
</body>

</html>
