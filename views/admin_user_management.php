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
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="admin_add_user.php" class="btn btn-primary px-2 py-1">Add User</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="">Name</th>
                                        <th style="">Email</th>
                                        <th style="">Type</th>
                                        <th style="">Dated Added</th>
                                        <th style="width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach (getAllUsers() as $user) :  ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td class="text-gray-800"><?php echo $user['name']; ?></td>
                                            <td class="text-gray-800"><?php echo $user['email']; ?></td>
                                            <td class="text-gray-800"><?php echo ucfirst($user['user_type']); ?></td>
                                            <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($user['date_added'])); ?></td>
                                            <td>
                                                <!-- <a href="view_user.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-secondary px-2 py-1 my-1">View</a> -->
                                                <a href="admin_update_user.php?user_id=<?php echo $user['user_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a>
                                                <a href="../actions/admin_delete.php?delete_user=delete&user_id=<?php echo $user['user_id']; ?>" class="btn btn-danger px-2 py-1 my-1 delete">Delete</a>
                                                <a class="status-button py-1 my-1 <?php echo ($user['status'] == '1') ? 'deactivate' : ''; ?>" href="../actions/admin_update.php?update_status=<?php echo $user['status']; ?>&user_id=<?php echo $user['user_id']; ?>"><?php echo ($user['status'] == '1') ? '<span class="text-light py-1 btn btn-danger">Deactivated</span>' : '<span class="text-light py-1 btn btn-success">Active</span>' ?></a>
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