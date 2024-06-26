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
                    <h1 class="h3 mb-0 text-gray-800">Resolutions</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <?php if (isset($_GET['publish'])) : ?>
                            <h6 class="m-0 font-weight-bold text-primary">Publish Resolution</h6>
                        <?php endif; ?>

                        <?php if (isset($_GET['manage'])) : ?>
                            <a href="admin_add_resolution.php" class="btn btn-primary px-2 py-1">Add Resolution</a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Resolution No.</th>
                                        <th>Tag</th>
                                        <th>No. of Views</th>
                                        <th>Dated Added</th>
                                        <th>Dated Published</th>
                                        <th style="width: 20%;"><?php if (isset($_GET['publish'])) : ?>Status<?php endif; ?><?php if (isset($_GET['manage'])) : ?>Action<?php endif; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllResolutionsDesc(null) as $resolution) :  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $resolution['resolutionNo']; ?></td>
                                            <td class="text-gray-800"><?php echo isset(getTagByID($resolution['tag_id'])['tag_name']) ? getTagByID($resolution['tag_id'])['tag_name'] : ''; ?></td>
                                            <td>
                                                <?php echo getResolutionViewCount($resolution['resolution_id']); ?>
                                            </td>
                                            <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($resolution['date_added'])); ?></td>
                                            <td><?php echo ($resolution['status'] == 1) ? date('M d Y h:i:s a', strtotime($resolution['date_publish'])) : ''; ?></td>
                                            <td>
                                                <?php if (isset($_GET['manage'])) : ?>
                                                    <a href="view_resolution.php?resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-secondary px-2 py-1 my-1">View</a>
                                                    <a href="admin_update_resolution.php?resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a>
                                                    <a href="../actions/admin_delete.php?delete_resolution=delete&resolution_id=<?php echo $resolution['resolution_id']; ?>" class="btn btn-danger px-2 py-1 my-1 delete">Delete</a>
                                                <?php endif; ?>
                                                <?php if (isset($_GET['publish'])) : ?>
                                                    <a class="status-button <?php echo ($resolution['status'] == '0') ? '' : 'unpublish'; ?>" href="../actions/admin_update.php?update_status=<?php echo $resolution['status']; ?>&resolution_id=<?php echo $resolution['resolution_id']; ?>"><?php echo ($resolution['status'] == '0') ? '<p class="text-light btn btn-danger ">Unpublished</p>' : '<p class="text-light btn btn-success">Published</p>' ?></a>
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