
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



var listAdd = $('#listAdd')
var iconChrvr_adds = $('#chevron-add')
var iconExpand_adds = $('#expand-add')

iconChrvr_adds.onclick = function(){
	listAdd.style.display = 'block'
	iconChrvr_adds.style.display = 'none'
	iconExpand_adds.style.display = 'block'
}

iconExpand_adds.onclick = function(){
	listAdd.style.display = 'none'
	iconExpand_adds.style.display = 'none'
	iconChrvr_adds.style.display = 'block'
}

// form them dia diem atm
 var addBtn = $('#addAtmbtn')
 var formAdd = $('#formAddAtm')

 addBtn.onclick = function(){
	formAdd.style.display = 'block'
 }

// close form add
var btncloseAdd = $('#btnClAtmform')

btncloseAdd.onclick = function(){
	formAdd.style.display = 'none'
 }

 // end  form them dia diem atm

 // form add bank
 var addBanktbn = $('#addBanktbn')
 var formAddBank = $('#formAddBank')

 addBanktbn.onclick = function(){
	formAddBank.style.display = 'block'
 }

// close form add
var btnClofBank = $('#btnClofBank')

btnClofBank.onclick = function(){
	formAddBank.style.display = 'none'
 }


//  xuly list atm
var iconChrvron = $('#chevron-atm')
var iconExpand = $('#expand-atm')
var childList = $('#list-atm')

iconChrvron.onclick = function(){
	childList.style.display = 'block'
	iconChrvron.style.display = 'none'
	iconExpand.style.display = 'block'
}

iconExpand.onclick = function(){
	childList.style.display = 'none'
	iconExpand.style.display = 'none'
	iconChrvron.style.display = 'block'
	console.log(childList)
}

// xuly list pgd
var iconChrvr_trans = $('#chevron-trans')
var iconExpand_trans = $('#expand-trans')
var childList_trans = $('#list-trans')

iconChrvr_trans.onclick = function(){
	childList_trans.style.display = 'block'
	iconChrvr_trans.style.display = 'none'
	iconExpand_trans.style.display = 'block'
}

iconExpand_trans.onclick = function(){
	childList_trans.style.display = 'none'
	iconExpand_trans.style.display = 'none'
	iconChrvr_trans.style.display = 'block'
}

// xuly list bank

var iconChrvron_bank = $('#chevron-bank')
var iconExpand_bank = $('#expand-bank')
var childList_bank = $('#list-bank')

iconChrvron_bank.onclick = function(){
	childList_bank.style.display = 'block'
	iconChrvron_bank.style.display = 'none'
	iconExpand_bank.style.display = 'block'
}

iconExpand_bank.onclick = function(){
	childList_bank.style.display = 'none'
	iconExpand_bank.style.display = 'none'
	iconChrvron_bank.style.display = 'block'
}