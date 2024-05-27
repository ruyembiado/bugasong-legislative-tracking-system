<?php
@include('header.php');
redirectNotLogin();

require '../vendor/autoload.php';

use thiagoalessio\TesseractOCR\TesseractOCR;

// Function to check if Tesseract is installed
function isTesseractInstalled()
{
    $output = null;
    $retval = null;
    exec('tesseract -v', $output, $retval);
    return $retval === 0;
}

// Check if Tesseract is installed
if (!isTesseractInstalled()) {
    die('Error: Tesseract OCR is not installed or not found in PATH.');
}

// Check if the file is uploaded
if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // Get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Allowed file types
    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'pdf'];

    if (in_array($fileExtension, $allowedfileExtensions)) {
        // Directory where the file will be moved
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Perform OCR on the uploaded file
            $tesseract = new TesseractOCR($dest_path);
            $text = $tesseract->run();

            // Display the extracted text
            echo '<h3>Extracted Text:</h3>';
            echo '<pre>' . $text . '</pre>';
        } else {
            echo 'There was an error moving the uploaded file.';
        }
    } else {
        echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
} else {
    echo 'There was an error with the file upload.';
}
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Resolution Form</h6>
                    </div>
                    <div class="card-body">
                        <h2>Upload a file for OCR</h2>
                        <form action="add_resolution.php" method="post" enctype="multipart/form-data">
                            <label for="uploadedFile">Choose a file to upload:</label>
                            <input type="file" name="uploadedFile" id="uploadedFile">
                            <br><br>
                            <input type="submit" name="uploadBtn" value="Upload">
                        </form>
                        <!-- <form action="" method="POST">
                            <div class="d-flex">
                                <div class="m-1 col-4">
                                    <label class="labeles" style="font-size: 13px;">Resolution Title</label>
                                    <div class="d-flex align-items-center">
                                        <i style="font-size: 14px;" class="fas fa-user position-absolute pl-2 border-end border-secondary"></i>
                                        <input class="form-control" style="text-indent: 21px;" type="text" name="resolution_title" value="<?php echo getValue('resolution_title'); ?>" placeholder="Enter your resolution_title">
                                    </div>
                                    <?php if (showError('resolution_title')) : ?>
                                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('resolution_title'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="m-1 mb-3">
                                    <label class="labeles" style="font-size: 13px;">Password</label>
                                    <div class="d-flex align-items-center">
                                        <i style="font-size: 14px;" class="fas fa-key position-absolute pl-2 border-end border-secondary"></i>
                                        <input class="form-control" style="text-indent: 21px;" type="password" name="password" placeholder="Enter your password">
                                    </div>
                                    <?php if (showError('password')) : ?>
                                        <p class="error text-danger text-start m-0" style="font-size: 12px;"><?php echo showError('password'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="m-1 mb-4">
                                <button type="submit" name="user_login" class="button-size form-control btn-primary rounded" style="font-size: 14px;">Submit</button>
                            </div>
                        </form> -->
                    </div>
                </div>
                <!-- Content Row -->

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