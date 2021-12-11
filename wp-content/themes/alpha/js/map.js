function initialize() {
	var myLatlng = new google.maps.LatLng(gcode.lat, gcode.lng);
	//var address = new google.maps.LatLng(gcode.address);
	//console.log(gcode.lat);
	var mapOptions = {
		zoom: Number(gcode.zoom),
		center: myLatlng,
        panControl:true,
		zoomControl:false,
		mapTypeControl:false,
		scrollwheel : true,
		draggable: true,
		scaleControl:true,
		streetViewControl:false,
		fullscreenControl : false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
		// disableDefaultUI: false,
		//clickableIcons: false,
		
		

	}
	var map = new google.maps.Map(document.getElementById(gcode.mapId), mapOptions);
	
		var mapTitle=gcode.title;
		var mapAddress=gcode.address;
		var mapAddress = mapAddress.split(',');
		var mapAdd=gcode.add;
		var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
		////var contentString = "<div id='infocontent'><div class='sub_title'><a href='https://maps.google.com/maps?q="+mapAdd+"' target='_blank'>"+mapAddress+"</a></div></div>";
		// if(gcode.address != ''){
			// var infowindow = new google.maps.InfoWindow({
				// content: contentString
			// });
		// }
		var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				label: mapAddress[0],
				icon:gcode.marker
			});
			map.mapTypes.set('map_style', styledMap);
			map.setMapTypeId('map_style');
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
		});
}
google.maps.event.addDomListener(window, 'load', initialize);