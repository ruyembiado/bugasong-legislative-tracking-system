<?php
require_once 'session.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

date_default_timezone_set('Asia/Manila');

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
    global $conn;

    $query = "
        SELECT 
            post_id,
            user_id,
            topic,
            message,
            status,
            date_added
        FROM posts
        WHERE status = 1
        ORDER BY date_added DESC
        LIMIT ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as associative array
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $posts = [];
    }

    return $posts;
}

function getAllPostDescAdmin()
{
    global $conn;

    $query = "
        SELECT 
            post_id,
            user_id,
            topic,
            message,
            status,
            date_added
        FROM posts
        ORDER BY date_added DESC
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as associative array
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $posts = [];
    }

    return $posts;
}

function getAllPostAsc($limit)
{
    global $conn;

    $query = "
        SELECT 
            post_id,
            user_id,
            topic,
            message,
            status,
            date_added
        FROM posts
        WHERE status = 1
        ORDER BY date_added ASC
        LIMIT ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as associative array
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $posts = [];
    }

    return $posts;
}

function getAllPostRand()
{
    global $conn;

    $query = "
        SELECT 
            post_id,
            user_id,
            topic,
            message,
            status,
            date_added
        FROM posts
        WHERE status = 1
        ORDER BY RAND()
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as associative array
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $posts = [];
    }
    return $posts;
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
    $registerPages = ['/blts/views/admin_add_user.php', '/blts/views/register.php'];
    $loginPage = '/blts/views/index.php';

    $isRegisterPage = false;
    foreach ($registerPages as $page) {
        if (strpos($currentUri, $page) !== false) {
            $isRegisterPage = true;
            break;
        }
    }

    if (strpos($currentUri, $resolutionPage) === false && strpos($currentUri, $ordinancePage) === false && !$isRegisterPage && strpos($currentUri, $loginPage) === false) {
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

function getAllResolutionCatDesc($orderby, $limit)
{
    return findAll('resolution_cat', $orderby, 'DESC', $limit);
}

function getAllROrdinanceCatDesc($orderby, $limit)
{
    return findAll('ordinance_cat', $orderby, 'DESC', $limit);
}

function getAllResolutionCategoryAsc($orderby, $limit)
{
    return findAll('resolution_cat', $orderby, 'ASC', $limit);
}

function getAllOrdinanceCategoryAsc($orderby, $limit)
{
    return findAll('ordinance_cat', $orderby, 'ASC', $limit);
}

function getResolutionCatByID($id)
{
    return find('resolution_cat', ['resolution_cat_id' => $id]);
}

function getOrdinanceCatByID($id)
{
    return find('ordinance_cat', ['ordinance_cat_id' => $id]);
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
    $sql = "SELECT p.post_id, p.topic, p.message, p.status, p.date_added
            FROM posts p
            INNER JOIN users u ON p.user_id = u.user_id
            WHERE u.user_id = ? 
            ORDER BY p.date_added DESC";
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
        LEFT JOIN post_reactions pr ON p.post_id = pr.post_id AND pr.post_reaction = 'liked' AND p.status = 1
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
    $sql = "SELECT * FROM posts WHERE topic LIKE ? AND status='0'";
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

function findAllWhere($table, $where, $orderBy = null, $direction = 'ASC', $limit = null)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";

    // Handle where clause
    $conditions = [];
    $params = [];
    $types = "";
    foreach ($where as $column => $value) {
        $conditions[] = "$column = ?";
        $params[] = $value;
        $types .= "s"; // Assuming all values are strings; adjust if needed
    }
    $sql .= implode(' AND ', $conditions);

    // Handle sorting
    if ($orderBy) {
        $sql .= " ORDER BY $orderBy $direction";
    }

    // Handle limit
    if ($limit) {
        $sql .= " LIMIT $limit";
    }

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAllResolutionsDescPublic($limit)
{
    return findAllWhere('resolutions', ['status' => 1], 'resolution_id', 'DESC', $limit);
}

function getAllOrdinancesDescPublic($limit)
{
    return findAllWhere('ordinances', ['status' => 1], 'ordinance_id', 'DESC', $limit);
}

function getAllResolutionsAscPublic($limit)
{
    return findAllWhere('resolutions', ['status' => 1], 'resolution_id', 'ASC', $limit);
}

function getAllOrdinancesAscPublic($limit)
{
    return findAllWhere('ordinances', ['status' => 1], 'ordinance_id', 'ASC', $limit);
}

function getAllDocumentsDesc($limit)
{
    global $conn;
    $documents = [];

    $sql = "
            SELECT 
                o.ordinance_id AS id,
                o.user_id,
                oc.ordinance_cat_id AS cat_id,
                o.title,
                o.ordinanceNo AS documentNo,
                o.preamble,
                o.enactingClause,
                o.body,
                o.repealingClause,
                o.effectivityClause,
                o.enactmentDetails,
                o.file,
                o.date_added,
                o.status,
                'ordinance' AS document_type,
                o.date_publish,
                oc.ordinance_category_name AS category_name
            FROM ordinances o
            LEFT JOIN ordinance_cat oc ON o.ordinance_cat_id = oc.ordinance_cat_id
            WHERE o.status = 1
            UNION ALL
            SELECT 
                r.resolution_id AS id,
                r.user_id,
                rc.resolution_cat_id AS cat_id,
                r.title,
                r.resolutionNo AS documentNo,
                r.whereasClauses AS preamble,
                r.resolvingClauses AS enactingClause,
                r.optionalClauses AS body,
                '' AS repealingClause,
                '' AS effectivityClause,
                r.approvalDetails AS enactmentDetails,
                r.file,
                r.date_added,
                r.status,
                'resolution' AS document_type,
                r.date_publish,
                rc.resolution_category_name AS category_name
            FROM resolutions r
            LEFT JOIN resolution_cat rc ON r.resolution_cat_id = rc.resolution_cat_id
            WHERE r.status = 1
            ORDER BY date_added DESC
            LIMIT ?
        ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        throw new Exception('Database prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('i', $limit);
    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result) {
        $documents = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception('Result fetch failed: ' . $stmt->error);
    }

    return $documents;
}

function getAllDocumentsAsc($limit)
{
    global $conn;
    $documents = [];

    $sql = "
            SELECT 
                o.ordinance_id AS id,
                o.user_id,
                oc.ordinance_cat_id AS cat_id,
                o.title,
                o.ordinanceNo AS documentNo,
                o.preamble,
                o.enactingClause,
                o.body,
                o.repealingClause,
                o.effectivityClause,
                o.enactmentDetails,
                o.file,
                o.date_added,
                o.status,
                'ordinance' AS document_type,
                oc.ordinance_category_name AS category_name
            FROM ordinances o
            LEFT JOIN ordinance_cat oc ON o.ordinance_cat_id = oc.ordinance_cat_id
            WHERE o.status = 1
            UNION ALL
            SELECT 
                r.resolution_id AS id,
                r.user_id,
                rc.resolution_cat_id AS cat_id,
                r.title,
                r.resolutionNo AS documentNo,
                r.whereasClauses AS preamble,
                r.resolvingClauses AS enactingClause,
                r.optionalClauses AS body,
                '' AS repealingClause,
                '' AS effectivityClause,
                r.approvalDetails AS enactmentDetails,
                r.file,
                r.date_added,
                r.status,
                'resolution' AS document_type,
                rc.resolution_category_name AS category_name
            FROM resolutions r
            LEFT JOIN resolution_cat rc ON r.resolution_cat_id = rc.resolution_cat_id
            WHERE r.status = 1
            ORDER BY id ASC
            LIMIT ?
        ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        throw new Exception('Database prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('i', $limit);
    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result) {
        $documents = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception('Result fetch failed: ' . $stmt->error);
    }

    return $documents;
}

function isHomePage()
{
    $home_page = '/blts/views/citizen_home.php';
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return $home_page === $currentUri;
}

function searchDocument($keyword, $category_name, $date_start, $date_end)
{
    global $conn;

    // Initialize arrays for conditions, parameters, and types
    $conditions_resolutions = [];
    $conditions_ordinances = [];
    $params_resolutions = [];
    $params_ordinances = [];
    $types_resolutions = "";
    $types_ordinances = "";

    // Query for resolutions
    $query_resolutions = "
        SELECT 
            resolution_id AS id,
            r.user_id,
            r.resolution_cat_id,
            r.title,
            r.resolutionNo AS documentNo,
            r.whereasClauses AS preamble,
            r.resolvingClauses AS body,
            '' AS repealingClause,
            '' AS effectivityClause,
            r.approvalDetails AS enactmentDetails,
            r.file,
            r.date_added,
            r.status,
            'resolution' AS document_type
        FROM resolutions r
        LEFT JOIN resolution_cat rc ON r.resolution_cat_id = rc.resolution_cat_id
        WHERE r.status = 1
    ";

    // Adding conditions for resolutions based on parameters
    if (!empty($keyword)) {
        $keywordParam = '%' . $keyword . '%';
        $conditions_resolutions[] = "(
            r.title LIKE ? OR
            r.resolutionNo LIKE ? OR
            r.whereasClauses LIKE ? OR
            r.resolvingClauses LIKE ? OR
            r.approvalDetails LIKE ? OR
            r.file LIKE ?
        )";
        $params_resolutions = array_merge($params_resolutions, array_fill(0, 6, $keywordParam));
        $types_resolutions .= str_repeat("s", 6);
    }

    if (!empty($category_name)) {
        $conditions_resolutions[] = "rc.resolution_category_name = ?";
        $params_resolutions[] = $category_name;
        $types_resolutions .= "s";
    }

    if (!empty($date_start)) {
        $conditions_resolutions[] = "r.date_added >= ?";
        $params_resolutions[] = $date_start;
        $types_resolutions .= "s";
    }

    if (!empty($date_end)) {
        $conditions_resolutions[] = "r.date_added <= ?";
        $params_resolutions[] = $date_end;
        $types_resolutions .= "s";
    }

    // Constructing the WHERE clause for resolutions
    if (!empty($conditions_resolutions)) {
        $query_resolutions .= " AND (" . implode(") AND (", $conditions_resolutions) . ")";
    }

    // Query for ordinances
    $query_ordinances = "
        SELECT 
            ordinance_id AS id,
            o.user_id,
            o.ordinance_cat_id,
            o.title,
            o.ordinanceNo AS documentNo,
            o.preamble,
            o.enactingClause AS body,
            o.repealingClause,
            o.effectivityClause,
            o.enactmentDetails,
            o.file,
            o.date_added,
            o.status,
            'ordinance' AS document_type
        FROM ordinances o
        LEFT JOIN ordinance_cat oc ON o.ordinance_cat_id = oc.ordinance_cat_id
        WHERE o.status = 1
    ";

    // Adding conditions for ordinances based on parameters
    if (!empty($keyword)) {
        $keywordParam = '%' . $keyword . '%';
        $conditions_ordinances[] = "(
            o.title LIKE ? OR
            o.ordinanceNo LIKE ? OR
            o.preamble LIKE ? OR
            o.enactingClause LIKE ? OR
            o.body LIKE ? OR
            o.repealingClause LIKE ? OR
            o.effectivityClause LIKE ? OR
            o.enactmentDetails LIKE ? OR
            o.file LIKE ?
        )";
        $params_ordinances = array_merge($params_ordinances, array_fill(0, 9, $keywordParam));
        $types_ordinances .= str_repeat("s", 9);
    }

    if (!empty($category_name)) {
        $conditions_ordinances[] = "oc.ordinance_category_name = ?";
        $params_ordinances[] = $category_name;
        $types_ordinances .= "s";
    }

    if (!empty($date_start)) {
        $conditions_ordinances[] = "o.date_added >= ?";
        $params_ordinances[] = $date_start;
        $types_ordinances .= "s";
    }

    if (!empty($date_end)) {
        $conditions_ordinances[] = "o.date_added <= ?";
        $params_ordinances[] = $date_end;
        $types_ordinances .= "s";
    }

    // Constructing the WHERE clause for ordinances
    if (!empty($conditions_ordinances)) {
        $query_ordinances .= " AND (" . implode(") AND (", $conditions_ordinances) . ")";
    }

    // Combine resolutions and ordinances queries using UNION ALL
    $query = "($query_resolutions) UNION ALL ($query_ordinances)";

    // Adding ORDER BY clause
    $query .= " ORDER BY date_added DESC";

    // Prepare and execute the query
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        if (!empty($params_resolutions) && !empty($params_ordinances)) {
            $params = array_merge($params_resolutions, $params_ordinances);
            $types = $types_resolutions . $types_ordinances;
            $stmt->bind_param($types, ...$params);
        } elseif (!empty($params_resolutions)) {
            $stmt->bind_param($types_resolutions, ...$params_resolutions);
        } elseif (!empty($params_ordinances)) {
            $stmt->bind_param($types_ordinances, ...$params_ordinances);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all rows as associative array
        $documents = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Handle query preparation error
        die('MySQL Error: ' . mysqli_error($conn));
    }

    return $documents;
}

function getOrdinanceViewCount($ordinance_id)
{
    global $conn;
    // SQL query to count the views for a specific ordinance
    $query = "
        SELECT 
            o.ordinance_id, 
            COUNT(dv.document_id) AS view_count
        FROM 
            ordinances o
        LEFT JOIN 
            document_views dv 
        ON 
            o.ordinance_id = dv.document_id
        WHERE 
            o.ordinance_id = ?
        GROUP BY 
            o.ordinance_id;
    ";

    // Prepare and execute the query
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $ordinance_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Return the view count for the specified ordinance
    if ($row) {
        return $row['view_count'];
    } else {
        return 0; // Return 0 if no views found (optional handling)
    }
}

function getResolutionViewCount($resolution_id)
{
    global $conn;
    // SQL query to count the views for a specific resolution
    $query = "
        SELECT 
            o.resolution_id, 
            COUNT(dv.document_id) AS view_count
        FROM 
            resolutions o
        LEFT JOIN 
            document_views dv 
        ON 
            o.resolution_id = dv.document_id
        WHERE 
            o.resolution_id = ?
        GROUP BY 
            o.resolution_id;
    ";

    // Prepare and execute the query
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $resolution_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Return the view count for the specified resolution
    if ($row) {
        return $row['view_count'];
    } else {
        return 0; // Return 0 if no views found (optional handling)
    }
}

function clearOTP()
{

    $currentUri = $_SERVER['REQUEST_URI'];
    $otp_page = '/blts/views/reset_otp.php';

    if (strpos($currentUri, $otp_page) === false) {
        unset($_SESSION['otp']);
    }
}

function clearPassVerification()
{
    $currentUri = $_SERVER['REQUEST_URI'];
    $reset_page = '/blts/views/reset_password.php';

    if (strpos($currentUri, $reset_page) === false) {
        unset($_SESSION['reset_verified']);
    }
}

function document_types()
{
    $types = array(
        'resolution' => 'Resolution',
        'ordinance' => 'Ordinance',
    );

    return $types;
}

function document_status()
{
    $status = array(
        '1' => 'Published',
        '0' => 'Unpublished',
    );

    return $status;
}

function searchDocumentReport($document_type, $_month, $_year, $status)
{
    global $conn;

    // Initialize arrays for conditions, parameters, and types
    $conditions_resolutions = [];
    $conditions_ordinances = [];
    $params_resolutions = [];
    $params_ordinances = [];
    $types_resolutions = "";
    $types_ordinances = "";

    // Query for resolutions
    $query_resolutions = "
        SELECT 
            resolution_id AS id,
            user_id,
            resolution_cat_id AS cat_id,
            title,
            resolutionNo AS documentNo,
            whereasClauses AS preamble,
            resolvingClauses AS body,
            '' AS repealingClause,
            '' AS effectivityClause,
            approvalDetails AS enactmentDetails,
            file,
            date_added,
            date_publish,
            status,
            'resolution' AS document_type
        FROM resolutions
        WHERE 1=1
    ";

    // Adding conditions for resolutions based on month and year
    if (!empty($_month)) {
        $conditions_resolutions[] = "MONTH(date_added) = ?";
        $params_resolutions[] = $_month;
        $types_resolutions .= "i"; // Assuming month is an integer
    }

    if (!empty($_year)) {
        $conditions_resolutions[] = "YEAR(date_added) = ?";
        $params_resolutions[] = $_year;
        $types_resolutions .= "i"; // Assuming year is an integer
    }

    if ($status !== '') {
        $conditions_resolutions[] = "status = ?";
        $params_resolutions[] = $status;
        $types_resolutions .= "i"; // Assuming status is an integer
    }

    // Constructing the WHERE clause for resolutions
    if (!empty($conditions_resolutions)) {
        $query_resolutions .= " AND (" . implode(") AND (", $conditions_resolutions) . ")";
    }

    // Query for ordinances
    $query_ordinances = "
        SELECT 
            ordinance_id AS id,
            user_id,
            ordinance_cat_id AS cat_id,
            title,
            ordinanceNo AS documentNo,
            preamble,
            enactingClause AS body,
            repealingClause,
            effectivityClause,
            enactmentDetails,
            file,
            date_added,
            date_publish,
            status,
            'ordinance' AS document_type
        FROM ordinances
        WHERE 1=1
    ";

    // Adding conditions for ordinances based on month and year
    if (!empty($_month)) {
        $conditions_ordinances[] = "MONTH(date_added) = ?";
        $params_ordinances[] = $_month;
        $types_ordinances .= "i"; // Assuming month is an integer
    }

    if (!empty($_year)) {
        $conditions_ordinances[] = "YEAR(date_added) = ?";
        $params_ordinances[] = $_year;
        $types_ordinances .= "i"; // Assuming year is an integer
    }

    if ($status !== '') {
        $conditions_ordinances[] = "status = ?";
        $params_ordinances[] = $status;
        $types_ordinances .= "i"; // Assuming status is an integer
    }

    // Constructing the WHERE clause for ordinances
    if (!empty($conditions_ordinances)) {
        $query_ordinances .= " AND (" . implode(") AND (", $conditions_ordinances) . ")";
    }

    // Combine resolutions and ordinances queries using UNION ALL if no specific document type is provided
    if ($document_type === 'resolution') {
        $query = $query_resolutions;
        $params = $params_resolutions;
        $types = $types_resolutions;
    } elseif ($document_type === 'ordinance') {
        $query = $query_ordinances;
        $params = $params_ordinances;
        $types = $types_ordinances;
    } else {
        $query = "($query_resolutions) UNION ALL ($query_ordinances)";
        $params = array_merge($params_resolutions, $params_ordinances);
        $types = $types_resolutions . $types_ordinances;
    }

    // Adding ORDER BY clause
    $query .= " ORDER BY date_added DESC"; // Changed to DESC for descending order

    // Prepare and execute the query
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch all rows as associative array
        $documents = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Handle query preparation error
        die('MySQL Error: ' . mysqli_error($conn));
    }

    return $documents;
}


function getAllCategoryAsc($orderby)
{
    global $conn;
    $categories = [];

    $sql = "
            SELECT 
                ordinance_cat_id AS cat_id,
                ordinance_category_name AS category_name
            FROM ordinance_cat
            UNION ALL
            SELECT 
                resolution_cat_id AS cat_id,
                resolution_category_name AS category_name
            FROM resolution_cat
            ORDER BY {$orderby} ASC
        ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        throw new Exception('Database prepare failed: ' . $conn->error);
    }

    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result) {
        $categories = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception('Result fetch failed: ' . $stmt->error);
    }

    return $categories;
}


function getAllDocumentsReport($limit)
{
    global $conn;
    $sql = "
        SELECT 
            ordinance_id AS id,
            user_id,
            ordinance_cat_id AS cat_id,
            title,
            ordinanceNo AS documentNo,
            preamble,
            enactingClause,
            body,
            repealingClause,
            effectivityClause,
            enactmentDetails,
            file,
            date_added,
            status,
            'ordinance' AS document_type,
            date_publish
        FROM ordinances
        UNION ALL
        SELECT 
            resolution_id AS id,
            user_id,
            resolution_cat_id AS cat_id,
            title,
            resolutionNo AS documentNo,
            whereasClauses AS preamble,
            resolvingClauses AS enactingClause,
            optionalClauses AS body,
            '' AS repealingClause,
            '' AS effectivityClause,
            approvalDetails AS enactmentDetails,
            file,
            date_added,
            status,
            'resolution' AS document_type,
            date_publish
        FROM resolutions
        ORDER BY date_added ASC
        LIMIT ?
    ";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $documents = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $documents = [];
    }
    return $documents;
}

function searchPostReport($month, $year, $status)
{
    global $conn;
    $query = "SELECT * FROM posts WHERE 1=1";
    $params = [];

    // Add month and year filtering if both are provided
    if ($year && $month) {
        $query .= " AND YEAR(date_added) = ? AND MONTH(date_added) = ?";
        $params[] = $year;
        $params[] = $month;
    } elseif ($year) {  // If only the year is provided
        $query .= " AND YEAR(date_added) = ?";
        $params[] = $year;
    } elseif ($month) { // If only the month is provided
        $query .= " AND MONTH(date_added) = ?";
        $params[] = $month;
    }

    // Filter by status if provided
    if ($status !== '') {
        $query .= " AND status = ?";
        $params[] = $status;
    }

    // Prepare and execute the statement
    $stmt = $conn->prepare($query);
    if ($stmt) {
        if (!empty($params)) {
            // Prepare the types string based on parameter count
            $types = str_repeat('i', count($params) - 1) . 's'; // 'i' for month/year, 's' for status
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $posts = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $posts;
    } else {
        return [];
    }
}


function countViewers($document_id)
{
    global $conn;

    $sql = "SELECT COUNT(DISTINCT document_view_id) AS viewer_count 
            FROM document_views 
            WHERE document_id = $document_id 
            GROUP BY document_id";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['viewer_count'];
    } else {
        return 0; // Return 0 if no viewers found or error occurred
    }
}

function getSystemSettings()
{
    global $conn; // Assuming $conn is your mysqli connection object

    $query = "SELECT * FROM system_settings";
    $settings = array();

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $settings = $row;
        }
        $result->free();
    } else {
        // Handle error if query fails
        return false;
    }

    return $settings;
}

function countParticipants($post_id)
{
    global $conn;

    // Check if the connection is valid
    if (!$conn) {
        echo "Database connection error: " . mysqli_connect_error();
        return false;
    }

    // Prepare the SQL query to count distinct users who commented on a specific post_id, joining with posts table
    $query = "SELECT COUNT(DISTINCT pc.user_id) AS participant_count
              FROM post_comments pc
              JOIN posts p ON pc.post_id = p.post_id
              WHERE pc.post_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters
        $stmt->bind_param("i", $post_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();

            // Fetch the count
            $row = $result->fetch_assoc();
            $participant_count = $row['participant_count'];

            // Close the statement
            $stmt->close();

            return $participant_count;
        } else {
            // Handle execution error
            echo "Execution error: " . $stmt->error;
            return false;
        }
    } else {
        // Handle preparation error
        echo "Preparation error: " . $conn->error;
        return false;
    }
}


function ForumReport($limit)
{
    global $conn;

    $query = "
        SELECT 
            post_id,
            user_id,
            topic,
            message,
            status,
            date_added
        FROM posts
        ORDER BY date_added ASC
        LIMIT ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows as associative array
        $posts = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $posts = [];
    }

    return $posts;
}

function get_filename($file)
{
    $fileType = pathinfo($file, PATHINFO_EXTENSION);
    $file = basename($file);

    // if (strtolower($fileType) === 'jpeg' || strtolower($fileType) === 'jpg' || strtolower($fileType) === 'png') {
    //     return '<img src="../img/IMG.png" alt="Image" style="width: 50px; height: 50px;">'; 
    // } elseif (strtolower($fileType) === 'pdf') {
    //     return '<img src="../img/PDF.png" alt="PDF" style="width: auto; height: 50px;">'; 
    // } else {
    //     return $file; 
    // }
    return $file;
}

function isActiveMenu($page)
{
    $currentUri = $_SERVER['REQUEST_URI'];

    return strpos($currentUri, $page) !== false;
}

function clearSessionIfViews()
{
    // Get the current URI
    $currentUri = $_SERVER['REQUEST_URI'];

    // Check if the current URI ends with '/blts/views/'
    $targetSegment = '/blts/views/';
    $length = strlen($targetSegment);

    // Ensure the current URI ends with '/blts/views/' and is not a longer path
    if (substr($currentUri, -$length) === $targetSegment) {
        // Start the session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Clear all session variables
        $_SESSION = [];

        // Destroy the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Destroy the session
        session_destroy();
    }
}

clearSessionIfViews();

function getDocumentsByCategoryName($category_name)
{
    global $conn;

    $documents = [];

    $sql = "
        SELECT 
            o.ordinance_id AS id,
            o.file,
            o.ordinanceNo AS documentNo,
            'ordinance' AS document_type,
            oc.ordinance_category_name AS category_name
        FROM ordinances o
        INNER JOIN ordinance_cat oc ON o.ordinance_cat_id = oc.ordinance_cat_id
        WHERE oc.ordinance_category_name = ?
        UNION ALL
        SELECT 
            r.resolution_id AS id,
            r.file,
            r.resolutionNo AS documentNo,
            'resolution' AS document_type,
            rc.resolution_category_name AS category_name
        FROM resolutions r
        INNER JOIN resolution_cat rc ON r.resolution_cat_id = rc.resolution_cat_id
        WHERE rc.resolution_category_name = ?
    ";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        throw new Exception('Database prepare failed: ' . $conn->error);
    }

    // Bind the parameter for secure injection
    $stmt->bind_param("ss", $category_name, $category_name);

    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result) {
        $documents = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception('Result fetch failed: ' . $stmt->error);
    }

    return $documents;
}

function getAllLogHistoryDesc($limit)
{
    return findAll('log_history', 'log_history_id', 'DESC', $limit);
}

function AnalyzePost($topic, $message)
{
    try {
        // Load environment variables from the parent directory (where your .env file is)
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        // Get API key from environment variable
        $apiKey = $_ENV['OPENAI_API_KEY'] ?? null;
        if (!$apiKey) {
            throw new Exception('API key is missing.');
        }

        // Prepare the request data for GPT-3, asking to evaluate the content's appropriateness for readers
        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a content moderator. Your task is to evaluate whether a forum post is appropriate for publication based on its content. Please identify if the tone is offensive, harmful, or inappropriate.'],
                ['role' => 'user', 'content' => "Topic: $topic\nMessage: $message\n\nPlease assess if this post is suitable for publication. If it contains offensive or inappropriate language, please advise whether it should be unpublished, and provide reasoning."]
            ],
            'max_tokens' => 150,
        ];

        // Set up cURL to make the API request to OpenAI
        $url = 'https://api.openai.com/v1/chat/completions';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        // Execute the request and capture the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            throw new Exception('cURL error: ' . curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, true);

        // Extract the assistant's reply
        $gptResponse = $responseData['choices'][0]['message']['content'] ?? '';

        // If GPT identifies offensive or inappropriate language, return as "pending"
        if (stripos($gptResponse, 'unpublish') || stripos($gptResponse, 'harmful') !== false) {
            return [
                'status' => 'pending',
                'reason' => $gptResponse,
            ];
        }

        // If GPT says it's okay, mark the post as approved
        return [
            'status' => 'approved',
            'reason' => 'Your post has been published on the forum site because the content is appropriate and non-offensive.',
        ];
    } catch (Exception $e) {
        // Return error information
        return [
            'status' => 'error',
            'reason' => 'An error occurred: ' . $e->getMessage(),
        ];
    } finally {
        // Always close cURL session
        if (isset($ch) && is_resource($ch)) {
            curl_close($ch);
        }
    }
}