$(function () {


	var map5 = new GMaps({
		div: "#gmap",
		lat: 45.66,
		lng: 25.61,
		zoom: 13,
		zoomControl : true,
		zoomControlOpt: {
			style : "SMALL",
			position: "TOP_RIGHT"
		},
		panControl : true,
		streetViewControl : false,
		mapTypeControl: false,
		overviewMapControl: false
	});
	var styles = [
		{
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#242f3e"
				}
			]
		},
		{
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#746855"
				}
			]
		},
		{
			"elementType": "labels.text.stroke",
			"stylers": [
				{
					"color": "#242f3e"
				}
			]
		},
		{
			"featureType": "administrative.locality",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#d59563"
				}
			]
		},
		{
			"featureType": "poi",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#d59563"
				}
			]
		},
		{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#263c3f"
				}
			]
		},
		{
			"featureType": "poi.park",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#6b9a76"
				}
			]
		},
		{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#38414e"
				}
			]
		},
		{
			"featureType": "road",
			"elementType": "geometry.stroke",
			"stylers": [
				{
					"color": "#212a37"
				}
			]
		},
		{
			"featureType": "road",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#9ca5b3"
				}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#746855"
				}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry.stroke",
			"stylers": [
				{
					"color": "#1f2835"
				}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#f3d19c"
				}
			]
		},
		{
			"featureType": "transit",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#2f3948"
				}
			]
		},
		{
			"featureType": "transit.station",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#d59563"
				}
			]
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#17263c"
				}
			]
		},
		{
			"featureType": "water",
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"color": "#515c6d"
				}
			]
		},
		{
			"featureType": "water",
			"elementType": "labels.text.stroke",
			"stylers": [
				{
					"color": "#17263c"
				}
			]
		}
	];
	map5.addStyle({
		styles: styles,
		mapTypeId: "maps_style"
	});

	map5.setStyle("maps_style");

	//var x = map5.addControl({id:"pac-input-div",position:"TOP_LEFT",content:'<input id="pac-input-1" class="controls" type="text" placeholder="Enter a location">'});

	//console.log(x);
	console.log($('#pac-input'));

	var input = $('#pac-input').get(0);
	console.log(input);

	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map5.map);

	map5.map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	function pinSymbol(color) {
		return {
			path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
			fillColor: color,
			fillOpacity: 1,
			strokeColor: '#000',
			strokeWeight: 2,
			scale: 1,
		};
	}

	autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}


		map5.removeMarkers();

		map5.addMarker({
			lat:place.geometry.location.lat(),
			lng:place.geometry.location.lng(),
			//title:place.formatted_address,
			draggable: true,
			animation: google.maps.Animation.DROP,
			icon:pinSymbol("#FFF"),
			dragend: function(event) {
				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				geocodeLatLng(geocoder,map5,{lat:lat,lng:lng})

			},
		})

		if (place.geometry.viewport) {
			map5.map.fitBounds(place.geometry.viewport);
		} else {
			map5.map.setCenter(place.geometry.location);
			map5.map.setZoom(17);
		}

		$("#place_id").val(place.place_id)
		$("#formatted_address").val(place.formatted_address)
		$("#lat").val(place.geometry.location.lat())
		$("#lng").val(place.geometry.location.lng())
		console.log(place);
		console.log(place.geometry.location.lat(),place.geometry.location.lng());
	});

	function findTypes(address_components, types){
		for (var i = 0; i < address_components.length; i++){
			var component = address_components[i];
			if(component.types[0] == types)
				return component.short_name
		}
	}
	var geocoder = new google.maps.Geocoder;
	function geocodePlaceId(placeid) {
		geocoder.geocode({'placeId': placeid}, function (results, status) {
			if (status === 'OK') {

				var place = results[0];

				console.log(place);

				$('#pac-input').val(place.formatted_address);

				if (!place.geometry) {
					return;
				}


				map5.addMarker({
					lat:place.geometry.location.lat(),
					lng:place.geometry.location.lng(),
					//title:place.formatted_address,
					draggable: true,
					animation: google.maps.Animation.DROP,
					icon:pinSymbol("#FFF"),
					dragend: function(event) {
						var lat = event.latLng.lat();
						var lng = event.latLng.lng();
						geocodeLatLng(geocoder,map5,{lat:lat,lng:lng})

					},
				})

				if (place.geometry.viewport) {
					map5.map.fitBounds(place.geometry.viewport);
				} else {
					map5.map.setCenter(place.geometry.location);
					map5.map.setZoom(17);
				}

			} else {
				window.alert('Geocoder failed due to: ' + status);
			}
		});
	}

	function geocodeLatLng(geocoder, map, location) {

		geocoder.geocode({'location': location}, function(results, status) {
			if (status === 'OK') {
				if (results[0]) {
					console.log(results[0])
					place = results[0]
					$("#place_id").val(place.place_id)
					$("#formatted_address").val(place.formatted_address)
					$("#lat").val(place.geometry.location.lat())
					$("#lng").val(place.geometry.location.lng())
					$('#pac-input').val(results[0].formatted_address);

					//map.markers[0].title = results[0].formatted_address
				} else {
					window.alert('No results found');
				}
			} else {
				window.alert('Geocoder failed due to: ' + status);
			}
		});
	}

	console.log($('#place_id').val().length);

	if($('#place_id').val().length>1)
		geocodePlaceId($('#place_id').val());


	//map5.map



});