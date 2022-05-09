<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ; ?>
<div class="row">
  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $totalUser; ?></h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $totalKategori; ?></h3>

        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?= $totalDep; ?></h3>

        <p>Departemen</p>
      </div>
      <div class="icon">
        <i class="fa fa-building"></i>
      </div>
      <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-12">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $totalArsip; ?></h3>

        <p>File Arsip</p>
      </div>
      <div class="icon">
        <i class="fa fa-file-pdf-o"></i>
      </div>
      <a href="<?= base_url('index.php/arsip')?>" class="small-box-footer">Detail <i
          class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<?= $this->endSection() ; ?>