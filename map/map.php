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
<link rel="stylesheet" href="./Style.css">
<head>

<title>ATM-MAP</title>

</head>

<body>
    <div id ="main-menu" class="menu_list">
        <div class="header-list">
            <h1 class="map_name">ATM_Map</h1>
            <div class="btn_close" onclick = "clickBtnClose()"><i class="fa fa-close"></i></div>
        </div>

        <div class="items">
            <ul class="item-list">
                <li class="item"><i class="fa fa-bookmark" style="font-size:25px"></i> <p>  Đã lưu</p></li>
                <li class="item"><i class='fas fa-user-check' style='font-size:20px'></i> <p>Đã được chia sẽ</p></li>
                <li class="item"><i class='fas fa-wheelchair' style='font-size:24px'></i> <p>Đường đi</p></li>
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
	</div>
	<script src="./main.js" ></script>
</body>
</html>