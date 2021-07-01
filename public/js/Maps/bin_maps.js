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

$.ajax({
    type: 'GET',
    url: '/ajax/tempat-sampah-location',
    success: function(data) {
        var bin = data;
        for(var index in data) {
            var coords = {lng: data[index].location.longitude, lat: data[index].location.latitude};
            var icon = new H.map.Icon("assets/img/icon/Tempat Sampah.png", {size: {w: 75, h: 75}});
            var marker = new H.map.Marker(coords, {icon: icon});
            map.addObject(marker);
        }
    }
})

function goToLocation(location) {
    var longitude = location.longitude;
    var latitude = location.latitude;
    var center = {lng: longitude, lat:latitude};

    map.getViewModel().setLookAtData({position: center, zoom: 16}, true);
}

// setTimeout("location.reload(true)", 3000);
