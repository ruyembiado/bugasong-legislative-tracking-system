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
                <h1 class="h3 mb-0 text-gray-800">My Posts</h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No.</th>
                                    <th style="">Topic</th>
                                    <th style="">Message</th>
                                    <th style="">No. of Like</th>
                                    <th style="">No. of Dislike</th>
                                    <th style="">No. of Comment</th>
                                    <th style="">Dated Added</th>
                                    <th style="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach (getAllUserPostDesc(user_id()) as $post) :  ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td class="text-gray-800"><?php echo $post['topic']; ?></td>
                                        <td class="text-gray-800"><?php echo $post['message']; ?></td>
                                        <td class="text-gray-800"><?php echo countReaction($post['post_id'], 'liked'); ?></td>
                                        <td class="text-gray-800"><?php echo countReaction($post['post_id'], 'disliked'); ?></td>
                                        <td class="text-gray-800"><?php echo countPostComments($post['post_id']); ?></td>
                                        <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?></td>
                                        <td>
                                            <a href="../views/view_post.php?post_id=<?php echo $post['post_id']; ?>" class="btn btn-secondary px-2 py-1 my-1">View</a>
                                            <a href="../views/citizen_update_post.php?post_id=<?php echo $post['post_id']; ?>" class="btn btn-primary px-2 py-1 my-1">Update</a>
                                            <a href="../actions/citizen_delete.php?delete_post=delete&post_id=<?php echo $post['post_id']; ?>" class="btn btn-danger px-2 py-1 my-1 delete">Delete</a>
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

<script>
    function submitReaction(postId, userId, reaction) {
        const formData = new FormData();
        formData.append('post_id', postId);
        formData.append('user_id', userId);
        formData.append('post_reaction', reaction);

        fetch('../actions/user_reaction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message);

                    // Update the like count for all elements with the same post ID
                    const likeCountElements = document.querySelectorAll(`.like-count-${postId}`);
                    likeCountElements.forEach(element => {
                        element.textContent = data.like_count;
                    });

                    // Update the dislike count for all elements with the same post ID
                    const dislikeCountElements = document.querySelectorAll(`.dislike-count-${postId}`);
                    dislikeCountElements.forEach(element => {
                        element.textContent = data.dislike_count;
                    });

                    // Update the button colors
                    const likeButton = document.querySelectorAll(`button[onclick="submitReaction(${postId}, ${userId}, 'liked')"]`);
                    const dislikeButton = document.querySelectorAll(`button[onclick="submitReaction(${postId}, ${userId}, 'disliked')"]`);

                    likeButton.forEach(element => {
                        if (data.user_liked) {
                            element.classList.add('text-primary');
                            element.classList.remove('text-secondary');
                        } else {
                            element.classList.remove('text-primary');
                            element.classList.add('text-secondary');
                        }
                    });

                    dislikeButton.forEach(element => {
                        if (data.user_disliked) {
                            element.classList.add('text-danger');
                            element.classList.remove('text-secondary');
                        } else {
                            element.classList.remove('text-danger');
                            element.classList.add('text-secondary');
                        }
                    });

                } else {
                    console.error('Error in submission:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function submitReaction(postId, userId, reaction) {
        const formData = new FormData();
        formData.append('post_id', postId);
        formData.append('user_id', userId);
        formData.append('post_reaction', reaction);

        fetch('../actions/user_reaction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message);

                    // Update the like count for all elements with the same post ID
                    const likeCountElements = document.querySelectorAll(`.like-count-${postId}`);
                    likeCountElements.forEach(element => {
                        element.textContent = data.like_count;
                    });

                    // Update the dislike count for all elements with the same post ID
                    const dislikeCountElements = document.querySelectorAll(`.dislike-count-${postId}`);
                    dislikeCountElements.forEach(element => {
                        element.textContent = data.dislike_count;
                    });

                    // Update the button colors
                    const likeButton = document.querySelectorAll(`button[onclick="submitReaction(${postId}, ${userId}, 'liked')"]`);
                    const dislikeButton = document.querySelectorAll(`button[onclick="submitReaction(${postId}, ${userId}, 'disliked')"]`);

                    likeButton.forEach(element => {
                        if (data.user_liked) {
                            element.classList.add('text-primary');
                            element.classList.remove('text-secondary');
                        } else {
                            element.classList.remove('text-primary');
                            element.classList.add('text-secondary');
                        }
                    });

                    dislikeButton.forEach(element => {
                        if (data.user_disliked) {
                            element.classList.add('text-danger');
                            element.classList.remove('text-secondary');
                        } else {
                            element.classList.remove('text-danger');
                            element.classList.add('text-secondary');
                        }
                    });

                } else {
                    console.error('Error in submission:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>