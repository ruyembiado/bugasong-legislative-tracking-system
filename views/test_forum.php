<?php
@include('header.php');
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

            <?php
            $topic = "1";
            $message = "1";
            $result = AnalyzePost($topic, $message);

            // Display the status and reason with line breaks
            if ($result['status'] === 'approved') {
                echo "Post Status: Approved<br>";
                echo "Reason: " . $result['reason'] . "<br>";
            } else {
                echo "Post Status: Pending<br>";
                echo "Reason: " . $result['reason'] . "<br>";
            }

            // Pretty print the result with line breaks
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            ?>
        </div>

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
<!-- End of Content Wrapper --
<?php
@include('footer.php');
