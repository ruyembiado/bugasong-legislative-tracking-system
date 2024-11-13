<?php
@include('citizen_header.php');
redirectNotLogin();
?>
<!-- Content Wrapper -->
<div class="d-flex flex-column mt-4 mx-auto col-10" style="width: 100%;">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex">
                    <h1 class="h3 mb-0 text-gray-800">View Topic</h1>
                    <?php if (isAdmin()) { ?>
                        <?php foreach ($get_user_post = getPostUser($_GET['post_id']) as $user_post) { ?>
                            <a class="ml-3 status-button <?php echo ($user_post['status'] == '0') ? '' : 'unpublish'; ?>"
                                href="../actions/admin_update.php?update_status=<?php echo $user_post['status']; ?>&post_id=<?php echo $user_post['post_id']; ?>&view=true"><?php echo ($user_post['status'] == '0') ? '<p class="text-light btn btn-danger ">Disapproved</p>' : '<p class="text-light btn btn-success">Approved</p>' ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>

                <div class="back-button mb-3">
                    <a href="<?php echo isAdmin() ? 'admin_forum.php' : 'citizen_home.php' ?>"
                        class="btn btn-primary">Back</a>
                </div>
            </div>

            <!-- Content Row -->
            <div class="container-fluid p-0 d-flex flex-row">
                <div class="col-12 col-sm-8 p-0">
                    <?php $post = viewTopic($_GET['post_id']); ?>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3 d-flex flex-column">
                            <span class="user" style="font-size: 13px;">
                                <?php foreach (getPostUser($post['post_id']) as $user):
                                    echo $user['name'];
                                endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                            </span>
                            <?php if (isAdmin() || ($_SESSION['user_id'] == $post['user_id'])) : ?>
                                <span class="status" style="font-size: 13px;">
                                    <?php
                                    if ($post['status'] == 0) {
                                        echo "Status: Unpublished";
                                    } else {
                                        echo "Status: Published";
                                    } ?>
                                </span>
                                <span class="reason" style="font-size: 13px;">
                                    <?php
                                    if ($post['status'] == 0) {
                                        if ($post['reason'] == null) {
                                            echo "Reason: Your topic is being checked.";
                                        } else {
                                            echo "Reason: " . $post['reason'];
                                        }
                                    }
                                    ?>
                                </span>
                            <?php endif ?>
                            <h6 class="m-0 mt-1 font-weight-bold text-primary"><?php echo $post['topic']; ?></h6>
                        </div>
                        <div class="card-body py-2 forum-message">
                            <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                            <div class="feedback mb-2">
                                <div class="d-flex">
                                    <?php
                                    $likeClass = userLikedPost($post['post_id'], user_id()) ? 'text-primary' : 'text-secondary';
                                    $dislikeClass = userDislikedPost($post['post_id'], user_id()) ? 'text-danger' : 'text-secondary';
                                    ?>
                                    <button class="react-button <?php echo $likeClass; ?>" type="button"
                                        onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                        <span><i class="fas fa-thumbs-up m-1"></i><sup
                                                class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                    </button>
                                    <button class="react-button <?php echo $dislikeClass; ?>" type="button"
                                        onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                        <span><i class="fas fa-thumbs-down m-1"></i><sup
                                                class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                    </button>
                                </div>
                            </div>
                            <div class="comment-section">
                                <?php if (empty(viewPostComments($post['post_id']))): ?>
                                    <div class="alert alert-warning m-0 text-center" role="alert">
                                        No comment found.
                                    </div>
                                <?php endif; ?>
                                <?php foreach (viewPostComments($post['post_id']) as $comment): ?>
                                    <?php $position = ($comment['user_id'] === user_id()) ? 'right' : 'left' ?>
                                    <?php $color = ($comment['user_id'] === user_id()) ? 'dark' : 'secondary' ?>
                                    <div
                                        class="col-8 comments card border-left-<?php echo $color; ?> p-1 mb-2 float-<?php echo $position; ?> p-0">
                                        <div class="user-container d-flex flex-column">
                                            <div class="comment">
                                                <div class="d-flex justify-content-between">
                                                    <span class="user" style="font-size: 13px;">
                                                        <?php echo getUserData($comment['user_id'])['name']; ?> -
                                                        <?php echo date('M d Y h:i:s a', strtotime($comment['date_added'])); ?>
                                                    </span>
                                                    <div class="comment-action">
                                                        <?php if ($comment['user_id'] === user_id()): ?>
                                                            <a href="#" class="edit-comment"
                                                                data-comment-id="<?php echo $comment['post_comment_id']; ?>"><i
                                                                    class="fas fa-edit text-primary"
                                                                    style="font-size: 13px;"></i></a>
                                                            <a class="delete"
                                                                href="../actions/citizen_delete.php?delete_comment=delete&post_id=<?php echo $_GET['post_id']; ?>&comment_id=<?php echo $comment['post_comment_id']; ?>"><i
                                                                    class="fas fa-trash text-danger"
                                                                    style="font-size: 13px;"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <span class="comment-content text-gray-800 ml-3"
                                                    data-comment-id="<?php echo $comment['post_comment_id']; ?>"><?php echo $comment['post_comment']; ?></span>
                                                <div class="">
                                                    <form action="../actions/citizen_update.php" method="post">
                                                        <input type="hidden" name="post_id"
                                                            value="<?php echo $_GET['post_id']; ?>">
                                                        <input type="hidden" name="post_comment_id"
                                                            value="<?php echo $comment['post_comment_id']; ?>">
                                                        <textarea rows="4" name="post_comment"
                                                            class="edit-comment-textarea form-control text-gray-800"
                                                            style="display: none;"
                                                            data-comment-id="<?php echo $comment['post_comment_id']; ?>"></textarea>
                                                        <button type="submit" name="update_comment" value="update_comment"
                                                            class="btn btn-primary update-comment-btn px-2 py-1 my-1 float-right"
                                                            style="display: none; font-size: 14px;"
                                                            data-comment-id="<?php echo $comment['post_comment_id']; ?>">Update</button>
                                                    </form>
                                                </div>
                                            </div>
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
                                        <textarea class="form-control text-gray-800" name="comment"
                                            placeholder="Enter your comment"><?php echo getValue('comment'); ?></textarea>
                                    </div>
                                    <?php if (showError('comment')): ?>
                                        <p class="error text-danger text-start m-0" style="font-size: 12px;">
                                            <?php echo showError('comment'); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="m-1 mb-2 d-flex justify-content-end">
                                    <input type="hidden" name="user_id" id="" value="<?php echo user_id(); ?>">
                                    <input type="hidden" name="post_id" id="" value="<?php echo $post['post_id']; ?>">
                                    <button type="submit" name="create_comment" value="create_comment"
                                        class="button-size form-control btn-primary rounded col-4 col-lg-2 col-md-3 col-sm-4">Submit</button>
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
                                    <h6 class="m-0 font-weight-bold text-primary">My Topics</h6>
                                </div>
                                <div class="card-body py-2 forum-message">
                                    <?php if (empty(getMyPosts(user_id(), 5))): ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getMyPosts(user_id(), 5) as $post): ?>
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;">
                                                <?php foreach (getPostUser($post['post_id']) as $user):
                                                    echo $user['name'];
                                                endforeach; ?>
                                                - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                            </span>
                                            <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                class="citizen-view-post">
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
                                                <button class="react-button <?php echo $likeClass; ?>" type="button"
                                                    onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                                    <span><i class="fas fa-thumbs-up m-1"></i><sup
                                                            class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                                </button>
                                                <button class="react-button <?php echo $dislikeClass; ?>" type="button"
                                                    onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                                    <span><i class="fas fa-thumbs-down m-1"></i><sup
                                                            class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                                </button>
                                                <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                    class="citizen-view-post">
                                                    <span><i class="fas fa-comment m-1"></i><sup
                                                            class="count-comment"><?php echo countPostComments($post['post_id']); ?></sup></span>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Latest Topics</h6>
                                </div>
                                <div class="card-body py-2 forum-message">
                                    <?php if (empty(getAllPostDesc(5))): ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getAllPostDesc(5) as $post): ?>
                                        <div class="d-flex flex-column">
                                            <span class="user" style="font-size: 13px;">
                                                <?php foreach (getPostUser($post['post_id']) as $user):
                                                    echo $user['name'];
                                                endforeach; ?>
                                                - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                            </span>
                                            <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                class="citizen-view-post">
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
                                                <button class="react-button <?php echo $likeClass; ?>" type="button"
                                                    onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                                    <span><i class="fas fa-thumbs-up m-1"></i><sup
                                                            class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                                </button>
                                                <button class="react-button <?php echo $dislikeClass; ?>" type="button"
                                                    onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                                    <span><i class="fas fa-thumbs-down m-1"></i><sup
                                                            class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                                </button>
                                                <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                    class="citizen-view-post">
                                                    <span><i class="fas fa-comment m-1"></i><sup
                                                            class="count-comment"><?php echo countPostComments($post['post_id']); ?></sup></span>
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
                                    <?php if (empty(getTopLikes(5))): ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getTopLikes(5) as $post): ?>
                                        <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                            class="citizen-view-post">
                                            <div class="d-flex flex-column">
                                                <span class="user" style="font-size: 13px;">
                                                    <?php foreach (getPostUser($post['post_id']) as $user):
                                                        echo $user['name'];
                                                    endforeach; ?>
                                                    - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                                    <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                        class="citizen-view-post">
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
                                                    <button class="react-button <?php echo $likeClass; ?>" type="button"
                                                        onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'liked')">
                                                        <span><i class="fas fa-thumbs-up m-1"></i><sup
                                                                class="like-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'liked') ?></sup></span>
                                                    </button>
                                                    <button class="react-button <?php echo $dislikeClass; ?>" type="button"
                                                        onclick="submitReaction(<?php echo $post['post_id']; ?>, <?php echo user_id(); ?>, 'disliked')">
                                                        <span><i class="fas fa-thumbs-down m-1"></i><sup
                                                                class="dislike-count-<?php echo $post['post_id']; ?>"><?php echo countReaction($post['post_id'], 'disliked') ?></sup></span>
                                                    </button>
                                                    <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>"
                                                        class="citizen-view-post">
                                                        <span><i class="fas fa-comment m-1"></i><sup
                                                                class="count-comment"><?php echo countPostComments($post['post_id']); ?></sup></span>
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
</div>
<!-- End of Content Wrapper -->

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

    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-comment');

        editButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const commentId = button.getAttribute('data-comment-id');
                const commentContentElement = document.querySelector(`.comment-content[data-comment-id="${commentId}"]`);
                const textareaElement = document.querySelector(`.edit-comment-textarea[data-comment-id="${commentId}"]`);
                const updateButton = document.querySelector(`.update-comment-btn[data-comment-id="${commentId}"]`);
                console.log(commentId);
                console.log(commentContentElement);
                console.log(textareaElement);
                console.log(updateButton);
                // Hide comment content, show textarea and update button
                commentContentElement.style.display = 'none';
                textareaElement.style.display = 'block';
                updateButton.style.display = 'block';

                // Populate textarea with current comment content
                textareaElement.value = commentContentElement.textContent.trim();
            });
        });
    });
</script>

<?php
@include('citizen_footer.php');
?>