<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Kategori</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#modal-default"
            id="add"><i class="fa fa-plus"> Add</i></button>
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
              <th scope="col" style="width: 80px">#</th>
              <th scope="col">Kategori</th>
              <th scope="col" style="width: 100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($kategori as $k): ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $k['nama_kategori']; ?></td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#edit<?= $k['id_kategori']; ?>">Edit</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#delete<?= $k['id_kategori']; ?>">Delete</button>
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

<!-- modal kategori add -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Kategori</h4>
      </div>

      <div class="modal-body">
        <form action="/kategori/edit/" method="POST">
          <?= csrf_field() ; ?>
          <div class="box-body">
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama Kategori" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End modal kategori add -->

<!-- modal kategori Edit -->
<?php foreach($kategori as $k): ?>
<div class="modal fade" id="edit<?= $k['id_kategori']; ?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>

      <div class="modal-body">
        <form action="/kategori/edit/<?= $k['id_kategori'];?>" method="POST">
          <div class="box-body">
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input name="nama_kategori" value="<?= $k['nama_kategori']; ?>" class="form-control" id="nama_kategori"
                placeholder="Nama Kategori" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Edit -->


<!-- modal kategori Delete -->
<?php foreach($kategori as $k): ?>
<div class="modal fade" id="delete<?= $k['id_kategori']; ?>">
  <div class="modal-dialog modal-sm modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body">
        Yakin Hapus Data Kategori <?= $k['nama_kategori']; ?>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
        <a href="kategori/delete/<?= $k['id_kategori'];?> " class="btn btn-primary">Ya</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Delete -->
<?= $this->endSection(); ?>