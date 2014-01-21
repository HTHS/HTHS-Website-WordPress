<?php

class HTHS_Weather_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS Weather Widget');
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        echo $args['before_title'] . 'Weather' . $args['after_title'];

        ?><!--Begin Weatherbug Code-->
        <div class="wXstickerbody" style="word-wrap:normal !important;width:180px;height:150px;border:1px #000 solid;background:url(http://img.weather.weatherbug.com/images/stickers/v2/180x150/bg.gif) no-repeat; margin-left: -2px;">
            <div class="wXstickerforecast" style="margin-top:7px !important; margin-left:7px !important;">
                <object type="application/x-shockwave-flash" data="http://weather.weatherbug.com/corporate/products/stickers/v2/MySpace_Sticker_180x150.swf?zipcode=07738&ZCode=z5740&StationID=LNCRF&units=0&lang_id=en-us" height="100" width="166">
                    <param name="movie" value="http://weather.weatherbug.com/corporate/products/stickers/v2/MySpace_Sticker_180x150.swf?zipcode=07738&ZCode=z5740&StationID=LNCRF&units=0&lang_id=en-us">
                    <param name="allowScriptAccess" value="never">
                    <param name="enableJSURL" value="false">
                    <param name="enableHREF" value="false">
                    <param name="saveEmbedTags" value="true">
                    <param name="flashvars" value="zipcode=07738&ZCode=z5740&StationID=LNCRF&units=0">
                    <embed src="http://weather.weatherbug.com/corporate/products/stickers/v2/MySpace_Sticker_180x150.swf?zipcode=07738&ZCode=z5740&StationID=LNCRF&units=0&lang_id=en-us" width="166" height="100" FlashVars="zipcode=07738&ZCode=z5545&StationID=LNCRF&units=0"></embed>
                </object>
            </div>
            <div class="wXstickerlinks" style="height:9px;line-height:9px;text-align:center !important;margin-top:0px !important;width:180px;">
                <span class="wXstickerlink"><a href="http://weather.weatherbug.com/NJ/Lincroft-weather/local-forecast/7-day-forecast.html?zcode=z5740&units=0" target="_blank" style="font-family:Arial,Helvetica !important;padding-left:1px !important;text-decoration:none !important;color:#00f !important;font-size:9px !important;font-weight:bold !important;">Forecast</a></span>
                <span class="wXstickerlink"><a href="http://weather.weatherbug.com/NJ/Lincroft-weather/local-radar/doppler-radar.html?zcode=z5740&units=0" target="_blank" style="font-family:Arial,Helvetica !important;padding-left:1px !important;text-decoration:none !important;color:#00f !important;font-size:9px !important;font-weight:bold !important;">Radar</a></span>
                <span class="wXstickerlink"><a href="http://weather.weatherbug.com/NJ/Lincroft-weather/weather-cams/local-cams.html?zcode=z5740&units=0" target="_blank" style="font-family:Arial,Helvetica !important;padding-left:1px !important;text-decoration:none !important;color:#00f !important;font-size:9px !important;font-weight:bold !important;">Cameras</a></span>
                <span class="wXstickerlink"><a href="http://weather.weatherbug.com/weather-photos/photo-gallery.html?zcode=z5740&units=0&zip=07738" target="_blank" style="font-family:Arial,Helvetica !important;padding-left:1px !important;text-decoration:none !important;color:#00f !important;font-size:9px !important;font-weight:bold !important;">Photos</a></span>
                <div class="wXstickerfooter" style="margin-top:6px !important;">
                    <a href="http://weather.weatherbug.com/NJ/Lincroft-weather.html?zcode=z5740&units=0" target="_blank"><img src="http://img.weather.weatherbug.com/images/stickers/v2/180x150/wxbug-logo.jpg" style="border:0px;" border="0" alt="WeatherBug" /></a></div>
            </div>
        </div>
        <!--End Weatherbug Code--><?php

        echo $args['after_widget'];
    }

}