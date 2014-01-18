<?php get_header(); ?>

<div id="content_left">
    <div id="news" class="fancybox">
        <h2 class="fancytitle black">News Archives</h2>
        <?php while (have_posts()): the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <p><font size="-5">Posted on <?php the_date('F j, Y'); ?></font></p>
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