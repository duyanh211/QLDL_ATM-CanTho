var mapOptions = {
	center: [10.030218944120898, 105.77061529637719],
	zoom: 10
};
	  

var map = new L.map('map', mapOptions);
var layer = new L.TileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
							maxZoom: 20,
							subdomains: ['mt0','mt1','mt2','mt3']
							});
map.addLayer(layer);
var icon = new L.icon({iconUrl:"../images/ht-rua.png",iconSize:[30,30]});
var customPopup = "<b>Đại học Cần Thơ</b><br/><img src='../images/ht-rua.png' width='150px'/>";

  var locations = [
					{
						name: 'Khu I đường 30/4',
						coordi: [10.015944272676007, 105.7657626384412]
					},
					{
						name: 'Khu II đường 3/2',
						coordi: [10.0354, 105.7684]
					},
					{
						name: 'Khu III đường Lý Tự Trọng',
						coordi: [10.0291, 105.7682]
					},
					{
						name: 'Khu Hòa An',
						coordi: [9.9500, 105.6500]
					}
				];

			var defaultIcon = L.icon({
			iconUrl: '../images/marker-icon-2x.png',
			iconSize: [21, 31],
		});
// Lặp qua mảng locations và tạo marker cho mỗi vị trí
locations.forEach(function(location) {
    // Tạo marker
	// var marker = new L.marker([lat,long], {title: “...”, alt: “...”});
    var marker2 = L.marker(location.coordi, {title: location.name, icon: defaultIcon}).addTo(map);
    
    // Thêm popup cho marker
    marker2.bindPopup(location.name);
});


if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position){

	var latitude = position.coords.latitude;

	var longitude = position.coords.longitude;
	var markerLocation = new L.LatLng(latitude, longitude);
	var marker =  L.marker(markerLocation,{icon: defaultIcon}).addTo(map);
	marker.bindPopup("Bạn đang ở đây").openPopup();
	});
}



const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

// Lấy phần tử cần di chuyển và thẻ cha cần đặt vào
var child = $(".leaflet-control-zoom.leaflet-bar.leaflet-control");
var newParent = $(".leaflet-bottom.leaflet-right");

// Di chuyển phần tử từ thẻ cha cũ sang thẻ cha mới
newParent.appendChild(child);

// xoa icon leaflet
var iconLeaflet = $(".leaflet-control-attribution.leaflet-control");
iconLeaflet.remove();


// menu 
	
	var menu_list = $(".menu_list")
	var mapElement = $('#map')
	menu_list.style.display = 'none'

	function clickMenu(){
		menu_list.style.display = 'block'
		mapElement.style.opacity = 0.5
	}

// btn close
	var btn_close = $('.btn_close')
	function clickBtnClose(){

		menu_list.style.display = 'none'
		mapElement.style.opacity = 1

	}



