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
                    <h1 class="h3 mb-0 text-gray-800">Forum Management</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="citizen_forum.php" class="btn btn-primary px-2 py-1">Add Topic</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>Topic</th>
                                        <th>Content</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllPostDescAdmin() as $post): ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $post['topic']; ?></td>
                                            <td class="text-gray-800"><?php echo $post['message']; ?></td>
                                            <td class="text-gray-800">
                                                <?php echo date('F d Y h:i:s a', strtotime($post['date_added'])); ?>
                                            </td>
                                            <td class="text-gray-800">
                                                <a class="status-button <?php echo ($post['status'] == '0') ? '' : 'unpublish'; ?>"
                                                    href="../actions/admin_update.php?update_status=<?php echo $post['status']; ?>&post_id=<?php echo $post['post_id']; ?>"><?php echo ($post['status'] == '0') ? '<p class="text-light btn btn-danger ">Disapproved</p>' : '<p class="text-light btn btn-success">Approved</p>' ?></a>
                                            </td>
                                            <td>
                                                <a class="nav-link" href="#" id="actionDropdownMenu" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-dark"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="actionDropdownMenu">
                                                    <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                        class="dropdown-item">View</a>
                                                    <!-- <a href="admin_update_post.php?post_id=<?php echo $post['post_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a> -->
                                                    <a href="../actions/admin_delete.php?delete_post=delete&post_id=<?php echo $post['post_id']; ?>"
                                                        class="dropdown-item delete">Delete</a>
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