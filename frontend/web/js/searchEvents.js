jQuery(document).ready(function ($) {

    $(document).on('change', '.events-category_input', function () {
        searchEvents();
    });

    $(document).on('change', '.dt_start_search_events', function(){
        searchEvents();

    });
    $(document).on('change', '.dt_end_search_events', function(){
        searchEvents();
    });

    $(document).on('change', '#city-search', function(){
        searchEvents();
    });

    $(document).on('click', '.events-calendar__list_month', function(){
        $('.events-calendar__list_month').each(function(){
            $(this).removeClass('events-calendar__list_month_checked');
        });
        $(this).addClass('events-calendar__list_month_checked');
        searchEventsMonth($(this).data('month'));
        return false;
    });

    $(document).on('click', '.events-calendar__control_link', function(){
        $('.events-calendar__list_month').each(function(){
            $(this).removeClass('events-calendar__list_month_checked');
        });
        searchEventsMonth('all');
        return false;
    });


});


function searchEvents(){
    ///Получение типов мероприятий
    var idType = '';
    $('.events-category_input:checked').each(function () {
        idType += $(this).data('id') + ',';
    });

    //Дата начала
    var dt_start = $('.dt_start_search_events').val();
    //Дата конца

    var dt_end = $('.dt_end_search_events').val();

    //Получение id города

    var idCity = $('#city-search').val();


    //console.log(id);
    $.ajax({
        type: 'POST',
        url: "/events/default/event_search/",
        data: 'type=' + idType + '&dt_start=' + dt_start + '&dt_end=' + dt_end + '&idCity=' + idCity,
        success: function (data) {
            console.log(data);
            $(".events-conrent__box").html(data);
        }
    });
}

function searchEventsMonth(id){

    //console.log(monthId);

    $.ajax({
        type: 'POST',
        url: "/events/default/event_search_month/",
        data: 'id=' + id,
        success: function (data) {
            console.log(data);
            $(".events-conrent__box").html(data);
        }
    });

}

