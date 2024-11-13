<?php
@include('citizen_header.php');
redirectNotLogin();
?>

<div class="col-12" id="content">
    <!-- Content Row -->
    <div class="col-12 mt-5">
        <div class="search-container">
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-0 text-dark font-weight-bold text-start">Categorization of Legislative Documents</h1>
                <div class="back-button mb-3">
                    <a href="citizen_home.php" class="btn btn-primary mr-2">Home</a>
                    <a href="citizen_forum.php" class="btn btn-primary mr-5">Forum</a>
                    <a href="citizen_home.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap">
            <?php foreach (getAllCategoryAsc('category_name') as $category) { ?>
                <div class="legislative-container col-3 p-2">
                    <div class="document-list">
                        <h5 class="m-0 font-weight-bold text-dark text-start"><?php echo $category['category_name'] ?></h5>
                        <?php foreach (getDocumentsByCategoryName($category['category_name']) as $document) : ?>
                            <div class="list my-3">
                                <a class="document-link" onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id'] ?>">
                                    <p class="m-0 font-weight-normal text-secondary"><?php echo $document['documentNo']; ?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>
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