document.addEventListener("DOMContentLoaded", function() {
    const message = document.querySelector('.message');
    if (message) {
        message.style.display = 'block'; // Show the message
        setTimeout(() => {
            message.style.display = 'none'; // Hide the message after 2 seconds
        }, 9000);
    }
});