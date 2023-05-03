<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="login-form" action="login.php" method="POST">
          <input type="Ten" name="Ten" placeholder="Tên đăng nhập"/>
          <input type="matkhau" name="matkhau" placeholder="Mật khẩu"/>
          <button class="submit" name="submit">Đăng nhập</button>
        </form>
      </div>
    </div>
  </body>
 
</html>
 <?php 
    require_once('../../connect/connect.php');

    if (isset($_POST['submit'])) {
      $Ten = $_POST['Ten'];
      $matkhau = $_POST['matkhau'];
      $sql =  "SELECT * FROM `taikhoan` WHERE ten = '$Ten' and matkhau = '$matkhau'";
      $query = mysqli_query($conn, $sql);
      $checkdn = mysqli_num_rows($query);
      if ($checkdn == 1) {
        if ($checkmk = $matkhau) {
          $nguoidung = mysqli_fetch_array($query);
          $_SESSION['taikhoan'] = $nguoidung;
          echo '<script>alert("ĐĂNG NHẬP TÀI KHOẢN THÀNH CÔNG");</script>';
          echo header('location: ../map.php');
        } else{
          $err['matkhau'] = 'Bạn Chưa Nhập Mật khẩu không đúng';
        }
      } else {
        $err['Ten'] = 'Tài khoản không tồn tại';
        $err['matkhau'] = 'Bạn Chưa Nhập Mật khẩu không đúng';
      }
    }
 ?>