<?php
/**
 * Comment Submission Handler
 * This script processes the comment form submission
 */

// Include the database connection file
require_once 'db_connection.php';

// Initialize response array
$response = array(
    'status' => 'error',
    'message' => 'An error occurred while processing your comment'
);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the article ID from the URL or a hidden field
    $article_id = isset($_POST['article_id']) ? (int)$_POST['article_id'] : 1; // Default to article ID 1 if not specified
    
    // Validate form data
    if (empty($_POST['name'])) {
        $response['message'] = "Name is required";
    } elseif (empty($_POST['email'])) {
        $response['message'] = "Email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Invalid email format";
    } elseif (empty($_POST['comment'])) {
        $response['message'] = "Comment is required";
    } else {
        // Clean the input data
        $name = clean_input($_POST['name']);
        $email = clean_input($_POST['email']);
        $comment = clean_input($_POST['comment']);
        
        try {
            // Prepare an SQL statement
            $stmt = $conn->prepare("INSERT INTO comments (article_id, name, email, comment_text) VALUES (:article_id, :name, :email, :comment)");
            
            // Bind parameters
            $stmt->bindParam(':article_id', $article_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':comment', $comment);
            
            // Execute the statement
            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Your comment has been submitted successfully and is awaiting approval.';
            } else {
                $response['message'] = 'Failed to submit comment. Please try again.';
            }
        } catch(PDOException $e) {
            $response['message'] = 'Database error: ' . $e->getMessage();
        }
    }
}

// Return JSON response if AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// If not AJAX, redirect back to the article page with appropriate message
$redirect_url = "article.html";  // Change this to your article URL structure
if (isset($_SERVER['HTTP_REFERER'])) {
    $redirect_url = $_SERVER['HTTP_REFERER'];
}

// Add status and message as URL parameters
$redirect_url .= (parse_url($redirect_url, PHP_URL_QUERY) ? '&' : '?') . 'status=' . $response['status'] . '&message=' . urlencode($response['message']);

// Redirect
header("Location: $redirect_url");
exit;
?>