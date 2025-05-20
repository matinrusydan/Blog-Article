/**
 * JavaScript for handling the comment form submission
 * This code adds AJAX functionality to the comment form
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get the comment form
    const commentForm = document.getElementById('commentForm');
    
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(commentForm);
            
            // Submit form using fetch API
            fetch('comment_handler.php', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Get the alert div
                const alertDiv = document.getElementById('comment-alert');
                
                // Update alert content
                alertDiv.textContent = data.message;
                
                // Set appropriate alert class based on status
                alertDiv.className = 'alert mb-4 ' + 
                    (data.status === 'success' ? 'alert-success' : 'alert-danger');
                
                // Show the alert
                alertDiv.classList.remove('d-none');
                
                // If successful, reset the form
                if (data.status === 'success') {
                    commentForm.reset();
                    
                    // Scroll to the alert
                    alertDiv.scrollIntoView({ behavior: 'smooth' });
                    
                    // Hide the alert after 5 seconds
                    setTimeout(function() {
                        alertDiv.classList.add('d-none');
                    }, 5000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Show error message
                const alertDiv = document.getElementById('comment-alert');
                alertDiv.textContent = 'An error occurred while submitting your comment. Please try again.';
                alertDiv.className = 'alert alert-danger mb-4';
                alertDiv.classList.remove('d-none');
            });
        });
    }
    
    // Check for status and message in URL parameters (for non-AJAX submissions)
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');
    
    if (status && message) {
        const alertDiv = document.getElementById('comment-alert');
        
        if (alertDiv) {
            alertDiv.textContent = message;
            alertDiv.className = 'alert mb-4 ' + 
                (status === 'success' ? 'alert-success' : 'alert-danger');
            alertDiv.classList.remove('d-none');
            
            // Remove parameters from URL without refreshing
            const url = new URL(window.location.href);
            url.searchParams.delete('status');
            url.searchParams.delete('message');
            window.history.replaceState({}, document.title, url);
            
            // Hide the alert after 5 seconds
            setTimeout(function() {
                alertDiv.classList.add('d-none');
            }, 5000);
        }
    }
});