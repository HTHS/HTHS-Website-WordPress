<?php
global $title;
if (is_search()) {
    $title = "Search Results";
} else {
    $title = "News Archives";
}
?>

<?php get_header(); ?>

<div id="content_left">
    <div id="news" class="fancybox">
        <h2 class="fancytitle black"><?=$title?></h2>
        <?php while (have_posts()): the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <p><font size="-5">Posted on <?php the_time('F j, Y'); ?></font></p>
            <?php the_content(); ?>
            <br /><br />
        <?php endwhile; ?>
    </div>

    <?php if($pageLinks != ''): ?>
        <div class="fancybox">
            <?=$pageLinks?>
        </div>
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>