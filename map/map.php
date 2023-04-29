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
	$soNha = $_POST["soNha"]; 
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
	$maNH = $_POST["maNH"];   
	$tenCay = $_POST["tenCay"]; 
	$diaChi = $_POST["diaChi"]; 
	$kinhDo = $_POST["kinhDo"];
	$viDo = $_POST["viDo"];
	if ($maNH =="" ||$diaChi ==""|| $kinhDo ==""|| $viDo =="" || $diaChi ==""    ) {
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
	$maNH = $_POST["maNH"];   
	$tenPhong = $_POST["tenPhong"]; 
	$diaChi = $_POST["diaChi"]; 
	$kinhDo = $_POST["kinhDo"];
	$viDo = $_POST["viDo"];
	if ($maNH =="" ||$diaChi ==""|| $kinhDo ==""|| $viDo =="" || $diaChi ==""    ) {
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<link rel="stylesheet" href="./Style.css">
	<title>ATM-MAP2</title>
</head>
<body>
 
    <div id ="main-menu" class="menu_list">
        <div class="header-list">
            <h1 class="map_name" style="color: #4285f4;">A<span style="color: #ea4335;">T</span><span style="color: #fbbc05;">M</span> <span style="color: #fbbc05;">M</span><span style="color: #34a853;">A</span>P</h1>
            <div class="btn_close" onclick = "clickBtnClose()"><i class="fa fa-close"></i></div>
        </div>

        <div class="items">
            <ul class="item-list">
                <li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i> 
				<p>Danh Sách ATM</p>
				<i class="material-icons" id = "chevron-atm">chevron_right</i>
				<i class="material-icons" id="expand-atm">expand_more</i></li>
				<div id="list-atm" class="listChild" style="margin-top: -5px;">
					<ul class="" name="maCay">
							<?php while($rows = mysqli_fetch_array($query_exe)) {?>
								<li class="lihov" value="<?= $rows['maCay'] ?>"><?= $rows['tenCay']?><button class= "btn btn-danger"><a href="delete.php?del_CID=<?= $rows['maCay'] ?>">Xóa</a></button></li>
							<?php } ?>
							
					</ul>
				</div>
				<!-- list phong gd -->
				<li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i> 
				<p>Phòng giao dịch</p><i class="material-icons" id = "chevron-trans">chevron_right</i>
				<i class="material-icons" id="expand-trans">expand_more</i></li>
				<div id="list-trans" class="listChild" style="margin-top: -5px;">
					<ul class="" name="maPhong">
							<?php while($rows = mysqli_fetch_array($query_exe1)) {?>
								<li class="lihov" value="<?= $rows['maPhong'] ?>"><?= $rows['tenPhong'] ?><button class= "btn btn-danger"><a href="delete.php?del_MPID=<?= $rows['maPhong'] ?>">Xóa</a></button></li>
							<?php } ?>
					</ul>
				</div>
				<!-- list ngan hang -->
				<li class="item cus-item"><i class="fa fa-bookmark icon-cus" style="font-size:25px"></i>
				 <p>Ngân hàng</p><i class="material-icons" id = "chevron-bank">chevron_right</i>
				 <i class="material-icons" id="expand-bank">expand_more</i></li>
				<div id="list-bank" class="listChild" style="margin-top: -5px;">
					<ul class="" name="maNH">
							<?php while($rows = mysqli_fetch_array($query_exe2)) {?>
								<li class="lihov" value="<?= $rows['maNH'] ?>"><?= $rows['tenNH'] ?><button class= "btn btn-danger"><a href="delete.php?del_NHID=<?= $rows['maNH'] ?>">Xóa</a></button></li>
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
							<form class="addForm" id="formAddAtm" method="POST">
							<h3>Thêm ATM</h3> <br>
							<i class="material-icons" id="btnClAtmform" style="font-size:30px">close</i>
								<select name="Bankname" class="selBankname">	
									<option value="maNH">Chọn Ngân Hàng</option>
									<?php 
										$qr_nn = 'SELECT * FROM nganhang';	
										$query_exe3 = mysqli_query($conn, $qr_nn);	
										while($row3 = mysqli_fetch_array($query_exe3)){
											?> 
											<option value="<?= $row3['maNH'] ?>"><?= $row3['tenNH'] ?></option>
											<?php
										}
									?>
								</select>
								<div class="container-laInp">
									<label for="">Nhập tên</label>
									<input type="text" class="form-control" placeholder="Nhập tên Atm" name="tenCay">
									<label for="">Địa chỉ</label>
									<input type="text" class="form-control" placeholder="Nhập địa chỉ " name="diaChi">
									<label for="">Vĩ độ</label>
									<input type="text" class="form-control" placeholder="Nhập vĩ độ" name="viDo">
									<label for="">Kinh Độ</label>
									<input type="text" class="form-control" placeholder="Nhập kinh độ" name="kinhDo">
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
									<label for="">Số Nhà</label>
									<input type="text" class="form-control" placeholder="Nhập số nhà " name="soNha">
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
									<!-- <label for="">Tên Ngân Hàng</label> -->
									<select name="Bankname" class="selBankname">	
									<option value="maNH">Chọn Ngân Hàng</option>
									<?php 
										$qr_nn = 'SELECT * FROM nganhang';	
										$query_exe3 = mysqli_query($conn, $qr_nn);	
										while($row3 = mysqli_fetch_array($query_exe3)){
											?> 
											<option value="<?= $row3['tenNH'] ?>"><?= $row3['tenNH'] ?></option>
											<?php
										}
									?>
								</select>
									<label for="">Số Nhà</label>
									<input type="text" class="form-control" placeholder="Nhập số nhà " name="soNha">
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
</body>
</html>