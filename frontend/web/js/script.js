var map, map_old, mapblack, travels__map;


  // var centerLatLng = new ymaps.Map(55.74929, 37.0720767);
  // var mapOptions = {
  //     center: centerLatLng, // Координаты центра мы берем из переменной centerLatLng
  //     zoom: 8,
  // };
  // var styles = [
  //   {
  //     stylers: [
  //
  //       { hue: "#000000" },
  //       { saturation: -100 },
  //        { visibility: "on" }
  //     ]
  //   },{
  //     featureType: "road",
  //     elementType: "geometry",
  //     stylers: [
  //       { lightness: 100 },
  //       { visibility: "simplified" }
  //     ]
  //   },{
  //     featureType: "road",
  //     elementType: "labels",
  //     stylers: [
  //       { visibility: "off" }
  //     ]
  //   },
  //   {
  //   featureType: "landscape",
  //   elementType: "all",
  //   stylers: [
  //     { visibility: "off" },
  //     { color: "#c7c7c7" },
  //     { saturation: -100 },
  //     { lightness: 20 }
  //   ]
  // }
  // ];
  // var mapOptionsOld = {
  //     center: centerLatLng, // Координаты центра мы берем из переменной centerLatLng
  //     zoom: 8,
  //     mapTypeId: google.maps.MapTypeId.ROADMAP,
  //    disableDefaultUI: true,
  //    styles: styles
  // };
  //
  // var myLatlng3 = new google.maps.LatLng(57.0442, 9.9116);
  // var mapOptionsKnives = {
  //      center: myLatlng3, // Координаты центра мы берем из переменной centerLatLng
  //        zoom: 14,
  //   };



    // if ($('#map-old').length > 0) {
    // map2 = new google.maps.Map(document.getElementById("map-old"), mapOptionsOld);
    // }
    //
    // if ($('#mapBlack').length > 0) {
    // map3 = new google.maps.Map(document.getElementById("mapBlack"), mapOptionsKnives);
    // }





// Ждем полной загрузки страницы, после этого запускаем initMap()
 //google.maps.event.addDomListener(window, "load", initMap);
$(document).ready(function() {

    ymaps.ready(function () {
        /*if ($('#map').length > 0) {
            map = new ymaps.Map("map", {
                center: [59.94, 30.32],
                zoom: 12
            });
        }*/
        if ($('#map_old').length > 0) {
            map_old = new ymaps.Map("map_old", {
                center: [59.94, 30.32],
                zoom: 12
            });
        }
        if ($('#mapblack').length > 0) {
            mapblack = new ymaps.Map("mapblack", {
                center: [59.94, 30.32],
                zoom: 12
            });
        }
        if ($('#travels__map').length > 0) {
            travels__map = new ymaps.Map("travels__map", {
                center: [59.94, 30.32],
                zoom: 12
            });
        }
    });
  //initialize()
	$(".fancybox-thumb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});
	$(".fancybox-thumb-2").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
		}
	});


    $('.show-howitworks').click(function(event) {
      event.preventDefault();
      $('.howitworks').slideToggle();
    });
    $('.show-motocalendare').click(function(event) {
      event.preventDefault();
      $('.motocalendar-main').slideToggle();
    });
    $('.show-news').click(function(event) {
      event.preventDefault();
      $('.news-on-main').slideToggle();
    });
    $('.pokazat-1').click(function(event) {
      event.preventDefault();
      $('.moto-faces-block-hide').slideToggle();
    });
    $('.pokazat-2').click(function(event) {
      event.preventDefault();
      $('.about-knives-hide').slideToggle();
    });
    $('.pokazat-map').click(function(event) {
      event.preventDefault();
      $('.hide-map').slideToggle();
    });
    $('.show-allbikers').click(function(event) {
      event.preventDefault();
      $('.bikers-all-dop').slideToggle();
    });
});
$(document).ready(function () {
//
//     var modal = $('.myModal');
//     var btn = $('.myBtn');
//     var span = $('.close')[0];
//     //console.log(modal);
//
// // When the user clicks on the button, open the modal
//    $('.myBtn').click(function() {
//         modal.show();
//        $('.overlay').show();
// });
//
// // When the user clicks on <span> (x), close the modal
//     $('.close').click(function() {
//         modal.hide();
// });
//
// // When the user clicks anywhere outside of the modal, close it
//     window.onclick = function(event) {
//      if (event.target == modal) {
//            modal.hide();
//     }
// }
    $('.myBtn').click( function(event){ // лoвим клик пo ссылки с id="go"
        event.preventDefault(); // выключaем стaндaртную рoль элементa
        $('.overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
                $('.myModal')
                    .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                    .animate({opacity: 1, top: '30%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
            });
    });
    $('.overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
        $('.myModal')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                function(){ // пoсле aнимaции
                    $(this).css('display', 'none'); // делaем ему display: none;
                    $('.overlay').fadeOut(400); // скрывaем пoдлoжку
                }
            );
    });
    // $('.js_headerAuto').click(function () {
    //     event.preventDefault();
    // })

});

jQuery(document).ready(function($) {

  $(".owl-bike").owlCarousel({
    loop: true,
    margin: 40,
    nav : true,
    navText: true,
    navigation:true,
    /*navigationText: true,*/
    pagination : true,
    items: 1,
    autoplay: true,
    dots: false,
    singleItem:false,
    responsiveClass:true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 1,
        nav: true,
      },
      1000: {
        items: 1,
        nav: true,
        loop: true,
      },
      1200: {
        items: 1,
        nav: true,
        loop: true,

      }
    }

  });
  });
// open main page tabs top
$('.page__tabs_target_first').click(function(event) {
    $('.page__tabs_target_first').removeClass('page__tabs_first_active');
    $(this).addClass('page__tabs_first_active');
    event.preventDefault();
    var target = $(this).data('tab');
    $('.page__tabcontent_first').hide();
    $("."+ target).show();
  });
// open main page tabs
$('.page__tabs_target').click(function(event) {
    $('.page__tabs_target').removeClass('page__tabs_active');
    $(this).addClass('page__tabs_active');
    event.preventDefault();
    var target = ($(this).data('tab'));

    $('.page__tabcontent').hide();
    $("."+ target).show();
  });
// open kabinet page tabs
$('.kabinet__tabs_target').click(function(event) {
    $('.kabinet__tabs_target').removeClass('kabinet__tabs_active');
    $(this).addClass('kabinet__tabs_active');
    event.preventDefault();
    var target = ($(this).data('tab'));

    $('.kabinet__tabcontent').hide();
    $("."+ target).show();
  });
