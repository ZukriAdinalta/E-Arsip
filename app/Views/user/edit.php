<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="box box-success box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data User</h3>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="/user/update/<?= $users['id_user']; ?>" method="POST" enctype="multipart/form-data">
          <?= csrf_field() ; ?>
          <input type="hidden" name="fotoLama" value="<?= $users['foto'] ?>">
          <div class="form-group">
            <label for="nama_user">Nama User</label>
            <input type="text" name="nama_user"
              class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : ''; ?>" id=" nama_user"
              value="<?= $users['nama_user']; ?>">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('nama_user'); ?>
            </div>
          </div>
          <div class=" form-group">
            <label for="email">Email</label>
            <input type="email" name="email"
              class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id=" email"
              value="<?= $users['email']; ?>">
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('email'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="level">Status</label>
            <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" id="
              level">
              <?php if($users['level'] == 1): ?>
              <option value=" 1">Admin</option>
              <option value=" 2">User</option>
              <?php else: ?>
              <option value="2">User</option>
              <option value="1">Admin</option>
              <?php endif; ?>
            </select>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('level'); ?>
            </div>
          </div>

          <div class="form-group">
            <label for="id_dep">Departemen</label>
            <select name="id_dep" class="form-control <?= ($validation->hasError('id_dep')) ? 'is-invalid' : ''; ?>"
              id="id_dep">
              <?php foreach ($departemen as $c) : ?>
              <?php if ($c['id_dep'] == $users['id_dep']) { ?>
              <option value="<?= $c['id_dep'] ?>" selected><?= $c['nama_dep'] ?></option>
              <?php } else { ?>
              <option value="<?= $c['id_dep'] ?>"><?= $c['nama_dep'] ?></option>
              <?php }  endforeach; ?>
            </select>
            <div class=" alert-danger alert-dismissible">
              <?= $validation->getError('id_dep'); ?>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-5">
              <img src="<?= base_url('img/'. $users['foto'])  ?>" alt="" style="width: 80px;">
            </div>
            <div class="col-sm-7">
              <div class="form-group">
                <label for="foto">Ganti Foto</label>
                <input type="file" name="foto"
                  class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto"
                  placeholder="foto">
                <div class=" alert-danger alert-dismissible">
                  <?= $validation->getError('foto'); ?>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <a href="<?= base_url('index.php/user') ?>" class="btn btn-warning "> Kembali </a>
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