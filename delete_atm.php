<?php
session_start();
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'qlatm';  
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
$maCay = $_GET['maCay'];
$sql = "DELETE FROM cayatm where maCay = '$maCay'";
if (mysqli_query($conn,$sql)) {
   
            '<script>
            alert("Xóa thành công!");
            window.location.assign("../map.php");
            </script>'

    ;
}
else{

        '<script>
        alert("Xóa thất bại!");
        window.location.assign("../map.php");
        </script>'
  ;
}