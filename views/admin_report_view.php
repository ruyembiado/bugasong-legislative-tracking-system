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
                                    <label for="type-selection">Document Category:</label>
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
                                        <div class="month mr-2">
                                            <label for="month">Month:</label>
                                            <select name="month" id="month" class="form-control">
                                                <option value="">Select Month</option>
                                                <option value="01" <?php echo (isset($_GET['month']) && $_GET['month'] == '01') ? 'selected' : ''; ?>>January</option>
                                                <option value="02" <?php echo (isset($_GET['month']) && $_GET['month'] == '02') ? 'selected' : ''; ?>>February</option>
                                                <option value="03" <?php echo (isset($_GET['month']) && $_GET['month'] == '03') ? 'selected' : ''; ?>>March</option>
                                                <option value="04" <?php echo (isset($_GET['month']) && $_GET['month'] == '04') ? 'selected' : ''; ?>>April</option>
                                                <option value="05" <?php echo (isset($_GET['month']) && $_GET['month'] == '05') ? 'selected' : ''; ?>>May</option>
                                                <option value="06" <?php echo (isset($_GET['month']) && $_GET['month'] == '06') ? 'selected' : ''; ?>>June</option>
                                                <option value="07" <?php echo (isset($_GET['month']) && $_GET['month'] == '07') ? 'selected' : ''; ?>>July</option>
                                                <option value="08" <?php echo (isset($_GET['month']) && $_GET['month'] == '08') ? 'selected' : ''; ?>>August</option>
                                                <option value="09" <?php echo (isset($_GET['month']) && $_GET['month'] == '09') ? 'selected' : ''; ?>>September</option>
                                                <option value="10" <?php echo (isset($_GET['month']) && $_GET['month'] == '10') ? 'selected' : ''; ?>>October</option>
                                                <option value="11" <?php echo (isset($_GET['month']) && $_GET['month'] == '11') ? 'selected' : ''; ?>>November</option>
                                                <option value="12" <?php echo (isset($_GET['month']) && $_GET['month'] == '12') ? 'selected' : ''; ?>>December</option>
                                            </select>
                                        </div>
                                        <div class="year">
                                            <label for="year">Year:</label>
                                            <select name="year" id="year" class="form-control">
                                                <option value="">Select Year</option>
                                                <?php
                                                $currentYear = date("Y");
                                                $selectedYear = $_GET['year'] ?? '';
                                                for ($year = $currentYear; $year >= 1900; $year--) {
                                                    echo "<option value=\"$year\"" . ($selectedYear == $year ? ' selected' : '') . ">$year</option>";
                                                }
                                                ?>
                                            </select>
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
                                    <button type="submit" name="search_document_view" value="search_document_view" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-danger" href="admin_report_view.php">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                    $document_type = $_GET['document_type'] ?? '';
                    $_month = $_GET['month'] ?? '';
                    $_year = $_GET['year'] ?? '';
                    $status = $_GET['status'] ?? '';

                    if (isset($_GET['search_document_view'])) {
                        $documents = searchDocumentReport($document_type, $_month, $_year, $status);;
                    } else {
                        $documents = getAllDocumentsReport(999);
                    }

                    $totalViews = 0;
                    foreach ($documents as $document) :
                        // Get the number of viewers for the current document
                        $viewersCount = countViewers($document['id']);
                        // Add the viewers count to the total
                        $totalViews += $viewersCount;
                    endforeach;
                    ?>

                    <div class="d-flex justify-content-between align-items-center print-button bg-white card-header text-right">
                        <div style="text-align: right;">
                            <strong>Number of Views: <?php echo $totalViews; ?></strong>
                        </div>
                        <button id="printButton" class="btn btn-primary">Print</button>
                    </div>

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
                                                <?php
                                                $count = 1;
                                                $totalViews = 0; // Initialize total views counter
                                                ?>
                                                <?php foreach ($documents as $document) : ?>
                                                    <?php
                                                    // Get the number of viewers for the current document
                                                    $viewersCount = countViewers($document['id']);
                                                    // Add the viewers count to the total
                                                    $totalViews += $viewersCount;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count++; ?></td>
                                                        <td class="text-gray-800"><?php echo $document['documentNo']; ?></td>
                                                        <td class="text-gray-800">
                                                            <?php
                                                            echo $document['document_type'] === 'ordinance'
                                                                ? getOrdinanceCatByID($document['cat_id'])['ordinance_category_name']
                                                                : ($document['document_type'] === 'resolution'
                                                                    ? getResolutionCatByID($document['cat_id'])['resolution_category_name']
                                                                    : '');
                                                            ?>
                                                        </td>
                                                        <td class="text-gray-800"><?php echo $viewersCount; ?></td>
                                                        <td class="text-gray-800"><?php echo date('F d Y h:i:s a', strtotime($document['date_added'])); ?></td>
                                                        <td class="text-gray-800">
                                                            <?php echo ($document['status'] == 1) ? date('F d Y h:i:s a', strtotime($document['date_publish'])) : ''; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($document['status'] == '0') ? '<p>Unpublished</p>' : '<p>Published</p>' ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div style="text-align: right;">
                                            <strong>Total Views: <?php echo $totalViews; ?></strong>
                                        </div>
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