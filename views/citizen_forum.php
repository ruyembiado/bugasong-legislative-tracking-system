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

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Feedback Forum</h1>
            </div>

            <!-- Content Row -->
            <div class="container-fluid p-0 d-flex flex-row">
                <div class="col-12 col-sm-8 p-0">
                    <!-- Post Form -->
                    <div class="create-forum col-12 p-0">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
                            </div>
                            <form action="../actions/citizen_add.php" method="POST" class="p-2">
                                <div class="d-flex flex-column">
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Topic</label>
                                        <div class="d-flex align-items-center">
                                            <input class="form-control text-gray-800" type="text" name="topic" value="<?php echo getValue('topic'); ?>" placeholder="Enter your topic">
                                        </div>
                                        <?php if (showError('topic')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('topic'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="m-1">
                                        <label class="label" style="font-size: 13px;">Message</label>
                                        <div class="d-flex align-items-center">
                                            <textarea class="form-control text-gray-800" name="message" placeholder="Enter your message"><?php echo getValue('message'); ?></textarea>
                                        </div>
                                        <?php if (showError('message')) : ?>
                                            <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('message'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="m-1 mb-2 d-flex justify-content-end">
                                    <input type="hidden" name="user_id" id="" value="<?php echo user_id(); ?>">
                                    <button type="submit" name="create_post" value="create_post" class="button-size form-control btn-primary rounded col-2" style="font-size: 14px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Post Lists -->
                    <div class="forum-post col-12 p-0">
                        <?php foreach (getAllPostRand() as $post) : ?>
                            <div class="forum">
                                <div class="card shadow mb-3">
                                    <div class="card-header pt-2 pb-0 forum-topic">
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;"><?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                                                        endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?></span>
                                            <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="card-body py-2 forum-message">
                                        <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                        <div class="feedback">
                                            <div class="d-flex">
                                                <span><i class="fas fa-thumbs-up m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-thumbs-down m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-comment m-1"></i><sup>5</sup></span>
                                            </div>
                                            <div class="comment-section">
                                                <div class="d-flex align-items-center">
                                                    <span class="comment-user m-1" style="font-size: 15px;">Name -</span>
                                                    <span class="comment-user m-1" style="font-size: 13px;">Comment</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Sidebar Topics -->
                <div class="sidebar-container column col-12 col-sm-4 p-0">
                    <div class="col-12 p-0">
                        <div class="sidebar-forum col-12 pr-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Latest Topics</h6>
                                </div>
                                <div class="card-body py-2 forum-message">
                                    <?php foreach (getAllPostDesc(3) as $post) : ?>
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;"><?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                                                        endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?></span>
                                            <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                        </div>
                                        <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                        <div class="feedback mb-4">
                                            <div class="d-flex">
                                                <span><i class="fas fa-thumbs-up m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-thumbs-down m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-comment m-1"></i><sup>5</sup></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="sidebar-forum col-12 pr-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Likes</h6>
                                </div>
                                <div class="card-body py-2 forum-message">
                                    <?php foreach (getAllPostDesc(3) as $post) : ?>
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;"><?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                                                        endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?></span>
                                            <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                        </div>
                                        <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                        <div class="feedback mb-4">
                                            <div class="d-flex">
                                                <span><i class="fas fa-thumbs-up m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-thumbs-down m-1"></i><sup>1</sup></span>
                                                <span><i class="fas fa-comment m-1"></i><sup>5</sup></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

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