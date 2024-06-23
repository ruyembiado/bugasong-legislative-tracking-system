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
                <h1 class="h3 mb-0 text-gray-800">View Resolution</h1>
            </div>
            <div class="back-button mb-3">
                <?php
                $href = isMember() ? "citizen_resolution.php" : (isAdmin() ? "admin_resolution.php?manage" : redirect('dashboard', ''));
                ?>
                <a href="<?php echo $href; ?>" class="btn btn-primary">Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="form-container col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resolution Information</h6>
                        </div>
                        <div class="card-body">
                            <div id="ocrResults">
                                <?php $resolution = getResolutionByID($_GET['resolution_id']) ?>
                                <div class="d-flex">
                                    <div class="mr-4">
                                        <label class="mt-2 text-primary" for="resolutionNo">Resolution No.</label>
                                        <div class="resolutionNo">
                                            <?php echo $resolution['resolutionNo']; ?>
                                        </div>
                                    </div>
                                    <div class="mr-4">
                                        <label class="mt-2 text-primary" for="tag">Tag</label>
                                        <div class="tag">
                                            <?php echo !empty(getTagByID($resolution['tag_id'])['tag_name']) ? getTagByID($resolution['tag_id'])['tag_name'] : ''; ?>
                                        </div>
                                    </div>
                                </div>
                                <label class="mt-2 text-primary" for="title">Title</label>
                                <div class="title">
                                    <?php echo $resolution['title']; ?>
                                </div>
                                <!-- <label class="mt-0 text-primary" for="whereasClauses"></label> -->
                                <div class="whereasClauses">
                                    <?php echo formatWhereasClauses($resolution['whereasClauses']); ?>
                                </div>
                                <!-- <label class="mt-0 text-primary" for="resolvingClauses"></label> -->
                                <div class="resolvingClauses mt-2">
                                    <?php echo formatResolvingClauses($resolution['resolvingClauses']); ?>
                                </div>
                                <!-- <label class="mt-0 text-primary" for="optionalClauses"></label> -->
                                <div class="optionalClauses mt-2">
                                    <?php echo $resolution['optionalClauses']; ?>
                                </div>
                                <!-- <label class="mt-0 text-primary" for="approvalDetails"></label> -->
                                <div class="approvalDetails mt-2">
                                    <?php echo $resolution['approvalDetails']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- <script>
    // Event listener for uploadForm
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
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
                    document.getElementById('resolvingClauses').value = data.resolutionData.resolvingClauses;
                    document.getElementById('optionalClauses').value = data.resolutionData.optionalClauses;
                    document.getElementById('approvalDetails').value = data.resolutionData.approvalDetails;

                    // Show Resolution Information
                    document.getElementById('ocrResults').style.display = 'block';

                    // Update fileImages input with URLs
                    var fileInput = document.getElementById('file');
                    fileInput.value = data.uploadedFileUrls;

                    // Populate Extracted File section
                    var ocrResultsFileDiv = document.getElementById('ocrResultsFile');
                    var extractedImagesHtml = '';
                    data.uploadedFileUrls.forEach(function(url) {
                        if (url.endsWith('.jpg') || url.endsWith('.jpeg') || url.endsWith('.png')) {
                            extractedImagesHtml += '<img src="' + url + '" alt="Scanned Image" class="img-thumbnail" style="max-width: 100%; height: auto; margin-bottom: 10px;">';
                        } else if (url.endsWith('.pdf')) {
                            extractedImagesHtml += '<iframe src="' + url + '" type="application/pdf" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="500px" scrolling="auto" style="margin-bottom: 10px;"></iframe>';
                        }
                    });
                    ocrResultsFileDiv.innerHTML = extractedImagesHtml;
                    // Populate Extracted Text section
                    var ocrResultsTextDiv = document.getElementById('ocrResultsText');
                    ocrResultsTextDiv.innerHTML = '<pre style="white-space: pre-wrap; word-wrap: break-word;">' + data.extractedText + '</pre>';
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
</script> -->