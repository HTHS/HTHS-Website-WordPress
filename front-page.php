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
                // TODO: home page portals in widget
                // TODO: use wp_nav_menu walker
                $menu_name = 'portals';
                if ( ($menu = wp_get_nav_menu_object( $menu_name ) ) && ( isset($menu) ) ) {
                    $menu_items = wp_get_nav_menu_items($menu->term_id);

                    foreach ( (array) $menu_items as $key => $menu_item ): ?>
                        <a class="button_link" href="<?=$menu_item->url?>">
                            <table>
                                <tbody><tr>
                                    <td>&gt;&gt;</td>
                                    <td><?=$menu_item->title?></td>
                                </tr>
                                </tbody></table>
                        </a>
                    <?php
                    endforeach;
                }
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