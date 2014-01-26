<?php
global $title;
$title = get_the_title();
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <div id="content_left">
        <div id="news" class="fancybox">
            <h2 class="fancytitle black"><?php the_title(); ?></h2>
                <p><font size="-5">Posted on <?php the_date('F j, Y'); ?></font></p>
                <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>