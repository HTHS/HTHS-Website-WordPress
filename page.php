<?php
global $title;
$title = get_the_title();
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div id="content_left">
        <div id="content_left_above">
            <div class="fancybox">
                <h2 class="fancytitle black"><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <br />
                <font size="-5">Last Updated: <?php the_date('m/d/Y'); ?></font>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>