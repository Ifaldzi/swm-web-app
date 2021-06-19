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
    zoom: 15,
    center: { lng: 107.60, lat: -6.91 }
    });

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

var ui = H.ui.UI.createDefault(map, maptypes);

var pinIcon = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602"/></svg>';
var coords = {lng: 107.650878, lat: -6.967984};
var icon = new H.map.Icon("assets/img/icon/tongSampah.jpeg");
var marker = new H.map.Marker(coords, {icon: icon});
// map.addObject(marker);
marker = new H.map.Marker({lng: 107.60, lat: -6.91}, {icon: icon});
// map.addObject(marker);
map.setCenter(coords);
