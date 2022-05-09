<?= $this->extend('login/template') ?>

<?= $this->section('content') ?>
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>E</b>-Arsip</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login</p>
    <?php 
        $errors = session()->getFlashdata('errors');
        if(!empty($errors)){ ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <ul>
        <?php  foreach ($errors as $key => $error){ ?>
        <li><?= esc($error) ?> </li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>
    <?php
        if(session()->getFlashdata('pesan')){
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
      ?>

    <form action="/login/auth" method="POST">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>