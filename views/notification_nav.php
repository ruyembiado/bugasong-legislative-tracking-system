<?php
$notifications = getMyNotification($_SESSION['user_id']); // Fetch all notifications
$unreadNotifications = getMyNotification($_SESSION['user_id'], null, true); // Fetch only unread notifications
$unreadCount = count($unreadNotifications); // Count unread notifications
?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter"><?php echo $unreadCount ?: ''; ?></span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="notification-alert dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">Notifications</h6>
        <div class="notication-container">
            <?php if ($notifications) : ?>
                <?php foreach ($notifications as $notification) : ?>
                    <a class="dropdown-item d-flex align-items-center" href="view_post.php?post_id=<?php echo $notification['post_id']; ?>&read_notification=<?php echo $notification['notification_id']; ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-<?php echo $notification['is_read'] == 0 ? 'primary' : 'secondary'; ?>">
                                <i class="fas fa-bell text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?php echo date('F d Y h:i:s a', strtotime($notification['date_added'])); ?></div>
                            <span class="font-weight-<?php echo $notification['is_read'] == 0 ? 'bold' : 'normal'; ?>"><?php echo $notification['notification_content']; ?></span>
                        </div>
                    </a>
                <?php endforeach ?>
            <?php else : ?>
                <p class="dropdown-item text-center text-gray-500 mb-0">No notification</p>
            <?php endif; ?>
        </div>
    </div>
</li>