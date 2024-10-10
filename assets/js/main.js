document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenu = document.querySelector('.primary-menu');

    if (menuToggle && primaryMenu) {
        // Toggle menu on hamburger click
        menuToggle.addEventListener('click', function() {
            primaryMenu.classList.toggle('active');
        });

        // Close menu if clicking outside of it
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = primaryMenu.contains(event.target);
            const isClickOnToggle = menuToggle.contains(event.target);

            if (!isClickInsideMenu && !isClickOnToggle && primaryMenu.classList.contains('active')) {
                primaryMenu.classList.remove('active'); // Close the menu
            }
        });
    }

    // Handle submenu dropdowns for desktop and mobile
    const subMenuLinks = document.querySelectorAll('.primary-menu li.menu-item-has-children > a');

    subMenuLinks.forEach(function(subMenuLink) {
        // Show/hide dropdown on click
        subMenuLink.addEventListener('click', function(event) {
            event.preventDefault();
            const subMenu = subMenuLink.nextElementSibling; // Get the next sibling <ul>

            // Toggle dropdown visibility
            subMenu.classList.toggle('show');

            // Close other open dropdowns (optional, for better UX)
            document.querySelectorAll('.primary-menu ul.show').forEach(function(otherSubMenu) {
                if (otherSubMenu !== subMenu) {
                    otherSubMenu.classList.remove('show');
                }
            });
        });

        // Show dropdown on hover for desktop
        subMenuLink.addEventListener('mouseenter', function() {
            const subMenu = subMenuLink.nextElementSibling;
            if (subMenu) {
                subMenu.classList.add('show'); // Show dropdown on hover
            }
        });

        // Hide dropdown when mouse leaves the submenu
        subMenuLink.addEventListener('mouseleave', function() {
            const subMenu = subMenuLink.nextElementSibling;
            if (subMenu) {
                subMenu.classList.remove('show'); // Hide dropdown on mouse leave
            }
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!primaryMenu.contains(event.target)) {
            document.querySelectorAll('.primary-menu ul.show').forEach(function(openSubMenu) {
                openSubMenu.classList.remove('show');
            });
        }
    });
});
