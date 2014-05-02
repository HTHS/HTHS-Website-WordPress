<?php
/**
 * Template Name: Faculty Directory
 */

global $title;
$title = get_the_title();

get_header();

if (!isset($_GET['teacher'])) {
    require('faculty-directory-index.php');
} else {
    require('faculty-directory-about.php');
}

?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>