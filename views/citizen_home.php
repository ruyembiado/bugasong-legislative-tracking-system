<?php
@include('citizen_header.php');
redirectNotLogin();
?>

<div class="col-12" id="content">
    <div class="links-section d-flex justify-content-center mb-4">
        <!-- <a class="mx-2 btn btn-secondary">View Recent</a> -->
        <!-- <a class="mx-2 btn btn-primary">Masterlist</a> -->
    </div>
    <div class="legislative-container d-flex justify-content-around">
        <div class="municipal-legislative col-3 p-2">
            <div class="document-list">
                <h6 class="m-0 font-weight-bold text-primary text-start">Municipal Legislative</h6>
                <?php foreach (getAllDocumentsDesc(5) as $document) : ?>
                    <div class="list border-bottom my-3">
                        <a class="document-link" onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id'] ?>">
                            <?php echo $document['documentNo']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <a class="btn btn-primary Links" href="citizen_legislative_list.php" id="LegislativeLink" data-title="BLTS - Legislative Documents">More</a>
            </div>
        </div>
        <div class="list-legislative col-3 p-2">
            <div class="document-list">
                <h6 class="m-0 font-weight-bold text-primary text-start">List of Legislative</h6>
                <?php foreach (getAllDocumentsAsc(5) as $document) : ?>
                    <div class="list border-bottom my-3">
                        <a class="document-link" onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id'] ?>">
                            <?php echo $document['documentNo']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <a class="btn btn-primary Links" href="citizen_legislative_list.php" id="LegislativeLink" data-title="BLTS - Legislative Documents">More</a>
            </div>
        </div>
        <div class="list-legislative col-3 p-2">
            <div class="document-list">
                <h6 class="m-0 font-weight-bold text-primary text-start">Create Post</h6>
                <form action="../actions/citizen_add.php" method="POST" class="">
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
                        <button type="submit" name="create_post" value="create_post" class="button-size form-control btn-primary rounded col-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="forum-container col-3 p-2">
            <div class="forum-list">
                <h6 class="m-0 font-weight-bold text-primary text-start">Forum Topics</h6>
                <div class="forum-content mt-3 mb-1">
                    <?php if (empty(getAllPostDesc(5))) : ?>
                        <div class="alert alert-warning m-0 text-center" role="alert">
                            No post found.
                        </div>
                    <?php endif; ?>
                    <?php foreach (getAllPostDesc(5) as $post) : ?>
                        <div class="d-flex flex-column">
                            <span class="user" style="font-size: 13px;">
                                <?php foreach (getPostUserByPostID($post['post_id']) as $user) : echo $user['name'];
                                endforeach; ?>
                                - <?php echo date('M d Y h:i:s a', strtotime($post['date_added'])); ?>
                            </span>
                            <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>" class="citizen-view-post">
                                <h5 class="topic text-primary"><?php echo $post['topic']; ?></h5>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="btn btn-primary" href="citizen_forum.php">More</a>
            </div>
        </div>
    </div>
</div>

<script>
    function addDocumentView(user_id, document_type, document_id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../actions/document_view.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = "user_id=" + encodeURIComponent(user_id) +
            "&document_type=" + encodeURIComponent(document_type) +
            "&document_id=" + encodeURIComponent(document_id);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Document view added successfully");
                    console.log(xhr.responseText); // Log the response from the server
                } else {
                    console.error("Failed to add document view", xhr.statusText);
                }
            }
        };

        xhr.onerror = function() {
            console.error("Request error");
        };

        xhr.send(data);
        console.log("Request sent: " + data); // Log the data being sent
    }
</script>

<?php
@include('citizen_footer.php');
?>