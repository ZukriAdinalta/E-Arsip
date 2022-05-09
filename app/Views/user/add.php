<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data User</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="/user/save" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ; ?>
          <div class="form-group">
            <label for="nama_user">Nama User</label>
            <input type="text" name="nama_user"
              class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" id="nama_user"
              placeholder="Nama User" autofocus value="<?= old('nama_user'); ?>">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('nama_user'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email"
              class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email"
              placeholder="Email" value="<?= old('email'); ?>">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('email'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"
              class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('password'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="password2">Konfirmasi Password</label>
            <input type="password" name="password2"
              class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('password2'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="level">Status</label>
            <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?> "
              id="level">
              <option value="">-- Pilih Status --</option>
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('level'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="id_dep">Departemen</label>
            <select name="id_dep" class="form-control <?= ($validation->hasError('id_dep')) ? 'is-invalid' : ''; ?>"
              id="id_dep">
              <option value="">-- Pilih Departeman --</option>
              <?php foreach($departemen as $dep): ?>
              <option value="<?= $dep['id_dep']; ?>"><?= $dep['nama_dep']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('id_dep'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
              name="foto" id="foto" placeholder="foto">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('foto'); ?>
            </div>
          </div>

          <div class="form-group">
            <a href="<?= base_url('index.php/user') ?>" class="btn btn-warning "> Kembali </a>
            <button type="submit" class="btn btn-primary "> Daftar </button>
          </div>


        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <div class="col-md-3"></div>
</div>
<?= $this->endSection() ?>