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
                    <h1 class="h3 mb-0 text-gray-800">User's Views of Documents Report</h1>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-white py-3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" class="mb-4">
                            <div class="d-flex align-items-end flex-wrap search-container justify-content-center">
                                <div class="type-selection p-0 mr-2 mt-2 col-2">
                                    <label for="type-selection">Document Type:</label>
                                    <select name="document_type" id="document_type" class="form-control">
                                        <option value="">Select option:</option>
                                        <?php
                                        $selected_document_type = $_GET['document_type'] ?? '';
                                        foreach (document_types() as $key => $value) :
                                        ?>
                                            <option value="<?php echo $key; ?>" <?php echo ($key == $selected_document_type) ? 'selected' : ''; ?>>
                                                <?php echo $value; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="date-input mr-2 mt-2">
                                    <div class="d-flex p-0">
                                        <div class="start-date mr-2">
                                            <label for="start-date">Date Added Start:</label>
                                            <input type="date" name="date_added_start" class="form-control" value="<?php echo isset($_GET['date_added_start']) ? htmlspecialchars($_GET['date_added_start']) : ''; ?>">
                                        </div>
                                        <div class="end-date">
                                            <label for="end-date">Date Added End:</label>
                                            <input type="date" name="date_added_end" class="form-control" value="<?php echo isset($_GET['date_added_end']) ? htmlspecialchars($_GET['date_added_end']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="date-input mr-2 mt-2">
                                    <div class="d-flex p-0">
                                        <div class="start-date mr-2">
                                            <label for="start-date">Date Published Start:</label>
                                            <input type="date" name="date_publish_start" class="form-control" value="<?php echo isset($_GET['date_publish_start']) ? htmlspecialchars($_GET['date_publish_start']) : ''; ?>">
                                        </div>
                                        <div class="end-date">
                                            <label for="end-date">Date Published End:</label>
                                            <input type="date" name="date_publish_end" class="form-control" value="<?php echo isset($_GET['date_publish_end']) ? htmlspecialchars($_GET['date_publish_end']) : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="date-input mr-2 mt-2">
                                    <div class="d-flex p-0">
                                        <div class="end-date">
                                            <label for="end-date">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select option:</option>
                                                <?php
                                                $selected_status = $_GET['status'] ?? '';
                                                foreach (document_status() as $key => $value) :
                                                ?>
                                                    <option value="<?php echo $key; ?>" <?php echo ($key == $selected_status) ? 'selected' : ''; ?>>
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-submit mt-2">
                                    <button type="submit" name="search_document_report" value="search_document_report" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-danger" href="admin_report_document.php">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="print-button bg-white card-header text-right">
                        <button id="printButton" class="btn btn-primary">Print</button>
                    </div>

                    <?php
                    $document_type = $_GET['document_type'] ?? '';
                    $date_added_start = $_GET['date_added_start'] ?? '';
                    $date_added_end = $_GET['date_added_end'] ?? '';
                    $date_publish_start = $_GET['date_publish_start'] ?? '';
                    $date_publish_end = $_GET['date_publish_end'] ?? '';
                    $status = $_GET['status'] ?? '';

                    if (isset($_GET['search_document_report'])) {
                        $documents = searchDocumentReport($document_type, $date_added_start, $date_added_end, $date_publish_start, $date_publish_end, $status);
                    } else {
                        $documents = getAllDocumentsReport(999);
                    }
                    ?>

                    <div class="card-body">
                        <div class="table-responsive">
                            <?php if (empty($documents)) : ?>
                                <p class="text-center">No documents found.</p>
                            <?php else : ?>
                                <div id="print-area">
                                    <div id="print-container">
                                        <h4 class="m-0 font-weight-bold text-dark mb-4 text-center">Views of Documents Report</h4>
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Document</th>
                                                    <th>Tag</th>
                                                    <th>No. of Viewers</th>
                                                    <th>Date Added</th>
                                                    <th>Date Published</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1; ?>
                                                <?php foreach ($documents as $document) :  ?>
                                                    <tr>
                                                        <td><?php echo $count++; ?></td>
                                                        <td class="text-gray-800"><?php echo $document['documentNo']; ?></td>
                                                        <td class="text-gray-800"><?php echo isset(getTagByID($document['tag_id'])['tag_name']) ? getTagByID($document['tag_id'])['tag_name'] : ''; ?></td>
                                                        <td class="text-gray-800"><?php echo countViewers($document['id']); ?></td>
                                                        <td class="text-gray-800"><?php echo date('M d Y h:i:s a', strtotime($document['date_added'])); ?></td>
                                                        <td class="text-gray-800">
                                                            <?php echo ($document['status'] == 1) ? date('M d Y h:i:s a', strtotime($document['date_publish'])) : ''; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($document['status'] == '0') ? '<p>Unpublished</p>' : '<p>Published</p>' ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById('printButton');
        if (!printButton) return; // Ensure printButton exists

        printButton.addEventListener('click', function() {
            // Get the table to print
            const printArea = document.getElementById('print-area');
            if (!printArea) {
                console.error('Print area element not found.');
                return;
            }

            // Adjust table style for printing (remove borders)
            const printContainer = printArea.querySelector('#print-container');
            if (!printContainer) {
                console.error('Table element not found inside print area.');
                return;
            }
            printContainer.style.border = 'none'; // Remove borders for printing

            // Create a copy of the printContainer to print
            const clonedTable = printContainer.cloneNode(true);

            // Hide all other elements on the page
            const bodyChildren = document.body.children;
            for (const child of bodyChildren) {
                if (child !== printArea) {
                    child.style.display = 'none';
                }
            }

            // Append the cloned printContainer to the body
            document.body.appendChild(clonedTable);

            // Print the printContainer
            window.print();

            // Clean up: remove cloned printContainer and restore original elements
            document.body.removeChild(clonedTable);
            for (const child of bodyChildren) {
                child.style.display = ''; // Restore display of other elements
            }
        });
    });
</script>