var map, map_old, mapblack, travels__map;
ymaps.ready(function () {
  if ($('#map').length > 0) {
  map = new ymaps.Map("map", {
          center: [59.94, 30.32],
          zoom: 12
      });
  }
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


    $('.pokazat').click(function(event) {
      event.preventDefault();
      $('.howitworks-hide').slideToggle();
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
});
$(document).ready(function () {

    var modal = $('.myModal');
    var btn = $('.myBtn');
    var span = $('.close')[0];
    //console.log(modal);

// When the user clicks on the button, open the modal
   $('.myBtn').click(function() {
        modal.show();
});

// When the user clicks on <span> (x), close the modal
    $('.close').click(function() {
        modal.hide();
});

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
     if (event.target == modal) {
           modal.hide();
    }
}
});
