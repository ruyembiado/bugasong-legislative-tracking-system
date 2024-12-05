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
                    <h1 class="h3 mb-0 text-gray-800">Resolution Categories</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="admin_add_resolution_cat.php" class="btn btn-primary px-2 py-1">Add Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 40%;">Category Name</th>
                                        <th style="width: 20%;">Date Added</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllResolutionCatDesc('resolution_cat_id', null) as $res_cat) :  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $res_cat['resolution_category_name']; ?></td>
                                            <td class="text-gray-800"><?php echo date('F d Y h:i:s a', strtotime($res_cat['date_added'])); ?>
                                            </td>
                                            <td>
                                                <a class="nav-link" href="#" id="actionDropdownMenu" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-dark"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="actionDropdownMenu">
                                                    <a href="admin_update_resolution_cat.php?resolution_cat_id=<?php echo $res_cat['resolution_cat_id']; ?>" class="dropdown-item">Update</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="../actions/admin_delete.php?resolution_cat=delete&resolution_cat_id=<?php echo $res_cat['resolution_cat_id']; ?>" class="dropdown-item delete">Delete</a>
                                                </ul>
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