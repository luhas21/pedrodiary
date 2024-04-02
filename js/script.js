// Náhrada řetězce tlačítka hledání ikonou dashicons-before-search
document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.querySelector('.search-submit');
    searchButton.innerHTML = '<span class="dashicons-before-search"></span>';
});

if(window.location.href == '/') {
    document.querySelectorAll('.gallery').forEach(function(element) {
        element.classList.add('hidden');
    });
}
