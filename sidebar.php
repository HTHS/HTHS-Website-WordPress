<div id="sidebar">
    <?php if (dynamic_sidebar('main_sidebar')) : else :
        // Default to displaying the calendar and weather widgets
        global $hths_widget_wrapper_args;
        the_widget('HTHS_Calendar_Widget', null, $hths_widget_wrapper_args);
        the_widget('HTHS_Weather_Widget', null, $hths_widget_wrapper_args);
    endif; ?>
</div>