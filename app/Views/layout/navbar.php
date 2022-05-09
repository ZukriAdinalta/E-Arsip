<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="" class="navbar-brand"><b>E</b>-Arsip</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="<?= $link == 'home' ? 'active': '' ?>"><a href="/home">Home</a></li>
              <li class="<?= $link == 'user' ? 'active': '' ?>"><a href="/user">User</a></li>
              <li class="<?= $link == 'kategori' ? 'active': '' ?>"><a href="/kategori">Kategori</a></li>
              <li class="<?= $link == 'departemen' ? 'active': '' ?>"><a href="/departemen">Departemen</a></li>
              <li class="<?= $link == 'arsip' ? 'active': '' ?>"><a href="/arsip">Arsip</a></li>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="/img/<?= session()->get('foto') ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="/img/<?= session()->get('foto') ?>" class="img-circle" alt="User Image">

                    <p>
                      <?= session()->get('nama_user') ?> - <?= session()->get('level') == 1 ? 'Admin' : 'User' ?>
                      <small>Member Sejak - <?= session()->get('created_at') ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="login/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $title; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $title; ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">