<?php
@include('header.php');
redirectNotLogin();
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php @include('top_navbar.php'); ?>
        <!-- End of Topbar -->

        <?php if (isAdmin()): ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Ordinances</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <?php if (isset($_GET['publish'])): ?>
                            <h6 class="m-0 font-weight-bold text-primary">Publish Ordinance</h6>
                        <?php endif; ?>

                        <?php if (isset($_GET['manage'])): ?>
                            <a href="admin_add_ordinance.php" class="btn btn-primary px-2 py-1">Add Ordinance</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ordinance No.</th>
                                        <th>Attachment</th>
                                        <th>Category</th>
                                        <th>No. of Views</th>
                                        <th>Date Added</th>
                                        <th>Dated Published</th>
                                        <th><?php if (isset($_GET['publish'])): ?>Status<?php endif; ?><?php if (isset($_GET['manage'])): ?>Action<?php endif; ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllOrdinancesDesc(null) as $ordinance): ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $ordinance['ordinanceNo']; ?></td>
                                            <td class="text-gray-800"><a href="<?php echo $ordinance['file']; ?>"
                                                    target="_blanks"><?php echo get_filename($ordinance['file']); ?></a></td>
                                            <td class="text-gray-800">
                                                <?php echo isset(getOrdinanceCatByID($ordinance['ordinance_cat_id'])['ordinance_category_name']) ? getOrdinanceCatByID($ordinance['ordinance_cat_id'])['ordinance_category_name'] : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo getOrdinanceViewCount($ordinance['ordinance_id']); ?>
                                            </td>
                                            <td class="text-gray-800">
                                                <?php echo date('M d Y h:i:s a', strtotime($ordinance['date_added'])); ?>
                                            </td>
                                            <td class="text-gray-800">
                                                <?php echo ($ordinance['status'] == 1) ? date('M d Y h:i:s a', strtotime($ordinance['date_publish'])) : ''; ?>
                                            </td>
                                            <td>
                                                <?php if (isset($_GET['manage'])): ?>
                                                    <a class="nav-link" href="#" id="actionDropdownMenu" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v text-dark"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="actionDropdownMenu">
                                                        <a href="view_ordinance.php?ordinance_id=<?php echo $ordinance['ordinance_id']; ?>"
                                                            class="dropdown-item">View</a>
                                                        <a href="admin_update_ordinance.php?ordinance_id=<?php echo $ordinance['ordinance_id']; ?>"
                                                            class="dropdown-item">Update</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="../actions/admin_delete.php?delete_ordinance=delete&ordinance_id=<?php echo $ordinance['ordinance_id']; ?>"
                                                            class="dropdown-item delete">Delete</a>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (isset($_GET['publish'])): ?>
                                                    <a class="status-button <?php echo ($ordinance['status'] == '0') ? '' : 'unpublish'; ?>"
                                                        href="../actions/admin_update.php?update_status=<?php echo $ordinance['status']; ?>&ordinance_id=<?php echo $ordinance['ordinance_id']; ?>"><?php echo ($ordinance['status'] == '0') ? '<p class="text-light btn btn-danger ">Unpublished</p>' : '<p class="text-light btn btn-success">Published</p>' ?></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->

            </div>
            <!-- /.container-fluid -->

        <?php else:
            redirect('dashboard', ''); ?>
        <?php endif; ?>

    </div>
    <!-- End of Main Content -->


    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Bugasong Legislative Tracking System 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
<?php
@include('footer.php');
?>