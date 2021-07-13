// Initialize the platform object:
var platform = new H.service.Platform({
    'apikey': 'gJfJikeTmD2YUxISZ4IBL7oRSysWqGVoO-SZBGgcaSY'
});

// Obtain the default map types from the platform object
var maptypes = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
    document.getElementById('map-container'),
    maptypes.vector.normal.map,
    {
    zoom: 12,
    center: { lng: 107.60, lat: -6.91 }
    });

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

var ui = H.ui.UI.createDefault(map, maptypes);

var duration = 0;
var distance = 0;

var icon = new H.map.Icon("assets/img/icon/Tempat Sampah.png", {size: {w: 75, h: 75}});

$.ajax({
    type: 'GET',
    url: '/ajax/tempat-sampah',
    success: function(data) {
        var origin = {'longitude': '107.57378231300643', 'latitude': '-6.872143008475433'}
        const router = platform.getRoutingService(null, 8);
        data.sort(function(a, b){
            return getEuclidean(origin, a)  - getEuclidean(origin, b);
        })
        data.forEach(bin => {
            if(bin.volume.volume >= 90) {
                console.log("full");
                var destination = bin;
                generateRoute(router, origin, destination);
                origin = destination;
            }
        })
    }
})

function getEuclidean(a, b){
    return (Math.sqrt(Math.pow(b.longitude - a.longitude, 2) + Math.pow(b.latitude - a.latitude, 2)));
}

function generateRoute(router, origin, destination){
    var routingParameters = {
        'routingMode': 'fast',
        'transportMode': 'truck',
        'origin': origin.latitude + ',' + origin.longitude,
        'destination': destination.latitude.toString() + ',' + destination.longitude.toString(),
        'return': 'polyline,summary'
    };

    router.calculateRoute(routingParameters, onResult,
        function(error){
            alert(error.message);
        })
}

var onResult = function(result){
    if(result.routes.length){
        result.routes[0].sections.forEach(section => {
            // Create a linestring to use as a point source for the route line
            let linestring = H.geo.LineString.fromFlexiblePolyline(section.polyline);

            // Create a polyline to display the route:
            let routeLine = new H.map.Polyline(linestring, {
            style: { strokeColor: 'blue', lineWidth: 3 }
            });

            // Create a marker for the start point:
            let startMarker = new H.map.Marker(section.departure.place.location);

            // Create a marker for the end point:
            let endMarker = new H.map.Marker(section.arrival.place.location, {icon: icon});

            // Add the route polyline and the two markers to the map:
            map.addObjects([routeLine, startMarker, endMarker]);

            // Set the map's viewport to make the whole route visible:
            map.getViewModel().setLookAtData({bounds: routeLine.getBoundingBox()});

            duration += section.summary.duration / 60;
            distance += section.summary.length / 1000;

            console.log(section.summary.length);

            document.getElementById('route-detail').innerHTML = duration.toFixed(2) + ' min (' + distance.toFixed(2) + ' km)';
        })
    }
}
