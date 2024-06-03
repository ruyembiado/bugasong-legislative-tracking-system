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
                    <h1 class="h3 mb-0 text-gray-800">Tag</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="admin_add_tag.php" class="btn btn-primary px-2 py-1">Add Tag</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 40%;">Tag</th>
                                        <th style="width: 20%;">Dated Added</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllTagDesc('tag_id', null) as $tag) :  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $tag['tag_name']; ?></td>
                                            <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($tag['date_added'])); ?>
                                            </td>
                                            <td>
                                                <a href="admin_update_tag.php?tag_id=<?php echo $tag['tag_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a>
                                                <a href="../actions/admin_delete.php?delete_tag=delete&tag_id=<?php echo $tag['tag_id']; ?>" class="btn btn-danger px-2 py-1 my-1 delete">Delete</a>
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