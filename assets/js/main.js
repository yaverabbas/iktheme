document.addEventListener('DOMContentLoaded', function() {
    var dropdowns = document.querySelectorAll('.nav-menu li');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('click', function(e) {
            if (this.querySelector('ul')) {
                e.preventDefault();
                this.querySelector('ul').classList.toggle('active');
            }
        });
    });
});
