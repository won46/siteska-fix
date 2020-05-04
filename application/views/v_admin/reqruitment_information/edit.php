<div class="modal fade" id="myModalEdit<?php echo $id_informasi; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Informasi</h4>
      </div>
      <?php echo form_open_multipart('informasi_pendaftaran/edit/'.$id_informasi); ?>
        <?php 
            $tgl1 = ubah_tgl2($key->tgl_pendaftaran);
            $tgl2 = ubah_tgl2($key->tgl_tutup);
            $tgl3 = $tgl1." - ".$tgl2;
            $tgl4 = ubah_tgl2($key->tgl_lulus_adm);
            $tgl5 = ubah_tgl2($key->tgl_ujian_cat);
         ?>
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" value="<?php echo $key->nama_kegiatan; ?>" class="form-control" placeholder="Nama Kegiatan" required>
          </div>
          <div class="form-group">
            <label>Tanggal Pendaftaran</label>
            <input type="text" name="tgl_pendaftaran" value="<?php echo $tgl3; ?>" class="form-control" id="reservation" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lulus Administrasi</label>
            <input type="text" name="tgl_lulus_adm" value="<?php echo $tgl4; ?>" class="form-control" id="datepicker" required>
          </div>
          <div class="form-group">
            <label>Tanggal Ujian CAT</label>
            <input type="text" name="tgl_ujian_cat" value="<?php echo $tgl5; ?>" class="form-control" id="datepicker2" required>
          </div>
          <div class="form-group">
            <label>Waktu Penegerjaan Soal</label>
            <input type="text" name="waktu_pengerjaan" placeholder="Ex. 90 Menit" value="<?php echo $key->waktu_pengerjaan; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Alur Pendaftaran</label>
            <input type="file" name="alur_pendaftaran">
            <p class="help-block">.jpg max 2 Mb</p>
          </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-left">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>