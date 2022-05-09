<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Arsip</h3>

        <div class="box-tools pull-right">
          <a href="<?= base_url('/arsip/add') ?>" type="button" class="btn btn-success btn-sm btn-flat"><i
              class="fa fa-plus"> Add</i></a>
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
              <th scope="col">#</th>
              <th scope="col">No Arsip</th>
              <th scope="col">Nama Arsip</th>
              <th scope="col">Kategori</th>
              <th scope="col">Upload</th>
              <th scope="col">Update</th>
              <th scope="col">User</th>
              <th scope="col">Departeman</th>
              <th scope="col">File</th>
              <th scope="col" style="width: 100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($arsip as $a): ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $a['no_arsip']; ?></td>
              <td><?= $a['nama_file']; ?></td>
              <td><?= $a['nama_kategori']; ?></td>
              <td><?= $a['tgl_upload']; ?></td>
              <td><?= $a['tgl_update']; ?></td>
              <td><?= $a['nama_user']; ?></td>
              <td><?= $a['nama_dep']; ?></td>
              <td><a href="arsip/viewpdf/<?= $a['id_arsip'];?>"><i class="fa fa-file-pdf-o fa-2x label-danger"></i></a>
                <p><?= $a['ukuran_file']; ?> kb</p>
              </td>
              <td class="text-center">
                <a href="/arsip/edit/<?= $a['id_arsip'];?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#delete<?= $a['id_arsip']; ?>">Delete</button>
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
<?php foreach($arsip as $a): ?>
<div class="modal fade" id="delete<?= $a['id_arsip']; ?>">
  <div class="modal-dialog modal-sm modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus User</h4>
      </div>
      <div class="modal-body">
        Yakin Hapus Data Arsip <?= $a['no_arsip']; ?>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
        <a href="arsip/delete/<?= $a['id_arsip'];?>" class="btn btn-primary">Ya</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Delete -->
<?= $this->endSection(); ?>