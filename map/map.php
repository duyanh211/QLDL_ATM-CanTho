<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" href="../leaflet/leaflet.CSS">
<script src="../leaflet/leaflet-src.esm.js"></script>
<script src="../leaflet/leaflet-src.js"></script>
<link rel="stylesheet" href="../leaflet/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="../leaflet/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="./Style.css">
<head>

<title>ATM-MAP2</title>
<style> 
	.addForm{
		position: relative;
		height: 300px;
		opacity: 1;
		width: 400px;
		z-index: 2000;
		position: fixed;
		top: 20%;
		left: 30%;
		background: #ccc;
		border-radius: 20px;
		padding: 20px;
	}
	.addForm select {
		border-radius: 4px;
		height: 28px;
		position: absolute;
		right: 10px;
	}

	.addForm button{
		position: absolute;
		right: 10px;
	}

	.addForm input {
		width: 250px;	
	}

</style>
</head>

<body>
    <div id ="main-menu" class="menu_list">
        <div class="header-list">
            <h1 class="map_name">ATM_Map</h1>
            <div class="btn_close" onclick = "clickBtnClose()"><i class="fa fa-close"></i></div>
        </div>

        <div class="items">
            <ul class="item-list">
                <li class="item"><i class="fa fa-bookmark" style="font-size:25px"></i> <p>Danh Sách ATM</p></li>
                <li class="item"><i class='fas fa-user-check' style='font-size:20px'></i> <p>Đã được chia sẽ</p></li>
                <li class="item"><i class='fas fa-wheelchair' style='font-size:24px'></i> <p>Đường đi</p></li>
                <li id = "addbtn" class="item" style="cursor: pointer;"><i class='fas fa-wheelchair' style='font-size:24px'></i> <p>Thêm</p></li>
            </ul>
        </div>
    </div>
    <div id="map">
		<div id= "header">
			<div class = "search-container" >
                <div class="menu" onclick="clickMenu()">
                    <i class="fas fa-bars menu-icon" ></i>
                </div>

				<div class="search">                
						<form action="index.php" method="POST">
							<input name="search" type="text" placeholder="Tìm kiếm trên stupid map">
						</form>

                        <div class="search_direct">
                            <i class="fas fa-search search-icon">
                            <div class="seprate">|</div>
							<i class="fas fa-share icon-direct"></i></i>
                        </div>
					
					</div>
                   
			</div>
			</div>
							<form class="addForm">
								<select name="Bankname" >
									<option value="">Ngân hàng SCB</option>
									<option value="">Ngân hàng VCB</option>
								</select>
								<div class="container-laInp">
									<label for="">Nhập tên</label>
									<input type="text" class="form-control" placeholder="Nhập tên Atm/phòng Giao Dịch" name="name">
									<label for="">Địa chỉ</label>
									<input type="text" class="form-control" placeholder="Nhập địa chỉ " name="addr">
									<label for="">Vĩ độ</label>
									<input type="text" class="form-control" placeholder="Nhập vị độ" name="lat">
									<label for="">Kinh Độ</label>
									<input type="text" class="form-control" placeholder="Nhập kinh độ" name="longt">
								</div>
									<button class="btn btn-primary">Lưu</button>
							</form>

		</div>

	</div>
	
	<?php 
			require_once('../connect/connect.php');
			$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
			 $sql = 'select * from cayatm';
			 $result = mysqli_query($conn, $sql);
			 $data   = [];
			 
	while ($row=mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	
		$jsonData = json_encode($data);
	?>

<script>
	var mapOptions = {
	center: [10.030218944120898, 105.77061529637719],
	zoom: 13
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
			iconSize: [23, 33],
		});

locations.forEach(function(location) {
    var marker2 = L.marker(location.coordi, {title: location.name, icon: defaultIcon}).addTo(map);
    marker2.bindPopup(location.name);
});
	
	// render data tu database atm
var atmLocations = <?php echo $jsonData ?>;

	atmLocations.forEach(function(atmlocation) {
	var marL = new L.LatLng(atmlocation.viDo, atmlocation.kinhDo);
    var marker = L.marker(marL, {title: atmlocation.tencay, icon: defaultIcon}).addTo(map);
    marker.bindPopup(atmlocation.tenCay);
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

var btnadd = document.querySelector('#addbtn');
	btnadd.onclick= function() {

		console.log(toast);
		toast.style.opacity = 1;
	  }
//search https://youtu.be/rEa_S_HiKxs
	</script>
	
	<script src="./main.js" ></script>
</body>
</html>