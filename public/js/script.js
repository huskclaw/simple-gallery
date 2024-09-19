// public/js/script.js

document.addEventListener('DOMContentLoaded', function() {
    // Function to rotate image
    window.rotateImage = function(imagePath) {
        fetch('/rotate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                path: imagePath,
                angle: 90
            })
        }).then(response => {
            if (response.redirected) {
                window.location.reload();
            }
        }).catch(error => console.error('Error:', error));
    };
});
