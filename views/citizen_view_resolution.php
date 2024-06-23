<?php
@include('citizen_header.php');

redirectNotLogin();

?>

<!-- Content Wrapper -->
<div class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">View Resolution</h1>
            </div>
            <div class="back-button mb-3">
                <a href="../views/citizen_legislative.php" class="btn btn-primary">Back</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="form-container col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="ocrResults">
                                <?php $resolution = getResolutionByID($_GET['resolution_id']) ?>
                                <div class="d-flex flex-column text-center">
                                    <div class="mr-4">
                                        <label class="mt-2 text-primary" for="resolutionNo">Resolution No.</label>
                                        <div class="resolutionNo">
                                            <h5><?php echo $resolution['resolutionNo']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="mr-4">
                                        <label class="mt-2 text-primary" for="tag">Tag</label>
                                        <div class="tag">
                                            <h5><?php echo !empty(getTagByID($resolution['tag_id'])['tag_name']) ? getTagByID($resolution['tag_id'])['tag_name'] : ''; ?></h5>
                                        </div>
                                    </div>
                                    <div class="mr-4">
                                        <label class="mt-2 text-primary" for="title">Title</label>
                                        <div class="title">
                                            <h4><?php echo $resolution['title']; ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="document-view mt-2">
                                    <embed src="<?php echo $resolution['file']; ?>" type="application/pdf" width="100%" height="800px" />
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
</div>
<!-- End of Content Wrapper -->

<?php
@include('citizen_footer.php');
?>