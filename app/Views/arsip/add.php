<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Arsip</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <form action="/arsip/save" method="POST" enctype="multipart/form-data">
          <?php  helper('text');
          $no_arsip = date('Ymd') . '-' . random_string('numeric', 3);
          ?>
          <div class="form-group">
            <label for="no_arsip">No Arsip</label>
            <input type="text" name="no_arsip" class="form-control" value=<?= $no_arsip ?> id="no_arsip" readonly>
          </div>

          <div class="form-group">
            <label for="nama_file">Nama Arsip</label>
            <input type="text" name="nama_file"
              class="form-control <?= ($validation->hasError('nama_file')) ? 'is-invalid' : ''; ?>" id="nama_file"
              placeholder="Nama Arsip">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('nama_file'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"
              class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="3"></textarea>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('deskripsi'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori"
              class="form-control <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>" id="id_kategori">
              <option value="">-- Pilih Kategori --</option>
              <?php foreach($kategori as $k): ?>
              <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('id_kategori'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="file_arsip">File Arsip</label>
            <input type="file" name="file_arsip"
              class="form-control <?= ($validation->hasError('file_arsip')) ? 'is-invalid' : ''; ?>" id="file_arsip"
              placeholder="file_arsip">
            <label class="text-danger">*File Harus Format .PDF</label>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('file_arsip'); ?>
            </div>
          </div>

          <div class="form-group">
            <a href="<?= base_url('index.php/user') ?>" class="btn btn-warning "> Kembali </a>
            <button type="submit" class="btn btn-primary "> Simpan </button>
          </div>


        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <div class="col-md-3"></div>
</div>
<?= $this->endSection() ?>