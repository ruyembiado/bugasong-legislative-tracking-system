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
                <h1 class="h3 mb-0 text-gray-800">Forum</h1>
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
                                    <button type="submit" name="create_post" value="create_post" class="button-size form-control btn-primary rounded col-4 col-lg-2 col-md-3 col-sm-4">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Post Lists -->
                    <div class="forum-post col-12 p-0">

                        <?php
                        $keyword = isset($_GET['search']) ? $_GET['search'] : '';
                        $posts = !empty($keyword) ? searchPost($keyword) : getAllPostRand();
                        ?>

                        <?php if (empty($posts)) : ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-warning" role="alert">
                                    No post found.
                                </div>
                            </div>
                        <?php else : ?>
                            <?php foreach ($posts as $post) : ?>
                                <div class="forum" id="post-list">
                                    <div class="card shadow mb-3">
                                        <div class="card-header pt-2 pb-0 forum-topic">
                                            <div class="d-flex flex-column">
                                                <span class="user" style="font-size: 13px;">
                                                    <?php foreach (getPostUser($post['post_id']) as $user) : echo $user['name'];
                                                    endforeach; ?> - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                                                </span>
                                                <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                                    <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body py-2 forum-message">
                                            <div class="message mb-2 text-gray-800"><?php echo $post['message']; ?></div>
                                            <div class="feedback">
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
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
                                    <?php if (empty(getMyPosts(user_id(), 5))) : ?>
                                        <div class="alert alert-warning m-0 text-center" role="alert">
                                            No post found.
                                        </div>
                                    <?php endif; ?>
                                    <?php foreach (getMyPosts(user_id(), 5) as $post) : ?>
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

<?php
@include('citizen_footer.php');
?>