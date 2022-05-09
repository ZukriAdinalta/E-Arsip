<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Departemen</h3>

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
              <th scope="col">Departemen</th>
              <th scope="col" style="width: 100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($departemen as $k): ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $k['nama_dep']; ?></td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#edit<?= $k['id_dep']; ?>">Edit</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal"
                  data-target="#delete<?= $k['id_dep']; ?>">Delete</button>
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

<!-- modal Departemen add -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Departemen</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('departemen/add') ?>
        <div class="box-body">
          <div class="form-group">
            <label for="nama_dep">Nama Departemen</label>
            <input name="nama_dep" class="form-control" id="nama_dep" placeholder="Nama Departemen" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End modal kategori add -->

<!-- modal kategori Edit -->
<?php foreach($departemen as $k): ?>
<div class="modal fade" id="edit<?= $k['id_dep']; ?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Departemen</h4>
      </div>

      <div class="modal-body">
        <?php echo form_open('departemen/edit/' . $k['id_dep'] ) ?>
        <div class="box-body">
          <div class="form-group">
            <label for="nama_dep">Nama Departemen</label>
            <input name="nama_dep" value="<?= $k['nama_dep']; ?>" class="form-control" id="nama_dep"
              placeholder="Nama Departemen" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Edit -->


<!-- modal kategori Delete -->
<?php foreach($departemen as $k): ?>
<div class="modal fade" id="delete<?= $k['id_dep']; ?>">
  <div class="modal-dialog modal-sm modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Departemen</h4>
      </div>
      <div class="modal-body">
        Yakin Hapus Data Departemen <?= $k['nama_dep']; ?>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
        <a href="departemen/delete/<?= $k['id_dep'];?> " class="btn btn-primary">Ya</a>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>
<!-- End modal kategori Delete -->
<?= $this->endSection() ?>