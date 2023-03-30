
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
		mapElement.style.opacity = 1
	}

// btn close
	var btn_close = $('.btn_close')
	function clickBtnClose(){
		menu_list.style.display = 'none'
		mapElement.style.opacity = 1
	}




		
