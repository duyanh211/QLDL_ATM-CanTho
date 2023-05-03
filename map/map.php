<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'qlatm';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
$qr_atm = 'SELECT * FROM cayatm';	
$query_exe = mysqli_query($conn, $qr_atm);
$qr_phong = 'SELECT * FROM phong_gd';	
$query_exe1 = mysqli_query($conn, $qr_phong);
$qr_nn = 'SELECT * FROM nganhang';	
$query_exe2 = mysqli_query($conn, $qr_nn);
if (isset($_POST["btn_NH"])) {
	$tenNH = $_POST["tenNH"];   
	$soNha = $_POST["ward"].$_POST["district"].$_POST["city"]; 
	$kinhDo = $_POST["kinhDo"];
	$viDo = $_POST["viDo"];
	if ($tenNH =="" ||$soNha ==""|| $kinhDo ==""|| $viDo ==""   ) {
	
		echo '<script>
			alert("Nhập đầy đủ thông tin ngân hàng!");
			window.location.assign("map.php");
		</script>'; 
	}else{
			  $sql = "INSERT INTO `nganhang`( `tenNH`, `soNha`, `kinhDo`, `viDo`) 
			  VALUES ('$tenNH','$soNha','$kinhDo','$viDo')";
			   mysqli_query($conn,$sql);	
			   echo '<script>
			   alert("them thanh cong!");
			   window.location.assign("map.php");
		   </script>'; 
		  }		
   }
   if (isset($_POST["btn_ATM"])) {
	$tenCay = $_POST["tenCay"]; 
	$diaChi = $_POST["ward"].$_POST["district"].$_POST["city"]; 
	$kinhDo = $_POST["kinhDo"];
	$viDo = $_POST["viDo"];
	$maNH = $_POST["Bankname"];
	if ($maNH =="" ||$diaChi ==""|| $kinhDo ==""|| $viDo ==""  ) {
		echo '<script>
			alert("Nhập đầy đủ thông tin ATM!");
			window.location.assign("map.php");
		</script>'; 
	}else{
			  $sql = "INSERT INTO `cayatm`(`maNH`, `tenCay`, `diaChi`, `kinhDo`, `viDo`) 
			  VALUES ('$maNH','$tenCay','$diaChi','$kinhDo','$viDo')";
			   mysqli_query($conn,$sql);
				echo '<script>
					alert("Tạo ATM thành công!");
					window.location.assign("map.php");
				</script>';    
		  }		
   }
   if (isset($_POST["btn_PGD"])) {
	$tenPhong = $_POST["tenPhong"]; 
	$diaChi = $_POST["ward"].$_POST["district"].$_POST["city"]; 
	$kinhDo = $_POST["kinhDo"];
	$viDo = $_POST["viDo"];
	$maNH = $_POST["Bankname"];
	if ($maNH =="" ||$diaChi ==""|| $kinhDo ==""|| $viDo =="") {
		echo '<script>
			alert("Nhập đầy đủ thông tin phòng giao dịch!");
			window.location.assign("map.php");
		</script>'; 
	}else{
			  $sql = "INSERT INTO `phong_gd`(`maNH`,`diaChi`, `tenPhong`, `kinhDo`, `viDo`) 
			  VALUES ('$maNH','$diaChi','$tenPhong','$kinhDo','$viDo')";
			   mysqli_query($conn,$sql);
				echo '<script>
					alert("Tạo phòng giao dịch thành công!");
					window.location.assign("map.php");
				</script>';    
		  }		
   }
?>
<head>
	<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel ="stylesheet" href="../leaflet/leaflet.CSS">
	<script src="../leaflet/leaflet-src.esm.js"></script>
	<script src="../leaflet/leaflet-src.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../leaflet/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
	<script src="../leaflet/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<link rel="stylesheet" href="./Style.css">

	<style>
		.addForm select {
		border-radius: 4px;
		height: 28px;
		position: absolute;
		right: 162px;
		left: 10px;
		}

		.pls::placeholder {
			font-weight: 300;
			color: #000;
			font-size: 14px;
		}

	</style>	
	<title>ATM-MAP2</title>
</head>
<body>
 
    <div id ="main-menu" class="menu_list">
        <div class="header-list">
            <h1 class="map_name" style="color: #4285f4;">A<span style="color: #ea4335;">T</span><span style="color: #fbbc05;"></span> <span style="color: #fbbc05;">M</span><span style="color: #34a853;">A</span>P</h1>
            <div class="btn_close" onclick = "clickBtnClose()"><i class="fa fa-close"></i></div>
        </div>

        <div class="items">
            <ul class="item-list">
                <li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i> 
				<p>Danh Sách ATM</p>
				<i class="material-icons" id = "chevron-atm">chevron_right</i>
				<i class="material-icons" id="expand-atm">expand_more</i></li>
				<div id="list-atm" class="listChild" style="margin-top: -5px;   margin-left: 0%;">
					<ul class="" name="maCay">
							<?php while($rows = mysqli_fetch_array($query_exe)) {?>
								<li class="lihov" value="<?= $rows['maCay'] ?>"><?= $rows['tenCay']?><button class= "btn btn-danger"><a href="delete_atm.php?maCay=<?= $rows['maCay'] ?>">Xóa</a></button></li>
							<?php } ?>
							
					</ul>
				</div>
				<!-- list phong gd -->
				<li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i> 
				<p>Phòng giao dịch</p><i class="material-icons" id = "chevron-trans">chevron_right</i>
				<i class="material-icons" id="expand-trans">expand_more</i></li>
				<div id="list-trans" class="listChild" style="margin-top: -5px;   margin-left: 0%;">
					<ul class="" name="maPhong">
							<?php while($rows = mysqli_fetch_array($query_exe1)) {?>
								<li class="lihov" value="<?= $rows['maPhong'] ?>"><?= $rows['tenPhong'] ?><button class= "btn btn-danger"><a href="delete_PGD.php?maPhong=<?= $rows['maPhong'] ?>">Xóa</a></button></li>
							<?php } ?>
					</ul>
				</div>
				<!-- list ngan hang -->
				<li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i>
				 <p>Ngân hàng</p><i class="material-icons" id = "chevron-bank">chevron_right</i>
				 <i class="material-icons" id="expand-bank">expand_more</i></li>
				<div id="list-bank" class="listChild" style="margin-top: -5px;   margin-left: 0%;">
					<ul class="" name="maNH">
							<?php while($rows = mysqli_fetch_array($query_exe2)) {?>
								<li class="lihov" value="<?= $rows['maNH'] ?>"><?= $rows['tenNH'] ?><button class= "btn btn-danger"><a href="delete_NH.php?maNH=<?= $rows['maNH'] ?>">Xóa</a></button></li>
							<?php } ?>
					</ul>
				</div>

                <li class="item"><i class='fas fa-user-check icon-cus' style='font-size:20px'></i> <p>Đã được chia sẽ</p></li>
                <li class="item"><i class='fas fa-wheelchair icon-cus' style='font-size:24px'></i> <p>Đường đi</p></li>

                <li  class="item" style="cursor: pointer;"><i class='fas fa-wheelchair icon-cus' style='font-size:24px'></i> 
				<p style="margin-left: 12px;">Thêm</p> 
				<i class="material-icons" id ="chevron-add">chevron_right</i>
				<i class="material-icons" id="expand-add">expand_more</i>
				</li>
				<div id="listAdd" class="liAdds" style="margin-top: -5px;  width:fit-content;">
					<ul class="ul-child-add">
						<li id = "addBanktbn">Ngân hàng</li>
						<li id = "addTransit">Phòng giao dịch</li>
						<li id = "addAtmbtn">Atm</li>
					</ul>
				</div>
				<li class="item"><i class='fa fa-bar-chart' ></i> <a href="./chart.php">Thống kê</a></li>
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

                          <!--<div class="search_direct">
                            <i class="fas fa-search search-icon">
                           <div class="seprate">|</div> 
							<i class="fas fa-share icon-direct"></i></i>
                        </div>-->
					
					</div>
                   
			</div>
			</div>			
							<form action="" class="addForm" id="formAddAtm" method="POST" style="padding-top: 69px;">
							<h3 style="margin-top: -69px;">Thêm ATM</h3> <br>
							<i class="material-icons" id="btnClAtmform" style="font-size:30px">close</i>
								<select name="Bankname" class="selBankname">	
									<option value="maNH">Chọn Ngân Hàng</option>
									<?php 
										$qr_nn = 'SELECT * FROM nganhang';	
										$query_exe3 = mysqli_query($conn, $qr_nn);	
										while($row3 = mysqli_fetch_array($query_exe3)){
											?> 
										 <option value="<?= $row3['maNH'] ?>"><?= $row3['tenNH'] ?>    </option>
											<?php
										}
									?>
								</select>
								<div class="container-laInp" style="margin-top:90px">
									<!-- <label for="">Địa chỉ</label>
									<input type="text" class="form-control" placeholder="Nhập địa chỉ " name="diaChi"> -->

									<div class="select-cus" style="margin-top: 15px;">

										<select class="form-select form-select-sm mb-3" id="city" name="city" style= "margin-top: 37px; width: 258px; margin-right: 0px;" aria-label=".form-select-sm">
											<option value="" selected>Chọn tỉnh thành</option>           
											</select>
											<br>	
											<select class="form-select form-select-sm mb-3" id="district" name="district"  style= "margin-top: 71px; width: 258px;  margin-right: 0;" aria-label=".form-select-sm">
											<option value="" selected>Chọn quận huyện</option>
											</select>
											<br>
											<select class="form-select form-select-sm" id="ward" name="ward" style= "margin-top: 105px; width: 258px;   margin-right: 0; " aria-label=".form-select-sm">
											<option value="" selected>Chọn phường xã</option>
											</select>  
									</div>
									<!-- <label for="">Nhập tên</label> -->
									<input type="text" class="form-control pls" placeholder="Nhập tên Atm" name="tenCay">

									<!-- <label for="">Vĩ độ</label> -->
									<input type="text" class="form-control pls" placeholder="Nhập vĩ độ" name="viDo">
									<!-- <label for="">Kinh Độ</label> -->
									<input type="text" class="form-control pls" placeholder="Nhập kinh độ"  name="kinhDo">
								</div>
								<button class="btn btn-primary" type="submit" name="btn_ATM" >Lưu</button>
							</form>

							<!-- form add NH -->
							<form class="addForm" id="formAddBank" method="POST"> 
							<h3>Thêm Ngân Hàng</h3> 
							<i class="material-icons"  id="btnClofBank" style="font-size:30px">close</i>
								<div class="container-laInp">
									<label for="">Nhập tên</label>
									<input type="text" class="form-control" placeholder="Nhập tên ngân hàng" name="tenNH">
									<div class="select-cus" style="margin-top: 15px;">

										<select class="form-select form-select-sm mb-3" style= "margin-top: 37px; width: 258px; margin-right: 0px;" aria-label=".form-select-sm">
											<option value="" selected>Chọn tỉnh thành</option>           
											</select>
											<br>	
											<select class="form-select form-select-sm mb-3"   style= "margin-top: 71px; width: 258px;  margin-right: 0;" aria-label=".form-select-sm">
											<option value="" selected>Chọn quận huyện</option>
											</select>
											<br>
											<select class="form-select form-select-sm"  style= "margin-top: 105px; width: 258px;   margin-right: 0; " aria-label=".form-select-sm">
											<option value="" selected>Chọn phường xã</option>
											</select>  
									</div>
									<label for="">Vĩ độ</label>
									<input type="text" class="form-control" placeholder="Nhập vĩ độ" name="viDo">
									<label for="">Kinh Độ</label>
									<input type="text" class="form-control" placeholder="Nhập kinh độ" name="kinhDo">
								</div>
									
								<button class="btn btn-primary" type="submit" name="btn_NH"  >Lưu</button>
							</form>
							<!-- form add GD -->
							<form class="addForm" id="formaddTransit" method="POST">
							<h3>Thêm Phòng Giao Dịch</h3> <br>
							<i class="material-icons"  id="btnClofGD" style="font-size:30px">close</i>
								<div class="container-laInp">
									<select name="Bankname" class="selBankname">	
									<option value="maNH">Chọn Ngân Hàng</option>
									<?php 
										$qr_nn = 'SELECT * FROM nganhang';	
										$query_exe3 = mysqli_query($conn, $qr_nn);	
										while($row3 = mysqli_fetch_array($query_exe3)){
											?> 
											 <option value="<?= $row3['maNH'] ?>"><?= $row3['tenNH'] ?>     </option>
											<?php
										}
									?>
								</select>
									<label for="">Tên Phòng Giao Dịch</label>
									<input type="text" class="form-control" placeholder="Nhập tên phòng giao dịch " name="tenPhong">
									<div class="select-cus" style="margin-top: 15px;">

										<select class="form-select form-select-sm mb-3"  style= "margin-top: 37px; width: 258px; margin-right: 0px;" aria-label=".form-select-sm">
											<option value="" selected>Chọn tỉnh thành</option>           
											</select>
											<br>	
											<select class="form-select form-select-sm mb-3"   style= "margin-top: 71px; width: 258px;  margin-right: 0;" aria-label=".form-select-sm">
											<option value="" selected>Chọn quận huyện</option>
											</select>
											<br>
											<select class="form-select form-select-sm"  style= "margin-top: 105px; width: 258px;   margin-right: 0; " aria-label=".form-select-sm">
											<option value="" selected>Chọn phường xã</option>
											</select>  
									</div>
									<label for="">Vĩ độ</label>
									<input type="text" class="form-control" placeholder="Nhập vĩ độ" name="viDo">
									<label for="">Kinh Độ</label>
									<input type="text" class="form-control" placeholder="Nhập kinh độ" name="kinhDo">
								</div>
									<button class="btn btn-primary" type="submit" name="btn_PGD"  >Lưu</button>
							</form>
		</div>

	</div>
	
	<?php 
			require_once('../connect/connect.php');
			//$conn = mysqli_connect(HOST, Ten, matkhau, DATABASE);
			 $sql = 'select * from cayatm';
			 $result = mysqli_query($conn, $sql);
			 $data   = [];
			 
	while ($row=mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	
		$jsonData = json_encode($data);
	?>

<?php 
			require_once('../connect/connect.php');
			//$conn = mysqli_connect(HOST, Ten, matkhau, DATABASE);
			 $sql = 'select * from nganhang';
			 $result = mysqli_query($conn, $sql);
			 $data   = [];
			 
	while ($row=mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	
		$jsonNganHang = json_encode($data);
	?>

<?php 
			require_once('../connect/connect.php');
			//$conn = mysqli_connect(HOST, Ten, matkhau, DATABASE);
			 $sql = 'select * from phong_gd';
			 $result = mysqli_query($conn, $sql);
			 $data   = [];
			 
	while ($row=mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	
		$jsonPhongGiaoDich = json_encode($data);
	?>

<script>
	var mapOptions = {
	center: [10.03395557468458	, 105.78740813489367],
	zoom: 13
};
	  

var map = new L.map('map', mapOptions);
var layer = new L.TileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
							maxZoom: 20,
							subdomains: ['mt0','mt1','mt2','mt3']
							});
map.addLayer(layer);

			var defaultIcon = L.icon({
			iconUrl: '../images/marker-icon-2x.png',
			iconSize: [23, 33],});


	
	// render data tu database atm
var atmLocations = <?php echo $jsonData ?>;

	atmLocations.forEach(function(atmlocation) {
	var marL = new L.LatLng(atmlocation.viDo, atmlocation.kinhDo);
    var marker = L.marker(marL, {title: atmlocation.tencay, icon: defaultIcon}).addTo(map);
    marker.bindPopup(atmlocation.tenCay);
});

var atmLocationsNganHang = <?php echo $jsonNganHang ?>;

	atmLocationsNganHang.forEach(function(atmlocation) {
	var marL = new L.LatLng(atmlocation.viDo, atmlocation.kinhDo);
    var marker = L.marker(marL, {title: atmlocation.tenNH, icon: defaultIcon}).addTo(map);
    marker.bindPopup(atmlocation.tenNH);
});

var atmLocationsPhongGiaoDich = <?php echo $jsonPhongGiaoDich ?>;

	atmLocationsPhongGiaoDich.forEach(function(atmlocation) {
	var marL = new L.LatLng(atmlocation.viDo, atmlocation.kinhDo);
    var marker = L.marker(marL, {title: atmlocation.tenPhong, icon: defaultIcon}).addTo(map);
    marker.bindPopup(atmlocation.tenPhong);
});
	
	
	
	
// hien vi tri cua ban
if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function(position){

	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
	var markerLocation = new L.LatLng(latitude, longitude);
	var marker =  L.marker(markerLocation,{icon: defaultIcon}).addTo(map);
	marker.bindPopup("Bạn đang ở đây").openPopup();
	});
}

// them dia diem
var btnadd = document.querySelector('#addbtn');
	btnadd.onclick= function() {
		console.log(toast);
		toast.style.opacity = 1;
	  }
//search https://youtu.be/rEa_S_HiKxs
	</script>
	
	<script src="./main.js" ></script>
	  
<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="./data/point.js"></script>
<script src="./data/line.js"></script>
<script src="./data/polygon.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
  method: "GET", 
  responseType: "application/json", 
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
	</script>

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
        <p>"<strong>Can Tho University</strong> <br> Welcome to my map by Hong Ngan!"</p>
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



</body>
</html>