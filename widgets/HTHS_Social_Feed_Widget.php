<?php

class HTHS_Social_Feed_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS Social Feed Widget');
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . 'Social Feed' . $args['after_title'];

        ?>
        <a class="twitter-timeline" href="https://twitter.com/HighTechHS" data-widget-id="387519246885875713" data-chrome="nofooter">Tweets by @HighTechHS</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <?php

        echo $args['after_widget'];
    }

}