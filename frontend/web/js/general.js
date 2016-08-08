jQuery(document).ready(function($){



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





    $('#saveInfo').on('click', function(e){


            $('#input-5').fileinput('upload');
        //return false;

        });


    $(document).on('click','#more-news', function(){
        var page = parseInt($(this).attr('data-count'),10);
        var csrf = $(this).attr('data-csrf');
        // $(this).remove();
        $(this).attr('data-count', page + 1);
        $.ajax({
            type: 'POST',
            url: "/news/default/ajax_get_news/",
            data: 'page=' + page + '&_csrf=' + csrf,
            success: function (data) {

                $( ".news__box" ).append( data  );
            }
        });
        return false;
    });

    $(document).on('click', '#addPunkt', function(){
        var csrf = $('input[name="_csrf"]').val();
        $.ajax({
            type: 'POST',
            url: "/travels/default/ajax_add_field/",
            data: '_csrf=' + csrf,
            success: function (data) {

                $( "#aditoonalFields" ).append( data  );

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



    $(document).on('click', '.delCityDot', function(){
        $(this).parent().remove();
        routTravel();
    });

    $(document).on('change', '#travel-city_start', function(){
        routTravel();
    });

    $(document).on('change', '#travel-city_end', function(){
        routTravel();
    });

    $(document).on('change', '.ajaxCityDot', function(){
        routTravel();
    });

    $(document).on('click', '.selectMoto', function(){
        $('.selectUserMoto').show();
    });


});

//Получение точек маршрута путишествия
function routTravel(){
    var idstart = $('#travel-city_start').val();
    var idend = $('#travel-city_end').val();
    var waypoints = '';

    $('.ajaxCityDot').each(function(){
        waypoints += $(this).val() + ',';
    });



    var csrf = $('input[name="_csrf"]').val();
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

                if(Number.isInteger(+i)){
                    var lat = data.results[i][0]['lat'];
                    var lon = data.results[i][0]['lon'];
                    var obj = { type: 'wayPoint', point: [ lat, lon] };

                    res.push(obj);
                }


            }

            //console.log(res);

            ymaps.ready(routinitTravel(res));

            /*var arr = [];
            arr.push('Королев');
            arr.push({ type: 'wayPoint', point: [55.811511, 37.312518] });*/
//console.log(arr);
            /*ymaps.ready(routinitTravel(arr));*/
        }
    });
}

function routinitTravel(arr){
    //console.log(arr);

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
    });
}