<?php

class HTHS_Calendar_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(null, 'HTHS Calendar Widget');
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        echo $args['before_title'] . 'Calendar' . $args['after_title'];

        ?><script type="text/javascript">
            $(function() {
                var calendar = 'ctemc.org_u5nehkjekie46r2cpe2f58c7l0%40group.calendar.google.com';
                var feed = 'https://www.googleapis.com/calendar/v3/calendars/' + calendar + '/events?maxResults=5&singleEvents=true&timeMin=' + (new Date().toISOString()) + '&orderBy=startTime&key=AIzaSyCqFFbiPUTDxSMFdTutYJs1OmOMwLZi7Ts';
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                var generateWidget = (function(data, target) {
                    var events = data.items;
                    console.log(events);
                    if (typeof(events) !== 'undefined' && events.length > 0) {
                        for (var i=0; i<events.length; i++) {
                            var event = events[i];

                            // Clone the calendar widget event primative and hold it in a variable.
                            var element = $('#calendarwidget_primatives .calendarwidget_event').clone();

                            // Create a readable date from the returned data.
                            if (typeof(event.start.dateTime) !== 'undefined') {
                                var dateSource = event.start.dateTime;
                            } else if (typeof(event.start.date) !== 'undefined') {
                                var dateSource = event.start.date;
                            } else {
                                continue;
                            }
                            var regex = /([0-9]+)-([0-9]+)-([0-9]+)/.exec(dateSource);
                            var d = new Date(regex[1], regex[2]-1, regex[3]);
                            var date = months[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();

                            // Read the title of the event, or use a generic title if there is none
                            if (typeof(event.summary) != 'undefined') {
                                var title = event.summary;
                            } else {
                                var title = 'Event'
                            }

                            // Add event information to widget item
                            $(element).find('.calendarwidget_date').html(date);
                            $(element).find('.calendarwidget_title').html(title);

                            // Insert the item into the widget for display
                            $(element).appendTo(target);
                        }
                    } else {
                        $(target).append('<div style="text-align: center; font-style: italic">No upcoming events</div>');
                    }
                });
                $.getJSON(feed, function(data) {
                    generateWidget(data, '#calendarwidget_list_hths');
                });
            });
        </script>
        <p id="calendarwidget">
        <div id="calendarwidget_header">Upcoming Events:</div>
        <div id="calendarwidget_list_hths"></div>
        <div id="calendarwidget_link"><a href="https://www.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23FFFFFF&src=ctemc.org_u5nehkjekie46r2cpe2f58c7l0%40group.calendar.google.com&color=%23182C57&src=5j96g4ul0gkpcbd0ldq6li6mgo%40group.calendar.google.com&color=%23691426&src=ppklihq3hv1k05n2phutlu7j84%40group.calendar.google.com&color=%23856508&ctz=America%2FNew_York">See all events</a></div>
        </p>
        <style type='text/css'>
            #calendarwidget_primatives {
                display: none;
            }
            #calendarwidget_header {
                font-weight: bold;
                font-size: 10pt;
                margin-bottom: 5px;
            }
            .calendarwidget_event {
                padding: 3px;
            }
            .calendarwidget_title {
                font-weight: bold;
                font-size: 9pt;
                display: block;
            }
            .calendarwidget_date {
                font-size: 8pt;
                display: block;
            }
            #calendarwidget_link {
                text-align: center;
                font-weight: bold;
                font-size: 10pt;
                margin-top: 5px;
            }
        </style>
        <div id="calendarwidget_primatives">
            <div class="calendarwidget_event">
                <span class="calendarwidget_title"></span>
                <span class="calendarwidget_date"></span>
            </div>
        </div><?php

        echo $args['after_widget'];
    }

}