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
      <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-body">
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add</button>
            </div>
            <div class="box-footer">
              <?php $this->load->view('layouts/notifikasi'); ?>
            </div>
          </div>

          <?php include 'add.php';  ?>
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tabel <?php echo $title; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($data_panitia as $key) {
                        $id_admin = $key->id_admin;
                     ?>
                  <tr>
                    <td><?php echo $no; ?>.</td>
                    <td><?php echo $key->nama; ?></td>
                    <td><?php echo $key->username; ?></td>
                    <td><?php echo $this->encryption->decrypt($key->password); ?></td>
                    <td>

                      <a data-toggle="tooltip" data-placement="top" title="Edit">
                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModalEdit<?php echo $id_admin; ?>"><i class="fa fa-edit"></i></button>
                      </a>
                      
                      <a href="<?php echo base_url('data_panitia/delete/'.$id_admin); ?>" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Hapus Data Panitia <?php echo $key->nama; ?> ?')">
                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                      </a>

                    </td>
                  </tr>
                  <?php 
                    $no++;
                    include 'edit.php'; 
                    }
                   ?>
                  </tbody>
                </table>
            </div>
        </div>
      </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->