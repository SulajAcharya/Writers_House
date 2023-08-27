
document.addEventListener('DOMContentLoaded', function () {
    function handleImageChange(input, targetElement) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageElement = document.createElement('img');
                imageElement.src = e.target.result;
                imageElement.classList.add('img-thumbnail'); 
                targetElement.innerHTML = '';
                targetElement.appendChild(imageElement);
            };

            reader.readAsDataURL(file);
        }
    }

    document.getElementById('add').addEventListener('change', function (e) {
        const card = document.getElementById('card1');
        handleImageChange(e.target, card);
    });
    
    document.getElementById('change').addEventListener('change', function (e) {
        const card = document.getElementById('card1');
        handleImageChange(e.target, card);
    });
});
