<?php 
  foreach ($informasi as $key ) {
    $nama_kegiatan = $key->nama_kegiatan;
  }

  foreach ($data_peserta as $peserta) {
    $id_peserta = $peserta->id_peserta;
    $nim = $peserta->nim;
    $nama_peserta = $peserta->nama_peserta;
    $password_peserta = $this->encryption->decrypt($peserta->password_peserta);
  }

 ?>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <br>
        <img src="<?php echo base_url(); ?>assets/academy/img/core-img/logo.png" alt="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         <div class="callout callout-info">
            <h4><?php echo $nama_kegiatan; ?></h4>
          </div>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="callout callout-info">
            <h4><?php echo $judul; ?></h4>

            <p>Anda Berhasil Melakuan Pendaftaran <?php echo $nama_kegiatan; ?>!</p>
            <p>Untuk Mengetahui Pengumuman Lulus Adminitrasi!</p>
            <p>Silakan Login dengan menggunakan NIM dan Password Anda !</p>
          </div>

          <div class="callout callout-success">
            <h4>NIM : <?php echo $nim; ?></h4>
            <h4>PASSWORD : <?php echo $password_peserta; ?></h4>
            <h4>NAMA : <?php echo $nama_peserta; ?></h4>
          </div>

          <a href="<?php echo base_url('/'); ?>">
            <button type="submit" class="btn btn-primary pull-left">Home</button>
          </a>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
  </div>