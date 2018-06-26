
// top menu

var map5 = new GMaps({
	div: "#gmap",
	lat: 44.4267674,
	lng: 26.1025383,
	zoom: 15,
	zoomControl : true,
	zoomControlOpt: {
		style : "SMALL",
		position: "TOP_LEFT"
	},
	panControl : true,
	streetViewControl : false,
	mapTypeControl: false,
	overviewMapControl: false,
	markerClusterer: function(map) {
		options = {
			gridSize: 40
		}

		return new MarkerClusterer(map, [], options);
	}
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

var bounds = []

$.each(locations,function(key,val){
	map5.addMarker({
		lat: val.lat,
		lng: val.lng,
		title:val.formatted_address,
		icon:pinSymbol(val.status.color),
		infoWindow: {
			content : '<h4>'+val.name+'</h4><p>Status:'+val.status.name+'</p><p><a href="/admin/locations/'+val.id+'" target="_blank">View Location</a> </p>'
		}
	})
	bounds.push(new google.maps.LatLng(val.lat,val.lng));
});
map5.fitLatLngBounds(bounds);

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

