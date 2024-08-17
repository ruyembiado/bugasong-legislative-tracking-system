<?php
@include('citizen_header.php');
// redirectNotLogin();
?>

<div class="col-12" id="content">
    <div class="search-section my-4">
        <form action="citizen_legislative.php?search" method="get" class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="col-12 col-md-10 col-lg-4 input-group m-auto">
                <input type="text" name="keyword" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" name="search_document" value="search_document" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
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
                        <a class="document-link" <?php if (isLogin()) { ?> onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" <?php } ?> href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id'] ?>">
                            <?php echo $document['documentNo']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <a class="btn btn-primary Links" href="citizen_legislative.php" id="LegislativeLink" data-title="BLTS - Legislative Documents">More</a>
            </div>
        </div>
        <div class="list-legislative col-3 p-2">
            <div class="document-list">
                <h6 class="m-0 font-weight-bold text-primary text-start">List of Legislative</h6>
                <?php foreach (getAllDocumentsById(5) as $document) : ?>
                    <div class="list border-bottom my-3">
                        <a class="document-link" <?php if (isLogin()) { ?> onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" <?php } ?> href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id'] ?>">
                            <?php echo $document['documentNo']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <a class="btn btn-primary Links" href="citizen_legislative.php" id="LegislativeLink" data-title="BLTS - Legislative Documents">More</a>
            </div>
        </div>
        <div class="list-legislative col-4">
            <div class="bg-light p-5" style="background: url('../uploads/blts-bg.jpg') no-repeat center center / cover; height: 300px;">
                <div class="bg-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255, 255, 255, .1); /* Adjust the color and opacity as needed */ z-index: 0;"></div>
                <p class="text-light" style="font-size: 25px; z-index: 999; position: relative;">Please sign in to Bugasong Legislative Tracking System. We would like to know your thoughts and sentiments about our local laws and regulations. <a href="../views/login.php" class="btn btn-primary" style="font-size: 18px;">Login here</a></p>
            </div>
        </div>
    </div>
    <!-- <div class="masterlist-container col-12 mt-4">
        <h6 class="m-0 font-weight-bold text-primary text-start">Masterlist</h6>
        <div class="col-12">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" class="">
                <div class="d-flex align-items-end flex-wrap search-container justify-content-center">
                    <div class="keyword-input p-0 mr-2 mt-2 col-4">
                        <label for="keyword-input">Keyword(s):</label>
                        <input type="text" name="keyword" placeholder="Keyword(s)" class="form-control" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    </div>
                    <div class="type-selection p-0 mr-2 mt-2 col-3">
                        <label for="type-selection">Type:</label>
                        <select name="tag" id="tag" class="form-control">
                            <option value="">Select option:</option>
                            <?php foreach (getAllTagAsc('tag_name', null) as $tag) : ?>
                                <option value="<?php echo $tag['tag_id']; ?>" <?php echo (isset($_GET['tag']) && $_GET['tag'] == $tag['tag_id']) ? 'selected' : ''; ?>>
                                    <?php echo $tag['tag_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="date-input mr-2 mt-2">
                        <div class="d-flex p-0">
                            <div class="start-date mr-2">
                                <label for="start-date">Date Start:</label>
                                <input type="date" name="date_start" class="form-control" value="<?php echo isset($_GET['date_start']) ? htmlspecialchars($_GET['date_start']) : ''; ?>">
                            </div>
                            <div class="end-date mr-2">
                                <label for="end-date">Date End:</label>
                                <input type="date" name="date_end" class="form-control" value="<?php echo isset($_GET['date_end']) ? htmlspecialchars($_GET['date_end']) : ''; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-submit mt-2">
                        <button type="submit" name="search_ordinance" value="search_ordinance" class="btn btn-primary">Search</button>
                        <a class="btn btn-danger" href="citizen_legislative.php">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
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