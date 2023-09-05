document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('insert_like').addEventListener('click', function(event) {
        event.preventDefault();
        var id = document.getElementById('content_id_for_passing').value; 
        var formData = new FormData();
        formData.append('id', id);

        fetch('/content/insert_like.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            if (response.ok) {
                window.location = '/content/content_view_page?q=' + id;
            } else {
                console.error('Error updating like');
            }
        })
        .catch(function(error) {
            console.error('Fetch error:', error);
        });
    });
});