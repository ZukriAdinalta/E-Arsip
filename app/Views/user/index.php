<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data User</h3>

        <div class="box-tools pull-right">
          <a href="<?= base_url('/user/add') ?>" type="button" class="btn btn-success btn-sm btn-flat"><i
              class="fa fa-plus">
              Add</i></a>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if(session()->getFlashdata('pesan')){
          echo '<div class="alert alert-success alert-dismissible pesanKategori">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Success! - ';
          echo session()->getFlashdata('pesan');
          echo '</h4></div>';
        }
      ?>
        <table id="example1" class="table table-striped ">
          <thead>
            <tr>
              <th scope="col" style="width: 50px">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col">Departemen</th>
              <th scope="col">foto</th>
              <th scope="col" style="width: 100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($users as $user): ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $user['nama_user']; ?></td>
              <td><?= $user['email']; ?></td>
              <td><?php if($user['level'] == 1){echo 'Admin';}else {echo 'User';} ?></td>
              <td><?= $user['nama_dep']; ?></td>
              <td><img src="<?= base_url('img/'. $user['foto'])  ?>" alt="" style="width: 50px;"></td>
              <td class="text-center">
                <a href="user/edit/<?= $user['id_user'];?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#delete<?= $user['id_user']; ?>">Delete</button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>


<!-- modal kategori Delete -->
<?php foreach($users as $user): ?>
<div class="modal fade" id="delete<?= $user['id_user']; ?>">
  <div class="modal-dialog modal-sm modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus User</h4>
      </div>
      <div class="modal-body">
        Yakin Hapus Data User <?= $user['nama_user']; ?>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
        <a href="user/delete/<?= $user['id_user'];?>" class="btn btn-primary">Ya</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Delete -->
<?= $this->endSection(); ?>