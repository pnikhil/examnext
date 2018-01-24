		//set up markers 
		var myMarkers = {"markers": [
				{"latitude": "12.9711308", "longitude":"77.6009265", "icon": "img/map-marker2.png"},
			]
		};
		
		//set up map options
		$("#map").mapmarker({
			zoom	: 18,
			center	: 'St.Marks road, Bangalore',
			markers	: myMarkers
		});

