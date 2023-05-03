<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'qlatm';
$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("không thể kết nối tới database");
mysqli_query($conn, "SET NAMES 'UTF8'");
if (!empty($_GET['maNH'])) {
    $maNH = $_GET['maNH'];
    $sql_nh = "SELECT count(*) as num FROM `cayatm` WHERE maNH = $maNH";
    $query_exe = mysqli_query($conn, $sql_nh);  

}
if(isset($_GET['maNH'])){
    $maNH = $_GET['maNH'];
}
      $laybel ='';
      $y ='';
      $sql1="select * from lop where sttkhoa=$sttkhoa ";
      $result1 = mysqli_query($conn, $sql1);
      while($row1 = $result1->fetch_assoc()){
          $sttlop= $row1["sttlop"];  
          $sql2="select count(*) as num from hocvien where sttlop=$sttlop ";
          $result2 = mysqli_query($conn, $sql2);
          while($row2 = $result2->fetch_assoc() ){
              $tong_hv=$row2['num'];
              $sttkhoa = $row1["sttkhoa"];
              $matd    = $row1["matd"];
                $malop=$row1['matd'].$row1['sttlop'];
                $laybel .=  $matd.$sttlop.',';
                $y .=$tong_hv.',';
                
                               
          }
      }
  $laybel = rtrim($laybel,',');
  $y = rtrim($y,',');   




?>