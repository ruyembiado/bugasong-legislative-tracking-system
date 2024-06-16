<?php
require_once 'session.php';
function getValue($fieldName)
{
    if (isset($_SESSION['inputs'][$fieldName])) {
        return htmlspecialchars($_SESSION['inputs'][$fieldName]);
    }
    return isset($_POST[$fieldName]) ? htmlspecialchars($_POST[$fieldName]) : '';
}
function redirect($location, $data = [])
{
    $url = "../views/" . $location . ".php";
    if (!empty($data)) {
        $url .= "?" . http_build_query($data);
    }
    header("Location: " . $url);
    exit;
}
function removeValue()
{
    if (isset($_SESSION['inputs'])) {
        unset($_SESSION['inputs']);
    }
}
function retainValue()
{
    $_SESSION['inputs'] = $_POST;
}
function setFlash($type, $message)
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash($type)
{
    if (isset($_SESSION['flash']['type']) && $_SESSION['flash']['type'] == $type) {
        $message = $_SESSION['flash']['message'];
        unset($_SESSION['flash']);
        return $message;
    }
    return false;
}

function showError($errorName)
{
    if (isset($_GET[$errorName])) {
        return $_GET[$errorName];
    }
}

function isLogin()
{
    return isset($_SESSION['isLogin']);
}

function redirectNotLogin()
{
    if (!isset($_SESSION['isLogin'])) {
        session_destroy();
        setFlash('failed', 'Login first!');
        redirect('index');
    }
}

function isAdmin()
{
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
}

function isMember()
{
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'citizen';
}

function logUsername()
{
    $users = find('users', ['user_id' => $_SESSION['user_id']]);
    return !empty($users) ? $users['username'] : null;
}

function logName()
{
    $users = find('users', ['user_id' => $_SESSION['user_id']]);
    return !empty($users) ? $users['name'] : null;
}

function logUsertype()
{
    return $_SESSION['user_type'];
}

function user_id()
{
    return $_SESSION['user_id'];
}

function getAllPostDesc($limit)
{
    return findAll('posts', 'post_id', 'DESC', $limit);
}

function getAllPostAsc($limit)
{
    return findAll('posts', 'post_id', 'ASC', $limit);
}

function getAllPostRand()
{
    return findAll('posts', 'RAND()');
}

function getPostUser($post_id)
{
    return joinTable("users", [["posts", "users.user_id", "posts.user_id"]], ["posts.post_id" => $post_id]);
}

function getAllResolutionsDesc($limit)
{
    return findAll('resolutions', 'resolution_id', 'DESC', $limit);
}

function getAllOrdinancesDesc($limit)
{
    return findAll('ordinances', 'ordinance_id', 'DESC', $limit);
}

function getAllResolutionsAsc($limit)
{
    return findAll('resolutions', 'resolution_id', 'ASC', $limit);
}

function getAllOrdinancesAsc($limit)
{
    return findAll('ordinances', 'ordinance_id', 'ASC', $limit);
}

function getResolutionByID($id)
{
    return find('resolutions', ['resolution_id' => $id]);
}

function getOrdinanceByID($id)
{
    return find('ordinances', ['ordinance_id' => $id]);
}

function searchResolutions($keyword, $tag, $date_start, $date_end)
{
    global $conn;

    $query = "SELECT * FROM resolutions WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($keyword)) {
        $query .= " AND (title LIKE ? OR resolutionNo LIKE ? OR whereasClauses LIKE ? OR resolvingClauses LIKE ? OR optionalClauses LIKE ? OR approvalDetails LIKE ?)";
        $keywordParam = '%' . $keyword . '%';
        for ($i = 0; $i < 6; $i++) {
            $params[] = $keywordParam;
            $types .= "s";
        }
    }

    if (!empty($tag)) {
        $query .= " AND tag_id = ?";
        $params[] = $tag;
        $types .= "s";
    }

    if (!empty($date_start)) {
        $query .= " AND date_added >= ?";
        $params[] = $date_start;
        $types .= "s";
    }

    if (!empty($date_end)) {
        $query .= " AND date_added <= ?";
        $params[] = $date_end;
        $types .= "s";
    }

    $stmt = mysqli_prepare($conn, $query);
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function searchOrdinances($keyword, $tag, $date_start, $date_end)
{
    global $conn;

    $query = "SELECT * FROM ordinances WHERE 1=1";
    $params = [];
    $types = "";

    if (!empty($keyword)) {
        $query .= " AND (title LIKE ? OR ordinanceNo LIKE ? OR preamble LIKE ? OR enactingClause LIKE ? OR body LIKE ? OR repealingClause LIKE ? OR effectivityClause LIKE ? OR enactmentDetails LIKE ?)";
        $keywordParam = '%' . $keyword . '%';
        for ($i = 0; $i < 8; $i++) {
            $params[] = $keywordParam;
            $types .= "s";
        }
    }

    if (!empty($tag)) {
        $query .= " AND tag_id = ?";
        $params[] = $tag;
        $types .= "s";
    }

    if (!empty($date_start)) {
        $query .= " AND date_added >= ?";
        $params[] = $date_start;
        $types .= "s";
    }

    if (!empty($date_end)) {
        $query .= " AND date_added <= ?";
        $params[] = $date_end;
        $types .= "s";
    }

    $stmt = mysqli_prepare($conn, $query);
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function countReaction($post_id, $reaction_type)
{
    global $conn;

    $query = "SELECT COUNT(*) AS reaction_count FROM post_reactions WHERE post_id = ? AND post_reaction = ?";
    $stmt = mysqli_prepare($conn, $query);
    $stmt->bind_param("is", $post_id, $reaction_type);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['reaction_count'];
}

function userLikedPost($post_id, $user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM post_reactions WHERE post_id = ? AND user_id = ? AND post_reaction = 'liked'");
    $stmt->bind_param('ii', $post_id, $user_id);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

function userDislikedPost($post_id, $user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM post_reactions WHERE post_id = ? AND user_id = ? AND post_reaction = 'disliked'");
    $stmt->bind_param('ii', $post_id, $user_id);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

function clearFormSession()
{
    $currentUri = $_SERVER['REQUEST_URI'];
    $resolutionPage = '/blts/views/admin_add_resolution.php';
    $ordinancePage = '/blts/views/admin_add_ordinance.php';
    $ordinancePage = '/blts/views/citizen_resolution.php';

    if (strpos($currentUri, $resolutionPage) === false && strpos($currentUri, $ordinancePage) === false) {
        removeValue();
    }
}

function isForumPage()
{
    $forum_page = '/blts/views/citizen_forum.php';
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return $forum_page === $currentUri;
}


function formatWhereasClauses($text)
{
    return preg_replace('/(WHEREAS|WHEREFORE)/', '<br>$1', $text);
}

function formatResolvingClauses($text)
{
    $resolvedCount = 0;
    return preg_replace_callback('/(RESOLVED)/', function ($matches) use (&$resolvedCount) {
        $resolvedCount++;
        if ($resolvedCount === 1) {
            return $matches[0];
        }
        return '<br>' . $matches[0];
    }, $text);
}

function getAllTagDesc($orderby, $limit)
{
    return findAll('tags', $orderby, 'DESC', $limit);
}

function getAllTagAsc($orderby, $limit)
{
    return findAll('tags', $orderby, 'ASC', $limit);
}

function getTagByID($id)
{
    return find('tags', ['tag_id' => $id]);
}

function formatOrdinanceSection($text)
{
    // Use a regular expression to find "Section" followed by numbers and ensure it is followed by a newline
    $formattedText = preg_replace('/(Section\s*\d+\.)/', "\n$1\n", $text);

    // Remove any extra newlines that might be added before the first section
    $formattedText = preg_replace('/^\s+/', '', $formattedText);

    // Ensure there are no double newlines by replacing them with a single newline
    $formattedText = preg_replace('/\n+/', "\n", $formattedText);

    return nl2br($formattedText);
}

function getAllUsers()
{
    return find_where('users', ['user_type' => 'citizen']);
}

function getMyPosts($user_id, $limit = null)
{
    global $conn;
    $sql = "SELECT * 
            FROM posts p
            INNER JOIN users u ON p.user_id = u.user_id
            WHERE u.user_id = ?";
    if ($limit !== null) {
        $sql .= " LIMIT ?";
    }
    $stmt = $conn->prepare($sql);
    if ($limit !== null) {
        $stmt->bind_param("ii", $user_id, $limit);
    } else {
        $stmt->bind_param("i", $user_id);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $posts;
}

function getTopLikes($limit)
{
    global $conn;
    $sql = "
        SELECT p.post_id, p.topic, p.date_added, p.message, COUNT(pr.post_reaction) as like_count
        FROM posts p
        LEFT JOIN post_reactions pr ON p.post_id = pr.post_id AND pr.post_reaction = 'liked'
        GROUP BY p.post_id, p.topic
        HAVING like_count > 0
        ORDER BY like_count DESC
        LIMIT ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $topLikedPosts = [];
    while ($row = $result->fetch_assoc()) {
        $topLikedPosts[] = $row;
    }

    return $topLikedPosts;
}

function searchPost($keyword)
{
    global $conn;

    $keyword = '%' . $keyword . '%';
    $sql = "SELECT * FROM posts WHERE topic LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = [];
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
    $stmt->close();
    return $posts;
}

function countPostComments($post_id)
{
    global $conn;
    $sql = "SELECT COUNT(*) AS comment_count FROM post_comments WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['comment_count'];
}

function viewTopic($postId)
{
    global $conn;

    $sql = "SELECT * FROM posts WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    return $post;
}

function viewPostComments($post_id)
{
    global $conn;

    $sql = "
        SELECT *
        FROM post_comments
        WHERE post_id = ?
        ORDER BY date_added ASC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    return $comments;
}

function getUserData($user_id)
{
    global $conn;

    $sql = "
    SELECT *
    FROM users
    WHERE user_id = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function getAllUserPostDesc($user_id)
{
    return find_where('posts', ['user_id' => $user_id]);
}