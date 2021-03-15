mapboxgl.accessToken = 'pk.eyJ1IjoiaHVnb2VyaWNzb24iLCJhIjoiY2ttMXhkaTFvMzEzYjJvcDNkbGx5MHlmZiJ9.d6TkGQJx7AV5dvoNBofLvw'; // replace this with your access token
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/hugoericson/ckm1xjg4m7aep17qojypeeq7x', // replace this with your style URL
    center: [18.266002, 59.331341],
    zoom: 12
});

map.on("click", function (e) {
    console.log("du har klickat på kartan", e.lngLat);

    var marker = new mapboxgl.Marker()
        .setLngLat(e.lngLat)
        .addTo(map);
});