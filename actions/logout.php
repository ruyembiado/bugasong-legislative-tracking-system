<?php
require_once '../config/config.php';

if (isLogin()) {
    // Log History
    create_log_history($_SESSION['user_id'], 'Logout', '');
}

session_destroy();

redirect('index', '');

?>
<!-- <script>
    setInterval(function() {
        localStorage.setItem("activeLink", "dashboard");
        window.location.href = "../views/index.php"; // Change this to redirect your homepage
    }, 100);
</script> -->