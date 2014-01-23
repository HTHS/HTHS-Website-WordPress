<?php get_header(); ?>

<div id="content_left">
    <div id="content_left_above">
        <div id="gallery_wrapper" class="fancybox">
            <div id="gallery">
                <img src="<?=get_stylesheet_directory_uri()?>/images/makeshift_hths_image.png" />
            </div>
        </div>
    </div>

    <div id="content_left_below">
        <div id="content_left_left">
            <div id="shortcuts" class="fancybox">
                <h2 class="fancytitle">Portals</h2>
                <?php
                // TODO: home page portals
                //=$this->menu->render_portals()
                ?>
            </div>
            <?php dynamic_sidebar('home_left'); ?>
        </div>

        <div id="content_left_right">
            <?php dynamic_sidebar('home_right'); ?>
        </div>
    </div>
</div>
<?php // TODO: urgent news posts homepage alert code ?>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>