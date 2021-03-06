jQuery(document).ready(function ($) {



    /*var myMap,
     route,
     myPlacemark;*/

    /*function init(){
     myMap = new ymaps.Map ("travels__map", {
     center: [55.811511, 37.312518],
     zoom: 9
     });
     
     myPlacemark = new ymaps.Placemark([55.76, 37.64], {
     hintContent: 'Москва!',
     balloonContent: 'Столица России'
     });
     myMap.geoObjects.add(myPlacemark);
     
     
     
     ymaps.route([
     { type: 'wayPoint', point: [ 55.75578690, 37.61763382 ] },
     { type: 'wayPoint', point: [ 56.00125122, 92.88558960 ] },
     { type: 'wayPoint', point: [ 56.32991791, 44.00919342 ] }
     ], {
     mapStateAutoApply: true
     }).then(function (route) {
     route.getPaths().options.set({
     // в балуне выводим только информацию о времени движения с учетом пробок
     balloonContentBodyLayout: ymaps.templateLayoutFactory.createClass('$[properties.humanJamsTime]'),
     // можно выставить настройки графики маршруту
     strokeColor: '0000ffff',
     opacity: 0.9
     });
     // добавляем маршрут на карту
     myMap.geoObjects.add(route);
     });
     }*/

//Оповещения

    $(document).on('click', '.warning', function () {
        var name = $(this).attr('name');
        var val;
        if($(this).prop('checked')) {
            val = 1;
        }
        else{
            val = 0;
        }
        $.ajax({
            type: 'POST',
            url: "/user/settings/ajax_warning/",
            data: 'name=' + name + '&val=' + val,
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('#saveInfo').on('click', function(event){
        $('#input-5').fileinput('upload');

        /*event.preventDefault();
        return false;*/
    });

    $(document).on('click', '.travelName', function () {
        $.ajax({
            type: 'POST',
            url: "/travels/default/ajax_get_travel/",
            data: 'id=' + $(this).attr('id'),
            success: function (data) {
                //console.log(data);
                $("#travels__travel").html(data);
                routTravel();
            },
            error: function (data) {
                console.log(data);
                //$( "#travels__travel" ).append( data  );
            }
        });

    });
    $('.clubs__form_datepicker').change(function () {

        var myDate = $(this).val();
        myDate = myDate.split(".");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        $('#club_created').val(new Date(newDate).getTime()/1000);
    });

    $('#events_search_date_from').change(function () {

        var myDate = $(this).val();
        myDate = myDate.split(".");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        $('#event_dt_from').val(new Date(newDate).getTime()/1000);
    });

    $('#events_search_date_to').change(function () {

        var myDate = $(this).val();
        myDate = myDate.split(".");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        $('#event_dt_to').val(new Date(newDate).getTime()/1000);
    });
    
    $('#add_event_to_bookmarks').click(function () {
        $.ajax({
            type: 'POST',
            url: "/events/default/ajax_add_bookmark/",
            data: 'event=' + $(this).attr('data-event'),
            success: function (data) {
                    alert(data);
            },
            error: function (data) {
                console.log(data);
                //$( "#travels__travel" ).append( data  );
            }
        });
        return false;
    });

    $(document).on('click','#add_travel_to_bookmarks',function () {
        $.ajax({
            type: 'POST',
            url: "/travels/default/ajax_add_bookmark/",
            data: 'travel=' + $(this).attr('data-travel'),
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                console.log(data);
                //$( "#travels__travel" ).append( data  );
            }
        });
        return false;
    });




    $('#dt_start_event').change(function () {
        $('#dt_end_event').val($(this).val());
    });
    $('#add_participant').click(function () {
        $.ajax({
            type: 'POST',
            url: "/events/default/ajax_add_participant/",
            data: 'event=' + $(this).attr('data-event'),
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                console.log(data);
                //$( "#travels__travel" ).append( data  );
            }
        });
    });


    $('#saveInfo').on('click', function (e) {


        $('#input-5').fileinput('upload');
        //return false;

    });
    $('#createEventButton').on('click', function (e) {

        console.log('test');
        $('#input-5').fileinput('upload');
        //return false;

    });
    $(document).on('click','.motocalendar__list_item',function () {
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "/events/default/ajax_get_events/",
            data: 'id=' + id,
            success: function (data) {
                //console.log(data);
                $(".motocalendar__event").html(data);
            }
        });
        return false;
    });



    $(document).on('click', '#more-news', function () {
        var page = parseInt($(this).attr('data-count'), 10);
        var csrf = $(this).attr('data-csrf');
        // $(this).remove();
        $(this).attr('data-count', page + 1);
        $.ajax({
            type: 'POST',
            url: "/news/default/ajax_get_news/",
            data: 'page=' + page + '&_csrf=' + csrf,
            success: function (data) {

                $(".news__box").append(data);
            }
        });
        return false;
    });

    $(document).on('click', '#more-bikers', function () {
        var page = parseInt($(this).attr('data-count'), 10);
        var csrf = $(this).attr('data-csrf');
        // $(this).remove();
        $(this).attr('data-count', page + 1);
        $.ajax({
            type: 'POST',
            url: "/bikers/default/ajax_get_bikers/",
            data: 'page=' + page + '&_csrf=' + csrf,
            success: function (data) {
                $(".bikers-all").append(data);
            }
        });
        return false;
    });
    
    $('#dt_start_event').change(function(){
        var myDate = $(this).val();
        myDate = myDate.split(".");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        $('#event_start').val(new Date(newDate).getTime()/1000);
        $('#event_end').val(new Date(newDate).getTime()/1000);
    });
    $('#dt_end_event').change(function(){
        var myDate = $(this).val();
        myDate = myDate.split(".");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        $('#event_end').val(new Date(newDate).getTime()/1000);
    });
    
    $(document).on('change','.clubs-category',function(){
        $(".motoclub-content-promo").html('');
        $('.events-category:checked').each(function(){
            var id = $(this).attr('name').slice(-1);
            console.log(id);
            $.ajax({
            type: 'POST',
            url: "/clubs/default/ajax_find_clubs/",
            data: 'type=' + id,
            success: function (data) {

                $(".motoclub-content-promo").append(data);
            }
        });
        });
        //var id = $(this).attr('name').slice(-1);
        //var checked = $(this).is(':checked');
        //console.log(id);
    });
    
    $(document).on('click','#reset_event_search',function(){
        $.ajax({
            type: 'POST',
            url: "/events/default/ajax_get_events/",
            data: 'page=' + 1,
            success: function (data) {

                $(".events-conrent__box").html(data);
            }
        });
    });
    
    /*$(document).on('change','.events-category_input',function(){

        $('.events-category_input:checked').each(function(){
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: "/events/default/ajax_find_events_by_type/",
                data: 'type=' + id,
                success: function (data) {

                    $(".events-conrent__box").html(data);
            }
        });
        });
    });*/

    $(document).on('change','#date_search_event_from',function(){
        $(".events-conrent__box").html('');
        var from = $(this).val();
        var to = $('#date_search_event_to').val();
        $.ajax({
            type: 'POST',
            url: "/events/default/ajax_find_event_by_date/",
            data: 'from=' + from + '&to=' + to,
            success: function (data) {
                $(".events-conrent__box").append(data);
            }
        });
    });
    
    $(document).on('click', '#more-clubs', function () {
        var page = parseInt($(this).attr('data-count'), 10);
        var csrf = $(this).attr('data-csrf');
        // $(this).remove();
        $(this).attr('data-count', page + 1);
        $.ajax({
            type: 'POST',
            url: "/clubs/default/ajax_get_clubs/",
            data: 'page=' + page + '&_csrf=' + csrf,
            success: function (data) {

                $(".motoclub-content-promo").append(data);
            }
        });
        return false;
    });




    $(document).on('click', '#addPunkt', function () {
        var csrf = $('input[name="_csrf"]').val();
        $.ajax({
            type: 'POST',
            url: "/travels/default/ajax_add_field/",
            data: '_csrf=' + csrf,
            success: function (data) {

                $("#aditoonalFields").append(data);

                // $(".dotCity").autocomplete({source: '/travels/default/getcity?_csrf=' + csrf, minLength:2 });

                //$("#city").autocomplete({source: '/travels/default/getcity?_csrf=' + csrf, minLength:2 });
                // $(".dotCity").find("[data-new='new']").removeAttr('data-new');
                /*$(".selectAdditnalCity").select2({
                 placeholder: "Введите город",
                 minimumInputLength: 3,
                 ajax: {
                 url: "/travels/default/citylist/",
                 dataType: 'json',
                 type: "POST",
                 data: function (term, page) {
                 
                 console.log(term);
                 /!*return {
                 q: term, // search term
                 col: 'vdn'
                 };*!/
                 },
                 results: function (data) { // parse the results into the format expected by Select2.
                 // since we are using custom formatting functions we do not need to alter remote JSON data
                 //return {results: data};
                 console.log(data);
                 }
                 }
                 });*/

                /* var $el = $("#selectAdditnalCity"), // your input id for the HTML select input
                 settings = $el.attr('data-krajee-select2'),
                 id = $el.attr('id');
                 settings = window[settings];
                 
                 // reinitialize plugin, set bootstrap error/success style and reset loading status
                 $.when($el.select2(settings)).on('select2-open', function() {
                 initSelect2DropStyle(id);
                 }).done(initSelect2Loading(id));*/
            }
        });
        return false;
    });



    $(document).on('click', '.delCityDot', function () {
        $(this).parent().remove();
        routTravel();
    });

    $(document).on('change', '#auto_complete_city_name_start', function () {
        routTravel();
    });

    $(document).on('change','#autocomplete_city_name_start', function () {

    });

    $(document).on('click','#is_near_event',function () {
        if(this.checked)
        {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                $('#event_my_lat').val(latitude);
                $('#event_my_lon').val(longitude);

            });
        }
    });

    $(document).on('click', '.ruleRegister', function () {
        if ($(this).prop('checked')) {
            $('.regist-button').prop('disabled', false);
        } else {
            $('.regist-button').prop('disabled', true);
        }
    });

    $(document).on('change','#travel-cityend', function () {
        searchTravel();
    });
    $(document).on('change','#travel-citystart', function () {
        searchTravel();
    });
    $(document).on('change','.tarvel_search', function () {
        searchTravel();
    });

    $(document).on('change', '#auto_complete_city_name_end', function () {
        routTravel();
    });

    $(document).on('change', '.ajaxCityDot', function () {
        routTravel();
    });

    $(document).on('click', '.selectMoto', function () {
        $('.selectUserMoto').toggle();
    });
    $(document).on('click', '.saveMotoId', function () {
        var data = $('.events-category:checked').attr('id');
        //console.log(data);
        $('#travel-moto_id').val(data);
        $('.selectUserMoto').hide();
    });

    $("#profile-avatar").change(function(){
        readURL(this);
    });


    $(document).on('click', '#add_personal', function(){
        var count = $(this).attr('data-count');
        console.log(count);
        $('#add_personal').attr('data-count', parseInt(count)+1);
        //$('<p>123</p>').insertBefore("#add_personal");
        $.ajax({
            type: 'POST',
            url: "/moto_clubs/moto_clubs/ajax_add_personal/",
            data: 'count=' + count,
            success: function (data) {
                $(data).insertBefore("#add_personal");
                //$("#add_personal").prepend(123);
            }
        });
    });


    if(document.getElementById('travelView') != null){
        //var travels__map;
        ymaps.ready(function () {
            if ($('#travels__map').length > 0) {
                /*travels__map = new ymaps.Map("travels__map", {
                    center: [59.94, 30.32],
                    zoom: 12
                });*/
                routTravel();
            };
        });

    }

    if(document.getElementById('event__maps') != null){
        //var travels__map;
        /*ymaps.ready(function () {
            if ($('#travels__map').length > 0) {
                /!*travels__map = new ymaps.Map("travels__map", {
                    center: [59.94, 30.32],
                    zoom: 12
                });*!/
                routTravel();
            };
            });*/
        var lat = $('#latlon').attr('lat');
        var lon = $('#latlon').attr('lon');
        addPlacemark(lat, lon);

    }


});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//Получение точек маршрута путишествия
function routTravel() {
    var idstart = $('#travel-city_start').val();
    var idend = $('#travel-city_end').val();
    var waypoints = '';

    $('.ajaxCityDot').each(function () {
        waypoints += $(this).val() + ',';
    });



    var csrf = $('input[name="_csrf"]').val();
    //console.log(csrf);
    $.ajax({
        type: 'POST',
        url: "/travels/default/ajax_get_city_info/",
        data: 'idstart=' + idstart + '&_csrf=' + csrf + '&idend=' + idend + '&waypoints=' + waypoints,
        success: function (data) {
            //console.log(JSON.parse(data));
            //console.log(data.results[0].lat);
//console.log(data);

            var res = [];
            for (var i in data.results) {
                //console.log(data.results[0][0]['lat']);

                if (Number.isInteger(+i)) {
                    var lat = data.results[i][0]['lat'];
                    var lon = data.results[i][0]['lon'];
                    var obj = {type: 'wayPoint', point: [lat, lon]};

                    res.push(obj);
                }


            }
            //console.log(res);

            ymaps.ready(routinitTravel(res));
            //ymaps.ready(myDistance());


            /*var arr = [];
             arr.push('Королев');
             arr.push({ type: 'wayPoint', point: [55.811511, 37.312518] });*/
//console.log(arr);
            /*ymaps.ready(routinitTravel(arr));*/
        }
    });
}

function routinitTravel(arr) {
    //console.log(arr);
console.log(travels__map);
    travels__map.geoObjects.removeAll();

    ymaps.route(
            arr, {
                mapStateAutoApply: true
            }).then(function (route) {
        route.getPaths().options.set({
            // в балуне выводим только информацию о времени движения с учетом пробок
            balloonContentBodyLayout: ymaps.templateLayoutFactory.createClass('$[properties.humanJamsTime]'),
            // можно выставить настройки графики маршруту
            strokeColor: '0000ffff',
            opacity: 0.9
        });
        // добавляем маршрут на карту
        travels__map.geoObjects.add(route);
        var routeLength = route.getLength();
        $('#travel-distance').val(Math.round(routeLength/1000));
    });
}

/*function myDistance(){

    var router = new ymaps.Router(['Москва', 'Тула']);
    var fullDistance = router.getDistance();


    console.log(fullDistance);
}*/


function searchTravel(){
    $.ajax({
        type: 'POST',
        url: "/travels/default/search_travel/",
        data: {'city_start': $('#travel-citystart').val(),
            'city_end': $('#travel-cityend').val(),
            'date': $('#datapicker').val()},
        success: function (data) {
            //console.log(data);
            $(".travels__road").html(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
}


function addPlacemark(lat,lon){
    ymaps.ready(function () {
        if ($('#map').length > 0) {
            map = new ymaps.Map("map", {
                center: [lat, lon],
                zoom: 6
            });
            myGeoObject = new ymaps.GeoObject({
                // Описание геометрии.
                geometry: {
                    type: "Point",
                    coordinates: [lat, lon],
                    //center: [lat, lon],
                },

                // Свойства.
                properties: {
                    // Контент метки.
                    //iconContent: 'Я тащусь',
                    //hintContent: 'Ну давай уже тащи'
                }
            });
            map.geoObjects.add(myGeoObject);
        }
    });

}