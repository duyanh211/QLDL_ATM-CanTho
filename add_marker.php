<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'qlatm';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Tutorial</title>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="../css/index.css" />
    
</head>

<body>
    <div id="map">
        <div class="leaflet-control coordinate"></div>
    </div>
</body>

</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="./data/point.js"></script>
<script src="./data/line.js"></script>
<script src="./data/polygon.js"></script>



<script>
   
    var map = L.map('map').setView([28.3949, 84.1240], 8);

        googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });
    
    var marker = L.marker([10.03003405904932, 105.77063138994838]).addTo(map);
    var inforWindown = L.popup({ closeOnClick: false})
    .setLatLng(marker.getLatLng())
    // .setContent('"<b>Can Tho University</b> <br> by Hong Ngan"');
    marker.bindPopup(inforWindown);
    inforWindown.openOn(map);
    marker.openPopup();
    inforWindown.openOn(map);
    var markerCoord = [10.03003405904932, 105.77063138994838]; // Toạ độ marker
    var popupOption = {
    className: "popup-content",
    closeOnClick: false
    };
    var popupContent = `
    <div class='left'>
        <img src='https://cellphones.com.vn/sforum/wp-content/uploads/2018/11/2-8.png' />
    </div>
    <div class='right'>
        <p>"<strong>Can Tho University</strong> <br> Welcome to my map by Hong Ngan!. Hello Quốc Anh"</p>
    </div>
    <div class='clearfix'></div>`;

    var marker = L.marker(markerCoord).addTo(map);
    var inforWindown = L.popup(popupOption)
    .setLatLng(marker.getLatLng())
    .setContent(popupContent);
    marker.bindPopup(inforWindown);
    inforWindown.openOn(map);
    /*==============================================
                TILE LAYER and WMS
    ================================================*/
    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);
    // map.addLayer(osm)

    // water color 
    var watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    // watercolor.addTo(map)

    // dark map 
    var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });
    // dark.addTo(map)

    // google street 
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    // googleStreets.addTo(map);

    //google satellite
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    // googleSat.addTo(map)

    var wms = L.tileLayer.wms("http://localhost:8080/geoserver/wms", {
        layers: 'geoapp:admin',
        format: 'image/png',
        transparent: true,
        attribution: "wms test"
    });



    /*==============================================
                        MARKER
    ================================================*/
    var myIcon = L.icon({
        iconUrl: 'img/red_marker.png',
        iconSize: [40, 40],
    });
    var singleMarker = L.marker([28.3949, 84.1240], { icon: myIcon, draggable: true });
    var popup = singleMarker.bindPopup('This is the Nepal. ' + singleMarker.getLatLng()).openPopup()
    popup.addTo(map);

    var secondMarker = L.marker([29.3949, 83.1240], { icon: myIcon, draggable: true });

    console.log(singleMarker.toGeoJSON())


    /*==============================================
                GEOJSON
    ================================================*/
    var pointData = L.geoJSON(pointJson).addTo(map)
    var lineData = L.geoJSON(lineJson).addTo(map)
    var polygonData = L.geoJSON(polygonJson, {
        onEachFeature: function (feature, layer) {
            layer.bindPopup(`<b>Name: </b>` + feature.properties.name)
        },
        style: {
            fillColor: 'red',
            fillOpacity: 1,
            color: '#c0c0c0',
        }
    }).addTo(map);



    /*==============================================
                    LAYER CONTROL
    ================================================*/
    var baseMaps = {
        "OSM": osm,
        "Water color map": watercolor,
        'Dark': dark,
        'Google Street': googleStreets,
        "Google Satellite": googleSat,
    };
    var overlayMaps = {
        "First Marker": singleMarker,
        'Second Marker': secondMarker,
        'Point Data': pointData,
        'Line Data': lineData,
        'Polygon Data': polygonData,
        'wms': wms
    };
    // map.removeLayer(singleMarker)

    L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);


    /*==============================================
                    LEAFLET EVENTS
    ================================================*/
    map.on('mouseover', function () {
        console.log('your mouse is over the map')
    })

    map.on('mousemove', function (e) {
        document.getElementsByClassName('coordinate')[0].innerHTML = 'lat: ' + e.latlng.lat + 'lng: ' + e.latlng.lng;
        console.log('lat: ' + e.latlng.lat, 'lng: ' + e.latlng.lng)
    })


    /*==============================================
                    STYLE CUSTOMIZATION
    ================================================*/


</script>