<?php

class HTHS_Recent_News_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS Recent News Widget');
    }

    public function widget($args, $instance) {
        $num = empty($instance['num']) ? 4 : $instance['num'];

        echo $args['before_widget'];
        echo $args['before_title'];
        ?>News <a href="<?php bloginfo('rss2_url'); ?>" id="feed_icon" title="RSS Feed"><img src="<?=get_stylesheet_directory_uri()?>/images/icons/rss.png" alt="RSS Feed" /></a><?php
        echo $args['after_title'];

        ?>
        <?php
        $posts = get_posts(array('numberposts' => $num));
        global $post;
        foreach ($posts as $post): ?>
            <?php
            // ($item->urgent == 1) ? $style = 'style="color:red;"' : $style = '';
            // TODO: urgent news posts
            $style = '';
            setup_postdata($post);
            ?>
            <a class="newsitem" href="<?php the_permalink(); ?>">
                <div class="dateindicator">
                    <span class="dateindicator_month"><?php the_time('M'); ?></span>&nbsp;<span class="dateindicator_day"><?php the_time('j'); ?></span>&nbsp;<span class="dateindicator_year"><?php the_time('Y'); ?></span>
                </div>
                <div class="newsitem_title" <?=$style?>><?php the_title(); ?></div>
                <div class="newsitem_arrow">&gt;</div>
            </a>
        <?php endforeach; ?>
        <div id="news_archivelink"><a href="<?=get_permalink(get_option('page_for_posts'))?>">News Archives</a></div>
        <?php

        echo $args['after_widget'];
    }

    public function update($new_instance) {
        $instance['num'] = intval($new_instance['num']);
        return $instance;
    }

    public function form($instance) {
        $num = empty($instance['num']) ? 4 : $instance['num'];
        ?>

        <p><label for="<?=$this->get_field_id('num')?>">Number of news items to show:</label>
        <input type="number" value="<?=$num?>" id="<?=$this->get_field_id('num')?>" name="<?=$this->get_field_name('num')?>"></p>

        <?php
    }

}