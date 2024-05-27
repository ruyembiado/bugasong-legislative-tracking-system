<?php
require_once '../config/config.php';

session_destroy();

redirect('index', '');

?>
<!-- <script>
    setInterval(function() {
        localStorage.setItem("activeLink", "dashboard");
        window.location.href = "../views/index.php"; // Change this to redirect your homepage
    }, 100);
</script> -->