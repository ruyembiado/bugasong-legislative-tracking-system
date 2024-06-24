<?php
@include('citizen_header.php');
redirectNotLogin();
?>

<div class="col-12" id="content">
    <!-- Content Row -->
    <div class="col-12 mt-5">
        <h1 class="h3 mb-0 text-gray-800 text-start">Advanced Search:</h1>
        <h1 class="h4 mb-0 text-gray-800 text-start">Ordinances and Resolutions</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" class="mb-4">
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
                    <button type="submit" name="search_document" value="search_document" class="btn btn-primary">Search</button>
                    <a class="btn btn-danger" href="citizen_legislative.php">Reset</a>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex">
        <div class="document-lists col-5 p-0 mx-auto">
            <?php
            $keyword = $_GET['keyword'] ?? '';
            $tag = $_GET['tag'] ?? '';
            $date_start = $_GET['date_start'] ?? '';
            $date_end = $_GET['date_end'] ?? '';

            if (isset($_GET['search_document'])) {
                $documents = searchDocument($keyword, $tag, $date_start, $date_end);
            } else {
                $documents = getAllDocumentsDesc(999);
            }
            ?>
            <?php if (empty($documents)) : ?>
                <div class="row mx-auto">
                    <div class="alert alert-warning mx-auto" role="alert">
                        No results found.
                    </div>
                </div>
            <?php else : ?>
                <?php foreach ($documents as $document) : ?>
                    <div class="list border-bottom my-4">
                        <a class="document-link" onclick="addDocumentView('<?php echo user_id(); ?>', '<?php echo $document['document_type']; ?>', <?php echo $document['id']; ?>)" href="<?php echo ($document['document_type'] === 'resolution') ? 'citizen_view_resolution.php?resolution_id=' . $document['id'] : 'citizen_view_ordinance.php?ordinance_id=' . $document['id']; ?>">
                            <h1 class="h4 m-0 font-weight-bold text-primary">
                                <?php echo $document['documentNo']; ?>
                            </h1>
                        </a>
                        <div class="date">Date Added: <?php echo date('M d Y', strtotime($document['date_added'])); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-6"></div>
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