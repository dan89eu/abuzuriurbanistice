var mapStyles = [
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#008eff"
            }
        ]
    },
    {
        "featureType": "administrative.locality",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#462525"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "-17"
            },
            {
                "visibility": "off"
            },
            {
                "color": "#8e5fb3"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "0"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#00a9ff"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ba1313"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#e1e1d4"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "gamma": "1.92"
            },
            {
                "saturation": "57"
            },
            {
                "lightness": "-51"
            },
            {
                "visibility": "on"
            },
            {
                "color": "#9be3c5"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry",
        "stylers": [
            {
                "saturation": "0"
            },
            {
                "color": "#1e78ff"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -70
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "saturation": -60
            },
            {
                "color": "#cce4f4"
            }
        ]
    }
];

$.ajaxSetup({
    cache: true
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function pinSymbol(color) {
    var svg = '<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">\n' +
	    ' <metadata>Created by potrace 1.15, written by Peter Selinger 2001-2017</metadata>\n' +
	    ' <g>\n' +
	    '  <title>Layer 1</title>\n' +
	    '  <circle id="svg_5" r="16.5" cy="24.5" cx="32.5" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="null" fill="'+color+'"/>\n' +
	    '  <g id="svg_1" fill="#000000" transform="translate(0,64) scale(0.10000000149011612,-0.10000000149011612) ">\n' +
	    '   <path fill="black" id="svg_2" d="m215,621c-86,-40 -135,-120 -135,-221c0,-96 30,-151 115,-210c32,-22 47,-44 75,-109c22,-54 39,-81 50,-81c11,0 28,27 50,81c28,65 43,87 75,109c86,59 115,114 115,212c-1,102 -54,186 -142,222c-52,22 -153,20 -203,-3zm168,-75c103,-43 128,-177 48,-257c-112,-113 -296,-12 -267,146c18,94 128,150 219,111z"/>\n' +
	    '  </g>\n' +
	    '  <ellipse ry="1" id="svg_3" cy="23.5" cx="-105" stroke-linecap="null" stroke-linejoin="null" stroke-dasharray="null" stroke-width="null" fill="black"/>\n' +
	    ' </g>\n' +
	    '</svg>';
	return {
		url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg),
	};
}

function createHomepageGoogleMap(_latitude,_longitude){
    /* setMapHeight(); */
    if( document.getElementById('map') != null ){
	    $.ajaxSetup({
		    headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
	    });
        $.get("api/locations", function(data){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                scrollwheel: false,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            var i;
            var newMarkers = [];
            for (i = 0; i < data.data.length; i++) {
                var location = data.data[i]
                var status = location.statuses[0]
                console.log(location);
                var pictureLabel = document.createElement("img");
                pictureLabel.src = "assets/frontend/img/map/house.png";
                var boxText = document.createElement("div");
                infoboxOptions = {
                    content: boxText,
                    disableAutoPan: false,
                    //maxWidth: 150,
                    pixelOffset: new google.maps.Size(-100, 0),
                    zIndex: null,
                    alignBottom: true,
                    boxClass: "infobox-wrapper",
                    enableEventPropagation: true,
                    closeBoxMargin: "0px 0px -8px 0px",
                    closeBoxURL: "assets/frontend/img/map/close.png",
                    infoBoxClearance: new google.maps.Size(1, 1),
	                contextmenu: true
                };
                var marker = new MarkerWithLabel({
                    title: location.name,
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    icon: pinSymbol(status.color),//'assets/frontend/img/map/marker.png',
                    labelContent: pictureLabel,
                    labelAnchor: new google.maps.Point(50, 0),
                    labelClass: "marker-style"
                });

                var image = "assets/frontend/img/property_grid/property_grid-1.png";

                if(location.files.length>0)
                    image = "/uploads/files/thumb_"+location.files[0].name

                newMarkers.push(marker);
                boxText.innerHTML =
                    '<div class="property_grid">' +
						'<div class="img_area">' +
							'<a href="#">' +
							'<img src="'+image+'" alt="">' +
							'</a>' +
	                        '<div class="sale_amount" style="left: 0px !important;"> Ultima actulizare: <br />' + status.pivot.created_at + '</div>' +
	                        '<div class="sale_amount">' + status.name + '</div>' +
						'</div>' +
						'<div class="property-text">' +
							'<a href="#">' +
							'<h5 class="property-title">' + location.name + '</h5>' +
							'</a>' +
	                        '<p class="block-with-text">' + location.description + '</p>' +
							'<span><i class="fa fa-map-marker" aria-hidden="true"></i>' + location.formatted_address + '</span>' +
						'</div>' +
					'</div>';
                //Define the infobox
                newMarkers[i].infobox = new InfoBox(infoboxOptions);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        for (h = 0; h < newMarkers.length; h++) {
                            newMarkers[h].infobox.close();
                        }
                        newMarkers[i].infobox.open(map, this);
                    }
                })(marker, i));

            }
            var clusterStyles = [
                {
                    url: 'assets/frontend/img/map/marker.png',
                    height: 60,
                    width: 60
                }
            ];
            var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
            $('body').addClass('loaded');
            setTimeout(function() {
                $('body').removeClass('has-fullscreen-map');
            }, 1000);
            $('#map').removeClass('fade-map');

            //  Dynamically show/hide markers --------------------------------------------------------------

            google.maps.event.addListener(map, 'idle', function() {

                for (var i=0; i < data.length; i++) {
                    if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                        // newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                        //newMarkers[i].setMap(map);
                        //markerCluster.setMap(map);
                    } else {
                        // newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                        //newMarkers[i].setMap(null);
                        //markerCluster.setMap(null);
                    }
                }
            });

            // Function which set marker to the user position
            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }

        });
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}


