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
            <div id="feed" class="fancybox">
                <h2 class="fancytitle">Social Feed</h2>

                <a class="twitter-timeline" href="https://twitter.com/HighTechHS" data-widget-id="387519246885875713" data-chrome="nofooter">Tweets by @HighTechHS</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                <h2 class="fancytitle">Stay Connected</h2>
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
            </div>
        </div>

        <div id="content_left_right">
            <div id="news" class="fancybox">
                <h2 class="fancytitle">News <a href="<?=get_stylesheet_directory_uri()?>/rss/feed/news" id="feed_icon" title="RSS Feed"><img src="<?=get_stylesheet_directory_uri()?>/images/icons/rss.png" alt="RSS Feed" /></a></h2>
                <?php
                $news = wp_get_recent_posts(array('numberposts' => 5));
                foreach ($news as $newsItem): ?>
                    <?php
                    // ($item->urgent == 1) ? $style = 'style="color:red;"' : $style = '';
                    // TODO: urgent news posts
                    $style = '';
                    global $post;
                    $post = $newsItem;
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
                <div id="news_archivelink"><a href="<?php home_url(); ?>">News Archives</a></div>
            </div>
            <div id="onecallnow" class="fancybox">
                <h2 class="fancytitle">Alerts</h2>
                <img src="<?=get_stylesheet_directory_uri()?>/images/icons/one-call-now-banner-logo.gif" /><br />
                <iframe width="298" height="70" frameborder="0" scrolling="no" marginheight="0" src="http://secure.onecallnow.com/access/banner/bannerwrapper.aspx?BT=LHB&EGI=0%2fXbzuia0a5jnWFIqn9mcw%3d%3d&S=09%2c10%2c11%2c12%2c20&L=&lt;-+Click+button+to+play+latest+message.+++++++++++++++++++++++++++++++++++++++++++++++++&F=1&Y=s"></iframe>
            </div>
        </div>
    </div>
</div>
<?php // TODO: urgent news posts homepage alert code ?>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>