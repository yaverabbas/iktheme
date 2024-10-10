<?php get_header(); ?>

<div class="container">
    <h1><?php post_type_archive_title(); ?></h1>

    <form id="filter-form">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date"
               value="<?php echo isset($_GET['start_date']) ? esc_attr($_GET['start_date']) : ''; ?>"
        >

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date"
               value="<?php echo isset($_GET['end_date']) ? esc_attr($_GET['end_date']) : ''; ?>"
        >

        <button type="submit">Filter</button>
        <button type="button" id="reset-filters">Reset</button>
    </form>

    <div id="projects-container">
    </div>
</div>

<?php get_footer(); ?>
