<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data Arsip</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="/arsip/update/<?= $arsip['id_arsip']?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ; ?>
          <input type="hidden" name="arsipLama" value="<?= $arsip['file_arsip'] ?>">
          <div class="form-group">
            <label for="no_arsip">No Arsip</label>
            <input type="text" name="no_arsip" class="form-control" id="no_arsip" value="<?= $arsip['no_arsip']?>"
              readonly>
          </div>

          <div class="form-group">
            <label for="nama_file">Nama Arsip</label>
            <input type="text" name="nama_file" class="form-control" id="nama_file" placeholder="Nama Arsip"
              value="<?= $arsip['nama_file']?>">
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name=" deskripsi" id="deskripsi" class="form-control"
              rows=" 3"><?=$arsip['deskripsi']?></textarea>
          </div>

          <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" class="form-control" id="id_kategori">
              <?php foreach($kategori as $k): ?>
              <?php if($k['id_kategori'] == $arsip['id_kategori']): ?>
              <option value="<?= $k['id_kategori'] ?>" selected><?= $k['nama_kategori'] ?></option>
              <?php else: ?>
              <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="file_arsip">File Arsip</label>
            <input type="file" name="file_arsip" id="file_arsip" class="form-control" placeholder="file_arsip">
            <label class="text-danger">*File Harus Format .PDF</label>
          </div>
          <br>
          <div class="form-group">
            <a href="<?= base_url('index.php/arsip') ?>" class="btn btn-warning "> Kembali </a>
            <button type="submit" class="btn btn-primary "> Update </button>
          </div>

        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <div class="col-md-3"></div>
</div>
<?= $this->endSection() ?>