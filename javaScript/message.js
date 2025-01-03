document.addEventListener("DOMContentLoaded", function() {
    const messages = document.querySelectorAll('.message');
    messages.forEach(message => {
        message.style.display = 'block'; // Show the message
        setTimeout(() => {
            message.classList.add('fade-out'); // Add fade-out class
            setTimeout(() => {
                message.style.display = 'none'; // Hide the message after fade-out animation
                message.classList.remove('fade-out'); // Remove fade-out class for future use
            }, 1000); // Duration of fade-out animation
        }, 3000); // Duration before starting fade-out
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const messages = document.querySelectorAll('.alert-message');
    messages.forEach(message => {
        message.style.display = 'block'; // Show the message
    });
});
