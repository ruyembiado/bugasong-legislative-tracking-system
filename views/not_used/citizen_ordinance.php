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
                <h1 class="h3 mb-0 text-gray-800">Ordinances</h1>
            </div>

            <!-- Content Row -->
            <div class="row mb-3">
                <div class="col-12">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                        <div class="d-flex align-items-end flex-wrap search-container">
                            <div class="keyword-input p-0 mr-2 mt-2">
                                <label for="keyword-input">Keyword(s):</label>
                                <input type="text" name="keyword" placeholder="Keyword(s)" class="form-control" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                            </div>
                            <div class="type-selection p-0 mr-2 mt-2">
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
                                <a class="btn btn-danger" href="citizen_ordinance.php">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                if (isset($_GET['search_ordinance'])) {
                    $ordinances = searchOrdinances($_GET['keyword'], $_GET['tag'], $_GET['date_start'], $_GET['date_end']);
                } else {
                    $ordinances = getAllOrdinancesDescPublic(null);
                }
                ?>
                <?php if (empty($ordinances)) : ?>
                    <div class="row mx-auto">
                        <div class="alert alert-warning" role="alert">
                            No results found.
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($ordinances as $ordinance) : ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 citizen-document-list">
                            <a href="view_ordinance.php?ordinance_id=<?php echo $ordinance['ordinance_id']; ?>" class="citizen-view-document">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $ordinance['ordinanceNo']; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <?php echo substr($ordinance['title'], 0, 100) . '...'; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Content Row -->

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