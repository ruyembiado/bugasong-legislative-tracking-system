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
                    <h1 class="h3 mb-0 text-gray-800">Ordinance</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                        <a href="admin_add_ordinance.php" class="btn btn-primary px-2 py-1">Add Ordinance</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Ordinance Name</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Dated Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ordinance 1</td>
                                        <td>Category 1</td>
                                        <td>Tag 1</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="#" class="btn btn-secondary px-2 py-1 m-1">View</a>
                                            <a href="#" class="btn btn-primary px-2 py-1 m-1">Update</a>
                                            <a href="#" class="btn btn-danger px-2 py-1 m-1">Delete</a>
                                        </td>
                                    </tr>
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