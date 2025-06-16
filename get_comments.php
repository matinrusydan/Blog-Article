<?php
/**
 * Comment Utility Script
 * This script retrieves and formats comments and replies for an article.
 */

// Include the database connection file
require_once 'db_connection.php';

/**
 * Get all approved comments for a specific article
 * @param int $article_id
 * @return array
 */
function getComments($article_id) {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT comment_id, name, comment_text, comment_date 
            FROM comments 
            WHERE article_id = :article_id AND status = 'approved' 
            ORDER BY comment_date DESC
        ");
        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Database error in getComments: " . $e->getMessage());
        return [];
    }
}

/**
 * Get all approved replies for a specific comment
 * @param int $comment_id
 * @return array
 */
function getReplies($comment_id) {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT reply_id, name, reply_text, reply_date 
            FROM replies 
            WHERE comment_id = :comment_id AND status = 'approved' 
            ORDER BY reply_date ASC
        ");
        $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Database error in getReplies: " . $e->getMessage());
        return [];
    }
}

/**
 * Count total approved comments for an article
 * @param int $article_id
 * @return int
 */
function countComments($article_id) {
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT COUNT(*) as comment_count 
            FROM comments 
            WHERE article_id = :article_id AND status = 'approved'
        ");
        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return (int)$result['comment_count'];
    } catch (PDOException $e) {
        error_log("Database error in countComments: " . $e->getMessage());
        return 0;
    }
}

/**
 * Format date string to readable format
 * @param string $date
 * @return string
 */
function formatCommentDate($date) {
    $commentDate = new DateTime($date);
    return $commentDate->format('F j, Y \a\t g:i A');
}
?>
