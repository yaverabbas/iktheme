jQuery(document).ready(function($) {

    // Function to load all projects on page load
    function loadAllProjects() {
        $.ajax({
            url: project_filters_ajax_object.ajax_url,
            method: 'GET',
            data: {
                action: 'get_filtered_projects'
            },
            success: function(response) {
                if (response.success) {
                    const projects = response.data; // Get the array of project data
                    const $projectsContainer = $('#projects-container');
                    $projectsContainer.empty(); // Clear the current projects

                    // Create the container for the projects
                    const $projectsArchiveContainer = $('<div class="projects-archive-container"></div>');

                    projects.forEach(function(project) {
                        const projectCard = `
                        <div class="project-archive-item">
                            <div class="project-archive-combo-dates">
                                <h2 class="project-archive-title">
                                    <a href="${project.permalink}">${project.title}</a>
                                </h2>
                                <span><strong>Start Date:</strong> ${project.start_date} | <strong>End Date:</strong> ${project.end_date}</span>
                            </div>
                            <div class="project-archive-combo">
                                ${project.thumbnail ? `<div class="project-archive-thumbnail"><img src="${project.thumbnail}" alt="${project.title}"></div>` : ''}
                                <div class="project-archive-excerpt">${project.excerpt}</div>
                            </div>
                            <a href="${project.permalink}" class="project-archive-link">Read More</a>
                        </div>`;
                        $projectsArchiveContainer.append(projectCard); // Append the new project card
                    });

                    $projectsContainer.append($projectsArchiveContainer); // Add the container to the main container

                } else {
                    $('#projects-container').html('<p>' + response.data + '</p>'); // Show error message
                }
            },
            error: function() {
                $('#projects-container').html('<p>Error retrieving projects.</p>');
            }
        });
    }

    // Check if the current URL is the /projects/ page
    if (window.location.pathname.includes( '/projects/' )) {
        loadAllProjects(); // Call the function to load all projects
    }

    // Handle the filter form submission
    $('#filter-form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        const start_date = $('#start_date').val();
        const end_date = $('#end_date').val();

        $.ajax({
            url: project_filters_ajax_object.ajax_url,
            method: 'GET',
            data: {
                action: 'get_filtered_projects',
                start_date: start_date,
                end_date: end_date
            },
            success: function(response) {
                if (response.success) {
                    const projects = response.data; // Get the array of project data
                    const $projectsContainer = $('#projects-container');
                    $projectsContainer.empty(); // Clear the current projects

                    // Create the container for the projects
                    const $projectsArchiveContainer = $('<div class="projects-archive-container"></div>');

                    projects.forEach(function(project) {
                        const projectCard = `
                        <div class="project-archive-item">
                            <div class="project-archive-combo-dates">
                                <h2 class="project-archive-title">
                                    <a href="${project.permalink}">${project.title}</a>
                                </h2>
                                <span><strong>Start Date:</strong> ${project.start_date} | <strong>End Date:</strong> ${project.end_date}</span>
                            </div>
                            <div class="project-archive-combo">
                                ${project.thumbnail ? `<div class="project-archive-thumbnail"><img src="${project.thumbnail}" alt="${project.title}"></div>` : ''}
                                <div class="project-archive-excerpt">${project.excerpt}</div>
                            </div>
                            <a href="${project.permalink}" class="project-archive-link">Read More</a>
                        </div>`;
                        $projectsArchiveContainer.append(projectCard); // Append the new project card
                    });

                    $projectsContainer.append($projectsArchiveContainer); // Add the container to the main container

                } else {
                    $('#projects-container').html('<p>' + response.data + '</p>'); // Show error message
                }
            },
            error: function() {
                $('#projects-container').html('<p>Error retrieving projects.</p>');
            }
        });
    });

    // Handle the reset button click
    $('#reset-filters').click(function() {
        $('#start_date').val(''); // Reset the start date
        $('#end_date').val('');   // Reset the end date

        // Optionally, reload the original projects
        loadAllProjects(); // Reload all projects
    });
});
