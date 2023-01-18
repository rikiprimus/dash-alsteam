<!-- Aplikasi Steam Mobil dan Motor-->

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- User image -->

    <?php  
    if ($_SESSION['hak_akses']=='admin') { ?>
      <img src="assets/img/admin-logo.png" class="user-image" alt="User Image"/>
    <?php
    } else { ?>
      <img src="assets/img/user-default.png" class="user-image" alt="User Image"/>
    <?php
    }
    ?>

    <span class="hidden-xs"><?php echo $_SESSION['nama_user']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">

      <?php  
      if ($_SESSION['hak_akses']=='admin') { ?>
        <img src="assets/img/admin-logo.png" class="img-circle" alt="User Image"/>
      <?php
      } else { ?>
        <img src="assets/img/user-default.png" class="img-circle" alt="User Image"/>
      <?php
      }
      ?>

      <p>
        <?php echo $_SESSION['nama_user']; ?>
        <small><?php echo $_SESSION['hak_akses']; ?></small>
      </p>
    </li>
    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="?module=password" class="btn btn-default btn-flat">Password</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
</li>