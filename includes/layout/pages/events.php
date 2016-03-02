<?php
$events = table_fetch_rows('camps', '', 'str_to_date(start_date,"%Y-%m-%d") asc,id desc');
if (false == $events) {
    return;
}
$event = array_values(array_filter(array_map(function ($event) {
    return date('m', strtotime($event['start_date'])) >= date('m') ? $event : false;
}, array_reverse($events))));


if (!empty($event)) {
    $event = $event[0];
} else {
    $event = $events[count($events) - 1];
}

$default_date = date('Y-m-d');

$colors = array('Ec6a2c', '0797d4', '6d8f27', '97d4f3', 'abbf3a');
$e_formatted = array_map(function ($event) use ($colors) {
    $color = array_rand($colors);
    $time = strtotime($event['start_date']);
    $time = array(date('Y-m-d', $time));
    $return = array(
        'start' => $time[0],
        'title' => $event['title'],
        'overlap' => false,
        'color' => '#' . $colors[$color],
        'description' => strlen($event['description']) < 400 ? $event['description'] : get_paragraphed_content($event['description'], array(1, 8)),
        'venue' => Lang::venue() . ' ' . $event['venue'],
        'time' => Lang::time() . ' ' . $event['start_time'],
        'date' => Lang::date() . ' ' . date('d F, Y', strtotime($event['start_date'])),
        'href' => getRewriteUrl('camps', $event['id'])
    );
    if (!empty($event['end_date']) && $event['end_date'] != $event['start_date']) {
        $time = strtotime($event['end_date'] . ' +1 day');
        $time = array(date('Y-m-d', $time));
        $return['end'] = $time[0];
    }
    return $return;
}, $events);
?>
<style type="text/css">
    .fc-right h2 {
        color: #fff;
        margin-top: 7px;
    }

    .fc-right {
        background-color: #632f53;
    }

    .fc-button-group {
        padding: 0 13px;
    }

    .fc-button-group, .fc button {
        background: #632f53 none repeat scroll 0 0;
        border: medium none;
        border-radius: 0 !important;
        color: #fff !important;
        display: block;
        font-size: 15px;
        height: 45px;
        text-shadow: none;
        text-transform: capitalize;
    }

    .fc-row .fc-content-skeleton {
        height: 100px;
    }

    .fc tbody .fc-row .fc-content-skeleton table {
        height: 100% !important;
    }

    .fc-basic-view td.fc-day-number, .fc-basic-view td.fc-week-number span {
        padding-bottom: 0;
        padding-right: 10px;
        padding-top: 10px;
    }

    .fc-row.fc-widget-header table thead tr th {
        background-color: #632f53 !important;
        color: #fff;
        padding: 10px 0;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div id="default-content-container">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="event-calendar-container">
                <div id="calendar"></div>
            </div><!-- event-calendar-container -->
        </div>
        <div class="right-side-content col-md-3 col-sm-3 col-xs-12">
            <div id="event-side-container">
                <hgroup>
                    <?php
                    _t('h4', $event['title'], array('id' => "title"));
                    _t('span', Lang::date() . ' ' . date('d F Y', strtotime($event['start_date'])), array('id' => "date"));
                    _t('span', Lang::venue() . ' ' . $event['venue'], array('id' => "venue"));
                    _t('span', Lang::time() . ' ' . $event['start_time'], array('id' => "time"));
                    ?>
                </hgroup>
                <?php _t('div', strlen($event['description']) < 400 ? $event['description'] : get_paragraphed_content($event['description'], array(1, 8)), array('id' => "description")); ?>
            </div><!-- #event-side-container -->
            <a href="<?php _e(getRewriteUrl('camps', $event['id'])); ?>" id="full-details" class="text-icon-block">
                <?php _t('span',Lang::view_full());?>
                <img src="/public/img/icons/arrow.png" alt=""/>
            </a>
        </div>
    </div><!-- #default-content-container -->
</div>
<script type="text/javascript">
    $(function () {
        $('#calendar').fullCalendar({
            header: {
                right: 'prev title next',
                left: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '<?php _e($default_date);?>',
            eventLimit: true,
            businessHours: false,
            editable: false,
            events: <?php _e(json_encode($e_formatted, JSON_PRETTY_PRINT));?>,
            eventClick: function (data, jsEvent, view) {
                console.log(data.description);
                $('#title').html(data.title);
                $('#venue').html(data.venue);
                $('#date').html(data.date);
                $('#description').html(data.description);
                $('#full-details').attr('href', data.href);
            }
        });
    });
</script>