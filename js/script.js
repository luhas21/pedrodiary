// Náhrada řetězce tlačítka hledání ikonou dashicons-before-search
document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.querySelector('.search-submit');
    searchButton.innerHTML = '<span class="dashicons-before-search"></span>';
});
