<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'qlatm';  
    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");

    $qr_nh = 'SELECT * FROM nganhang';	
    $query_exe = mysqli_query($conn, $qr_nh);
?>
                           
<html>
    <head>
        <title>HỆ THỐNG QUẢN LÍ ATM</title>
        <link rel="stylesheet" href="main_admin.css" type=""> 
        <link rel="shortcut icon" href="favicon.ico" type=""/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <div id="pageWrapper">
          
            <div id="nav">           
            </div>         
            <div id="contentWrapper">
                <div id="mainContent">
                    <div class="group-box">
                        <div class="title"> <b>THỐNG KÊ ATM</b> </div>
                            <div class="lop">  
                                <form action="./statistical_at.php">
                                <span  style="margin-left: 30%; font-weight: bold;" class="details">NGÂN HÀNG</span>
                                <select style="margin-left: 5%;" class="list" name="maNH">
                                <option value="">Chọn ngân hàng</option>
                                    <?php while($row = mysqli_fetch_array($query_exe)) {
                                            $tenNH=$row['tenNH']; 
                                        ?>
                                        <option  value="<?= $row['maNH'] ?>"><?= $row['tenNH'] ?></option>
                                    <?php } ?>  
                                </select>
                                    <button  class="btn" onclick=""  type="submit">LIỆT KÊ</button>                            
                                </form>
                            </div>                      
                    </div>
                </div>
               
            </div>
           
        </div>
    </body>
</html>