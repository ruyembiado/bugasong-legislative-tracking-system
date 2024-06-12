<?php
require_once '../config/config.php';

if (isset($_POST['post_reaction'])) {
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $post_reaction = $_POST['post_reaction'];

    $likeCount = '';
    $dislikeCount = '';

    $message = $post_reaction === 'liked' ? "You liked the post." : "You disliked the post.";

    $data = [
        'user_id' => $user_id,
        'post_id' => $post_id,
        'post_reaction' => $post_reaction,
    ];

    $reaction = find('post_reactions', ['post_id' => $post_id, 'user_id' => $user_id]);

    if (!$reaction) {
        $save = save('post_reactions', $data);
        if ($save) {
            $likeCount = countReaction($post_id, 'liked');
            $dislikeCount = countReaction($post_id, 'disliked');
            echo json_encode([
                'success' => true,
                'like_count' => $likeCount,
                'dislike_count' => $dislikeCount,
                'reaction' => $post_reaction,
                'user_liked' => userLikedPost($post_id, $user_id),
                'user_disliked' => userDislikedPost($post_id, $user_id),
                'message' => $message,
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to save reaction.',
            ]);
        }
    } else {

        $check_reaction = $reaction['post_reaction'];
        $check_post_id = $reaction['post_id'];

        if ($check_reaction == $_POST['post_reaction'] && $check_post_id == $_POST['post_id']) {
            $delete = delete('post_reactions', ['post_id' => $post_id, 'user_id' => $user_id]);
            if ($delete) {
                $likeCount = countReaction($post_id, 'liked');
                $dislikeCount = countReaction($post_id, 'disliked');
                echo json_encode([
                    'success' => true,
                    'like_count' => $likeCount,
                    'dislike_count' => $dislikeCount,
                    'reaction' => null,
                    'user_liked' => userLikedPost($post_id, $user_id),
                    'user_disliked' => userDislikedPost($post_id, $user_id),
                    'message' => 'Reaction removed.',
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to remove reaction.',
                ]);
            }
        } else {
            $update = update('post_reactions', ['post_id' => $post_id, 'user_id' => $user_id], $data);
            if ($update) {
                $message = "Reaction updated.";
                $likeCount = countReaction($post_id, 'liked');
                $dislikeCount = countReaction($post_id, 'disliked');
                echo json_encode([
                    'success' => true,
                    'like_count' => $likeCount,
                    'dislike_count' => $dislikeCount,
                    'reaction' => $post_reaction,
                    'user_liked' => userLikedPost($post_id, $user_id),
                    'user_disliked' => userDislikedPost($post_id, $user_id),
                    'message' => $message,
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to update reaction.',
                ]);
            }
        }
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'React failed.',
    ]);
}
