 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <?php echo $title; ?>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="callout callout-info">
       <h4><i class="icon fa fa-info"></i> Welcome!</h4>

       <p>Selamat Datang Di Aplikasi TES KARYAWAN (SITESKA)</p>
     </div>

     <?php $this->load->view('layouts/notifikasi'); ?>

     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3><?php echo $lab; ?></h3>

             <p>Formasi Lab</p>
           </div>
           <div class="icon">
             <i class="ion ion-stats-bars"></i>
           </div>
           <a href="<?php echo base_url('vacancy') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-yellow">
           <div class="inner">
             <h3><?php echo $soal; ?></h3>

             <p>Junis Soal</p>
           </div>
           <div class="icon">
             <i class="ion ion-pie-graph"></i>
           </div>
           <a href="<?php echo base_url('jenis_soal') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-red">
           <div class="inner">
             <h3><?php echo $pertanyaan; ?></h3>

             <p>Pertanyaan Soal</p>
           </div>
           <div class="icon">
             <i class="ion ion-pie-graph"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3><?php echo $peserta; ?></h3>

             <p>Data Peserta</p>
           </div>
           <div class="icon">
             <i class="ion ion-person-add"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->