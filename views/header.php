<?php
include('../config/config.php');

ob_start(); // Start output buffering

clearFormSession();
clearOTP();
clearPassVerification();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLTS</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/datatable.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php if (isLogin()) : ?>
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-between" id="brandLink" data-title="BLTS - Dashboard" href="admin_home.php">
                    <div class="sidebar-brand-icon">
                        <!-- <i class="img-profile rounded-circle fas fa-user-circle fa-2x"></i> -->
                        <?php echo (!empty(getSystemSettings()['system_logo'])) ? '<img width="52px" class="img-fluid" src="' . getSystemSettings()['system_logo'] . '">' : '<img width="52px" class="img-fluid" src="../uploads/placeholder.png" alt="placeholder">'; ?>
                    </div>
                    <div class="sidebar-brand-text mx-3"><?php echo logUsertype(); ?></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link Links" id="dashboardLink" href="admin_home.php" data-title="BLTS - Dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if (isAdmin()) : ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link Links" href="#" id="documentManagementLink" data-toggle="collapse" data-target="#DocumentManagePage" aria-expanded="true" aria-controls="DocumentManagePage" data-title="BLTS - Document Management">
                            <i class="fas fa-fw fa-file"></i>
                            <span>Document Management</span>
                        </a>
                        <div id="DocumentManagePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="admin_resolution.php?manage">Resolutions</a>
                                <a class="collapse-item" href="admin_ordinance.php?manage">Ordinances</a>
                            </div>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link Links" id="ManageDocumentLink" href="#" data-toggle="collapse" data-target="#DocumentManagePage" aria-expanded="true" aria-controls="DocumentManagePage" data-title="BLTS - Manage Documents">
                            <i class="far fa-file-alt"></i>
                            <span>Manage Documents</span>
                        </a>
                        <div id="DocumentManagePage" class="collapse <?php echo (isActiveMenu('/admin_resolution.php?manage') || isActiveMenu('/admin_ordinance.php?manage') || isActiveMenu('/admin_add_resolution.php') || isActiveMenu('/admin_add_ordinance.php')) ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_resolution.php?manage')) || isActiveMenu('/admin_add_resolution.php') ? 'bg-secondary text-light' : '' ?>" href="admin_resolution.php?manage">Resolutions</a>
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_ordinance.php?manage')) || isActiveMenu('/admin_add_ordinance.php') ? 'bg-secondary text-light' : '' ?>" href="admin_ordinance.php?manage">Ordinances</a>
                            </div>
                        </div>
                        <!-- <a class="nav-link Links" href="admin_resolution.php?manage" id="ResolutionsLink" data-title="BLTS - Resolutions">
                            <i class="far fa-file-alt"></i>
                            <span>Resolutions</span>
                        </a> -->
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link Links" href="admin_ordinance.php?manage" id="OrdinancesLink" data-title="BLTS - Ordinances">
                            <i class="far fa-file-alt"></i>
                            <span>Ordinances</span>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link Links" id="publishDocumentLink" href="#" data-toggle="collapse" data-target="#DocumentPublishPage" aria-expanded="true" aria-controls="DocumentPublishPage" data-title="BLTS - Publish Documents">
                            <i class="fas fa-fw fa-upload"></i>
                            <span>Publish Documents</span>
                        </a>
                        <div id="DocumentPublishPage" class="collapse <?php echo (isActiveMenu('/admin_resolution.php?publish') || isActiveMenu('/admin_ordinance.php?publish')) ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_resolution.php?publish')) ? 'bg-secondary text-light' : '' ?>" href="admin_resolution.php?publish">Resolutions</a>
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_ordinance.php?publish')) ? 'bg-secondary text-light' : '' ?>" href="admin_ordinance.php?publish">Ordinances</a>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link Links" id="adminPanelLink" href="#" data-toggle="collapse" data-target="#adminPanelPage" aria-expanded="true" aria-controls="adminPanelPage" data-title="BLTS - Admin Panel">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Admin Panel</span>
                        </a>
                        <div id="adminPanelPage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="admin_user_management.php">User Management</a>
                                <a class="collapse-item" href="admin_system_setting.php">System Settings</a>
                                <a class="collapse-item" href="admin_tag.php">Tags</a>
                            </div>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link Links" href="admin_forum.php" id="ForumManagementLink" data-title="BLTS - Forum Management">
                            <i class="fas fa-comments"></i>
                            <span>Forum Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" id="CategoriesLink" href="#" data-toggle="collapse" data-target="#CategoriesPage" aria-expanded="true" aria-controls="CategoriesPage" data-title="BLTS - Categories">
                            <i class="fas fa-tag"></i>
                            <span>Categories</span>
                        </a>
                        <div id="CategoriesPage" class="collapse <?php echo (isActiveMenu('/admin_resolution_category.php') || isActiveMenu('/admin_add_resolution_cat.php') || isActiveMenu('/admin_update_resolution_cat.php') || isActiveMenu('/admin_ordinance_category.php') || isActiveMenu('/admin_add_ordinance_cat.php') || isActiveMenu('/admin_update_ordinance_cat.php')) ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_resolution_category.php') || isActiveMenu('/admin_add_resolution_cat.php') || isActiveMenu('/admin_update_resolution_cat.php')) ? 'bg-secondary text-light' : '' ?>" href="admin_resolution_category.php">Resolution Categories</a>
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_ordinance_category.php') || isActiveMenu('/admin_add_ordinance_cat.php') || isActiveMenu('/admin_update_ordinance_cat.php')) ? 'bg-secondary text-light' : '' ?>" href="admin_ordinance_category.php">Ordinance Categories</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="admin_user_management.php" id="UserManagementLink" data-title="BLTS - User Management">
                            <i class="fas fa-users"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="admin_system_setting.php" id="SystemSettingLink" data-title="BLTS - System Settings">
                            <i class="fas fa-cog"></i>
                            <span>System Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="admin_log_history.php" id="LogHistoryLink" data-title="BLTS - Log History">
                            <i class="fas fa-history"></i>
                            <span>Log History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" id="ReportLink" href="#" data-toggle="collapse" data-target="#ReportPage" aria-expanded="true" aria-controls="ReportPage" data-title="BLTS - Reports">
                            <i class="fas fa-fw fa-chart-bar"></i>
                            <span>Reports</span>
                        </a>
                        <div id="ReportPage" class="collapse <?php echo (isActiveMenu('/admin_report_document.php') || isActiveMenu('/admin_report_forum.php') || isActiveMenu('/admin_report_view.php')) ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_report_document.php')) ? 'bg-secondary text-light' : '' ?>" href="admin_report_document.php">Document Report</a>
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_report_forum.php')) ? 'bg-secondary text-light' : '' ?>" href="admin_report_forum.php">Forum Report</a>
                                <a class="collapse-item <?php echo (isActiveMenu('/admin_report_view.php')) ? 'bg-secondary text-light' : '' ?>" href="admin_report_view.php">Views Report</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- <php elseif (isMember()) : ?>
                    <li class="nav-item">
                        <a class="nav-link Links" href="citizen_resolution.php" id="ResolutionsLink" data-title="BLTS - Resolutions">
                            <i class="far fa-file-alt"></i>
                            <span>Resolutions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="citizen_ordinance.php" id="OrdinancesLink" data-title="BLTS - Ordinances">
                            <i class="far fa-file-alt"></i>
                            <span>Ordinances</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="citizen_post.php" id="MyPostLink" data-title="BLTS - My Posts">
                            <i class="far fa-file-alt"></i>
                            <span>My Posts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link Links" href="citizen_forum.php" id="FeedbackForumLink" data-title="BLTS - Feedback Forum">
                            <i class="far fa-file-alt"></i>
                            <span>Feedback Forum</span>
                        </a>
                    </li>
                <php endif; ?> -->

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

        <?php endif;
