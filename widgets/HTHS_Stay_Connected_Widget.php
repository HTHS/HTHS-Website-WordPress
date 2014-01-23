<?php

class HTHS_Stay_Connected_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS Stay Connected Widget');
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . 'Stay Connected' . $args['after_title'];

        ?>
        <table>
            <tr>
                <td><img height="16" width="16" src="<?=get_stylesheet_directory_uri()?>/images/icons/plus.gif" /></td>
                <td><a href="<?=get_stylesheet_directory_uri()?>/news/subscribe">Subscribe to News Feed</a></td>
            </tr>
            <tr>
                <td><img height="16" width="16" src="<?=get_stylesheet_directory_uri()?>/images/icons/facebook.gif" /></td>
                <td><a href="https://www.facebook.com/HighTechHS">Like Us on Facebook</a></td>
            </tr>
            <tr>
                <td><img height="16" width="16" src="<?=get_stylesheet_directory_uri()?>/images/icons/twitter.gif" /></td>
                <td><a href="http://twitter.com/HighTechHS">Follow Us on Twitter</a></td>
            </tr>
            <tr>
                <td><img height="16" width="16" src="<?=get_stylesheet_directory_uri()?>/images/icons/news_archive.gif" /></td>
                <td><a href="mailto:<?=antispambot('HighTechHS@gmail.com')?>">Contact Webmaster</a></td>
            </tr>
        </table>
        <?php

        echo $args['after_widget'];
    }

}