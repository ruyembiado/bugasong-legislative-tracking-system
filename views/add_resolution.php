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
                    <h1 class="h3 mb-0 text-gray-800">Add Resolution</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="form-container col-4">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Upload files for OCR</h6>
                            </div>
                            <div class="card-body">
                                <form action="../actions/upload_document.php" method="post" enctype="multipart/form-data">
                                    <label for="uploadedFiles">Choose files to upload:</label>
                                    <input class="form-control-file mb-2 text-gray-800" type="file" multiple name="uploadedFiles[]" id="uploadedFiles">
                                    <div class="mb-0 d-flex justify-content-end">
                                        <input type="submit" class="btn btn-primary" name="uploadBtn" value="Upload">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Resolution Information</h6>
                            </div>
                            <div class="card-body">
                                <div id="ocrResults">
                                    <form id="resolutionForm" method="../actions/" enctype="multipart/form-data">
                                        <label for="resolutionNo">Resolution No:</label>
                                        <textarea rows="1" class="form-control text-gray-800" id="resolutionNo" name="resolutionNo"></textarea><br>

                                        <label for="title">Title:</label>
                                        <textarea rows="3" class="form-control text-gray-800" id="title" name="title"></textarea><br>

                                        <label for="whereasClauses">Whereas Clauses:</label>
                                        <textarea rows="10" class="form-control text-gray-800" id="whereasClauses" name="whereasClauses"></textarea><br>

                                        <label for="resolvingClause">Resolving Clause:</label>
                                        <textarea rows="10" class="form-control text-gray-800" id="resolvingClause" name="resolvingClause"></textarea><br>

                                        <label for="optionalClauses">Optional Clauses:</label>
                                        <textarea rows="10" class="form-control text-gray-800" id="optionalClauses" name="optionalClauses"></textarea><br>

                                        <label for="approvalDetails">Approval Details:</label>
                                        <textarea rows="10" class="form-control text-gray-800" id="approvalDetails" name="approvalDetails"></textarea><br>
                                        <div class="mb-0 d-flex justify-content-end">
                                            <button type="submit" name="add_resolution" class="btn btn-primary" value="add_resolution">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8 p-0">
                        <div class="card shadow mb-3">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Extracted File</h6>
                            </div>
                            <div class="card-body">
                                <div class="ocr-result-container">
                                    <div id="ocrResultsFile"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow mb-3">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Extracted Text</h6>
                            </div>
                            <div class="card-body">
                                <div class="ocr-result-container">
                                    <div id="ocrResultsText"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<?php
// Check if there is an error message in the URL parameter
if (isset($_GET['failed'])) {
    // Set the error message in the session
    $_SESSION['errorMessage'] = urldecode($_GET['failed']);
    // Redirect to the same page without the error message in the URL parameter
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}

// Check if there is an error message in the session
if (isset($_SESSION['errorMessage'])) {
    // Display error message
    echo '<div class="alert alert-danger">' . $_SESSION['errorMessage'] . '</div>';
    // Clear session message
    unset($_SESSION['errorMessage']);
}

?>

<script>
    document.querySelector('form[action="../actions/upload_document.php"]').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        fetch('../actions/upload_document.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Populate Resolution Information form
                    document.getElementById('resolutionNo').value = data.resolutionData.resolutionNo;
                    document.getElementById('title').value = data.resolutionData.title;
                    document.getElementById('whereasClauses').value = data.resolutionData.whereasClauses;
                    document.getElementById('resolvingClause').value = data.resolutionData.resolvingClause;
                    document.getElementById('optionalClauses').value = data.resolutionData.optionalClauses;
                    document.getElementById('approvalDetails').value = data.resolutionData.approvalDetails;

                    // Show Resolution Information
                    document.getElementById('ocrResults').style.display = 'block';

                    // Populate Extracted File section
                    var ocrResultsFileDiv = document.getElementById('ocrResultsFile');
                    var extractedImagesHtml = '';
                    data.uploadedFileUrls.forEach(function(url) {
                        if (url.endsWith('.jpg') || url.endsWith('.jpeg') || url.endsWith('.png')) {
                            extractedImagesHtml += '<img src="' + url + '" alt="Scanned Image" class="img-thumbnail" style="max-width: 100%; height: auto; margin-bottom: 10px;">';
                        } else if (url.endsWith('.pdf')) {
                            extractedImagesHtml += '<iframe src="' + url + '" type="application/pdf" toolbar="0" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="auto" style="margin-bottom: 10px; height: 500px;">';
                        }
                    });
                    ocrResultsFileDiv.innerHTML = extractedImagesHtml;

                    // Populate Extracted Text section
                    var ocrResultsTextDiv = document.getElementById('ocrResultsText');
                    ocrResultsTextDiv.innerHTML = data.extractedText;
                } else {
                    // Display error message as a flash message
                    Swal.fire({
                        icon: 'warning',
                        iconColor: 'red',
                        title: data.message,
                        confirmButtonColor: '#4e73df',
                        showConfirmButton: true,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>