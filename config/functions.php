<?php
require_once 'session.php';

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
        WHERE status = 0
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
        WHERE status = 0
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
        WHERE status = 0
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
    $sql = "SELECT p.post_id, p.topic, p.message, p.status, p.date_added
            FROM posts p
            INNER JOIN users u ON p.user_id = u.user_id
            WHERE u.user_id = ? AND p.status='0' 
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
        LEFT JOIN post_reactions pr ON p.post_id = pr.post_id AND pr.post_reaction = 'liked' AND p.status = 0
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
    $sql = "
        SELECT 
            ordinance_id AS id,
            user_id,
            tag_id,
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
        WHERE status = 1
        UNION ALL
        SELECT 
            resolution_id AS id,
            user_id,
            tag_id,
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
        WHERE status = 1
        ORDER BY date_added DESC
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

function getAllDocumentsById($limit)
{
    global $conn;
    $sql = "
        SELECT 
            ordinance_id AS id,
            user_id,
            tag_id,
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
            'ordinance' AS document_type
        FROM ordinances
        WHERE status = 1
        UNION ALL
        SELECT 
            resolution_id AS id,
            user_id,
            tag_id,
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
            'resolution' AS document_type
        FROM resolutions
        WHERE status = 1
        ORDER BY id ASC
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

function isHomePage()
{
    $home_page = '/blts/views/citizen_home.php';
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    return $home_page === $currentUri;
}

function searchDocument($keyword, $tag, $date_start, $date_end)
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
            tag_id,
            title,
            resolutionNo AS documentNo,
            whereasClauses AS preamble,
            resolvingClauses AS body,
            '' AS repealingClause,
            '' AS effectivityClause,
            approvalDetails AS enactmentDetails,  -- Map approvalDetails to enactmentDetails
            file,
            date_added,
            status,
            'resolution' AS document_type
        FROM resolutions
        WHERE status = 1
    ";

    // Adding conditions for resolutions based on parameters
    if (!empty($keyword)) {
        $keywordParam = '%' . $keyword . '%';
        $conditions_resolutions[] = "(
            title LIKE ? OR
            resolutionNo LIKE ? OR
            whereasClauses LIKE ? OR
            resolvingClauses LIKE ? OR
            approvalDetails LIKE ? OR
            file LIKE ?
        )";
        $params_resolutions = array_merge($params_resolutions, array_fill(0, 6, $keywordParam));
        $types_resolutions .= str_repeat("s", 6);
    }

    if (!empty($tag)) {
        $conditions_resolutions[] = "tag_id = ?";
        $params_resolutions[] = $tag;
        $types_resolutions .= "s";
    }

    if (!empty($date_start)) {
        $conditions_resolutions[] = "date_added >= ?";
        $params_resolutions[] = $date_start;
        $types_resolutions .= "s";
    }

    if (!empty($date_end)) {
        $conditions_resolutions[] = "date_added <= ?";
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
            user_id,
            tag_id,
            title,
            ordinanceNo AS documentNo,
            preamble,
            enactingClause AS body,
            repealingClause,
            effectivityClause,
            enactmentDetails,  -- Keep as is assuming this is correct for ordinances
            file,
            date_added,
            status,
            'ordinance' AS document_type
        FROM ordinances
        WHERE status = 1
    ";

    // Adding conditions for ordinances based on parameters
    if (!empty($keyword)) {
        $keywordParam = '%' . $keyword . '%';
        $conditions_ordinances[] = "(
            title LIKE ? OR
            ordinanceNo LIKE ? OR
            preamble LIKE ? OR
            enactingClause LIKE ? OR
            body LIKE ? OR
            repealingClause LIKE ? OR
            effectivityClause LIKE ? OR
            enactmentDetails LIKE ? OR
            file LIKE ?
        )";
        $params_ordinances = array_merge($params_ordinances, array_fill(0, 9, $keywordParam));
        $types_ordinances .= str_repeat("s", 9);
    }

    if (!empty($tag)) {
        $conditions_ordinances[] = "tag_id = ?";
        $params_ordinances[] = $tag;
        $types_ordinances .= "s";
    }

    if (!empty($date_start)) {
        $conditions_ordinances[] = "date_added >= ?";
        $params_ordinances[] = $date_start;
        $types_ordinances .= "s";
    }

    if (!empty($date_end)) {
        $conditions_ordinances[] = "date_added <= ?";
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

function searchDocumentReport($document_type, $_date_added_start, $_date_added_end, $_date_publish_start, $_date_publish_end, $status)
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
            tag_id,
            title,
            resolutionNo AS documentNo,
            whereasClauses AS preamble,
            resolvingClauses AS body,
            '' AS repealingClause,
            '' AS effectivityClause,
            approvalDetails AS enactmentDetails,  -- Map approvalDetails to enactmentDetails
            file,
            date_added,
            date_publish,
            status,
            'resolution' AS document_type
        FROM resolutions
        WHERE 1=1
    ";

    // Adding conditions for resolutions based on parameters
    if (!empty($_date_added_start)) {
        $conditions_resolutions[] = "date_added >= ?";
        $params_resolutions[] = $_date_added_start;
        $types_resolutions .= "s";
    }

    if (!empty($_date_added_end)) {
        $conditions_resolutions[] = "date_added <= ?";
        $params_resolutions[] = $_date_added_end;
        $types_resolutions .= "s";
    }

    if (!empty($_date_publish_start)) {
        $conditions_resolutions[] = "date_publish >= ?";
        $params_resolutions[] = $_date_publish_start;
        $types_resolutions .= "s";
    }

    if (!empty($_date_publish_end)) {
        $conditions_resolutions[] = "date_publish <= ?";
        $params_resolutions[] = $_date_publish_end;
        $types_resolutions .= "s";
    }

    if ($status !== '') {
        $conditions_resolutions[] = "status = ?";
        $params_resolutions[] = $status;
        $types_resolutions .= "i";
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
            tag_id,
            title,
            ordinanceNo AS documentNo,
            preamble,
            enactingClause AS body,
            repealingClause,
            effectivityClause,
            enactmentDetails,  -- Keep as is assuming this is correct for ordinances
            file,
            date_added,
            date_publish,
            status,
            'ordinance' AS document_type
        FROM ordinances
        WHERE 1=1
    ";

    // Adding conditions for ordinances based on parameters
    if (!empty($_date_added_start)) {
        $conditions_ordinances[] = "date_added >= ?";
        $params_ordinances[] = $_date_added_start;
        $types_ordinances .= "s";
    }

    if (!empty($_date_added_end)) {
        $conditions_ordinances[] = "date_added <= ?";
        $params_ordinances[] = $_date_added_end;
        $types_ordinances .= "s";
    }

    if (!empty($_date_publish_start)) {
        $conditions_ordinances[] = "date_publish >= ?";
        $params_ordinances[] = $_date_publish_start;
        $types_ordinances .= "s";
    }

    if (!empty($_date_publish_end)) {
        $conditions_ordinances[] = "date_publish <= ?";
        $params_ordinances[] = $_date_publish_end;
        $types_ordinances .= "s";
    }

    if ($status !== '') {
        $conditions_ordinances[] = "status = ?";
        $params_ordinances[] = $status;
        $types_ordinances .= "i";
    }

    // Constructing the WHERE clause for ordinances
    if (!empty($conditions_ordinances)) {
        $query_ordinances .= " AND (" . implode(") AND (", $conditions_ordinances) . ")";
    }

    // Combine resolutions and ordinances queries using UNION ALL if no specific document type is provided
    if ($document_type === 'resolution') {
        $query = $query_resolutions;
    } elseif ($document_type === 'ordinance') {
        $query = $query_ordinances;
    } else {
        $query = "($query_resolutions) UNION ALL ($query_ordinances)";
    }

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

function getAllDocumentsReport($limit)
{
    global $conn;
    $sql = "
        SELECT 
            ordinance_id AS id,
            user_id,
            tag_id,
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
            tag_id,
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
        ORDER BY date_added DESC
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