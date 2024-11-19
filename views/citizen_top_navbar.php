<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 border border-bottom">
    <!-- Topbar Navbar -->
    <div class="d-flex align-items-center justify-content-between col-12">
        <a class="sidebar-brand d-flex align-items-center justify-content-between nav-link Links" id="HomeLink" data-title="BLTS - Home" href="<?php echo isMember() ? 'citizen_home.php' : 'admin_home.php'; ?>">
            <div class="sidebar-brand-icon">
                <img src="../img/blts.png" class="img-profile" alt="">
            </div>
        </a>
        <ul class="navbar-nav ml-auto">
            <?php @include('notification_nav.php'); ?>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <?php if (isLogin()) { ?>
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo logName(); ?></span>
                        <!-- <img class="img-profile rounded-circle" src=""> -->
                        <i class="img-profile rounded-circle fas fa-user-circle fa-2x text-primary"></i>
                    </a>
                <?php } ?>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-bell fa-sm fa-fw mr-2 text-gray-400"></i>
                        Notifications
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item logout" href="../actions/logout.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- End of Topbar -->