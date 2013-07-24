     function initialize(long,lat) {
        var mapOptions = {
          center: new google.maps.LatLng(14.1300, 121.2000),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        suppressInfoWindow:false
        };
		
		var map = new google.maps.Map(document.getElementById("map_container"),
            mapOptions);
      
      
		var myLatlng = new google.maps.LatLng(14.1331, 121.2015);
		
		var marker = new google.maps.Marker({
	      position: myLatlng,
	      map: map,
	      title:"Hello World!"
		});
      
      
      
      }
      
      
      google.maps.event.addDomListener(window, 'load', initialize);