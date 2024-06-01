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

        <?php if (isAdmin()) : ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Resolution</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        <a href="admin_add_resolution.php" class="btn btn-primary px-2 py-1">Add Resolution</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 40%;">Resolution Name</th>
                                        <th style="width: 15%;">Tag</th>
                                        <th style="width: 20%;">Dated Added</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllResolutionsDesc(null) as $resolution) :  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $resolution['title']; ?></td>
                                            <td class="text-gray-800"><?php echo $resolution['tag']; ?></td>
                                            <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($resolution['date_added'])); ?></td>
                                            <td>
                                                <a href="view_resolution.php?resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-secondary px-2 py-1 my-1">View</a>
                                                <a href="admin_update_resolution.php?resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a>
                                                <a href="../actions/admin_delete.php?delete_resolution=delete&resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-danger px-2 py-1 my-1">Delete</a>
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

        <?php else : redirect('dashboard', ''); ?>
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