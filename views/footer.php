</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<script src="../js/sweetalert2.min.js"></script>
<script src="../js/datatables.js"></script>
<script src="../js/datatables.min.js"></script>
<script src="../js/main.js"></script>


<?php if ($flash = getFlash('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            // iconColor: 'green',
            title: "<?php echo $flash; ?>",
            confirmButtonColor: '#4e73df',
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

<?php if ($flash = getFlash('failed')) : ?>
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: 'red',
            title: "<?php echo $flash; ?>",
            confirmButtonColor: '#4e73df',
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

</body>

</html>

<?php
ob_end_flush(); // Send output buffer
?>