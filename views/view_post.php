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
                <h1 class="h3 mb-0 text-gray-800">View Topic</h1>
            </div>

            <!-- Content Row -->
            <div class="container-fluid p-0 d-flex flex-row">
                <div class="col-12 col-sm-8 p-0">
                    <?php $post = viewTopic($_GET['post_id']); ?>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <span class="user" style="font-size: 13px;">
                                <?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                            </span>
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $post['topic']; ?></h6>
                        </div>
                        <div class="card-body py-2 forum-message">
                            <div class="message mb-3 text-gray-800"><?php echo $post['message']; ?></div>
                            <div class="comment-section">
                                <?php if (empty(viewPostComments($post['post_id']))) : ?>
                                    <div class="alert alert-warning m-0 text-center" role="alert">
                                        No comment found.
                                    </div>
                                <?php endif; ?>
                                <?php foreach (viewPostComments($post['post_id']) as $comment) : ?>
                                    <?php $position = ($comment['user_id'] === user_id()) ? 'right' : 'left' ?>
                                    <?php $color = ($comment['user_id'] === user_id()) ? 'dark' : 'secondary' ?>
                                    <div class="col-8 comments card border-left-<?php echo $color; ?> p-1 mb-2 float-<?php echo $position; ?> p-0">
                                        <div class="user-container d-flex flex-column">
                                            <span class="user" style="font-size: 13px;">
                                                <?php foreach (getPostUser($comment['post_id']) as $user) : echo $user['name'];
                                                endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($comment['date_added'])); ?>
                                            </span>
                                            <span class="comment text-gray-800 ml-3">
                                                <?php echo $comment['post_comment']; ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <form action="../actions/citizen_add.php" method="POST" class="py-2 px-3">
                            <div class="d-flex flex-column">
                                <div class="m-1">
                                    <label class="label" style="font-size: 13px;">Comment</label>
                                    <div class="d-flex align-items-center">
                                        <textarea class="form-control text-gray-800" name="comment" placeholder="Enter your comment"><?php echo getValue('comment'); ?></textarea>
                                    </div>
                                    <?php if (showError('comment')) : ?>
                                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('comment'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="m-1 mb-2 d-flex justify-content-end">
                                    <input type="hidden" name="user_id" id="" value="<?php echo user_id(); ?>">
                                    <input type="hidden" name="post_id" id="" value="<?php echo $post['post_id']; ?>">
                                    <button type="submit" name="create_comment" value="create_comment" class="button-size form-control btn-primary rounded col-4 col-lg-2 col-md-3 col-sm-4" style="font-size: 14px;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar Topics -->
                <div class="sidebar-container column col-12 col-sm-4 p-0 d-none d-sm-block">
                    <div class="col-12 p-0">
                        <div class="sidebar-forum col-12 pr-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Latest Topics</h6>
                                </div>
                                <div class="card-body py-2 forum-message">
                                    <?php if (empty(getAllPostDesc(5))) : ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getAllPostDesc(5) as $post) : ?>
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;">
                                                <?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                endforeach; ?>
                                                - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                            </span>
                                            <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                                <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                            </a>
                                        </div>
                                        <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                        <div class="feedback mb-4">
                                            <div class="d-flex">
                                                <?php
                                                $likeClass = userLikedPost($post['post_id'], user_id()) ? 'text-primary' : 'text-secondary';
                                                $dislikeClass = userDislikedPost($post['post_id'], user_id()) ? 'text-danger' : 'text-secondary';
                                                ?>
                                                <button class="react-button <?php echo $likeClass; ?>" type="button" onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                                    <span><i class="fas fa-thumbs-up m-1"></i><sup class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                                </button>
                                                <button class="react-button <?php echo $dislikeClass; ?>" type="button" onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                                    <span><i class="fas fa-thumbs-down m-1"></i><sup class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                                </button>
                                                <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                                    <span><i class="fas fa-comment m-1"></i><sup class="count-comment"><?php echo countPostComments($post['post_id']); ?></sup></span>
                                                </a>
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
                                    <?php if (empty(getTopLikes(5))) : ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getTopLikes(5) as $post) : ?>
                                        <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                            <div class="d-flex flex-column">
                                                <span class="user" style="font-size: 13px;">
                                                    <?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                    endforeach; ?>
                                                    - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                                </span>
                                                <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                                    <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                                </a>
                                            </div>
                                            <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                            <div class="feedback mb-4">
                                                <div class="d-flex">
                                                    <?php
                                                    $likeClass = userLikedPost($post['post_id'], user_id()) ? 'text-primary' : 'text-secondary';
                                                    $dislikeClass = userDislikedPost($post['post_id'], user_id()) ? 'text-danger' : 'text-secondary';
                                                    ?>
                                                    <button class="react-button <?php echo $likeClass; ?>" type="button" onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                                        <span><i class="fas fa-thumbs-up m-1"></i><sup class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                                    </button>
                                                    <button class="react-button <?php echo $dislikeClass; ?>" type="button" onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                                        <span><i class="fas fa-thumbs-down m-1"></i><sup class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                                    </button>
                                                    <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                                        <span><i class="fas fa-comment m-1"></i><sup class="count-comment"><?php echo countPostComments($post['post_id']); ?></sup></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
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
</script>