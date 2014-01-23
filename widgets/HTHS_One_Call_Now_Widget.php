<?php

class HTHS_One_Call_Now_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS One Call Now Widget');
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . 'Alerts' . $args['after_title'];

        ?>
        <img src="<?=get_stylesheet_directory_uri()?>/images/icons/one-call-now-banner-logo.gif" /><br />
        <iframe width="298" height="70" frameborder="0" scrolling="no" marginheight="0" src="http://secure.onecallnow.com/access/banner/bannerwrapper.aspx?BT=LHB&EGI=0%2fXbzuia0a5jnWFIqn9mcw%3d%3d&S=09%2c10%2c11%2c12%2c20&L=&lt;-+Click+button+to+play+latest+message.+++++++++++++++++++++++++++++++++++++++++++++++++&F=1&Y=s"></iframe>
        <?php

        echo $args['after_widget'];
    }

}