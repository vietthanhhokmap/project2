<?php
$servername = "localhost";
$username = "root";
$Password = "";
$database = "customer1";
$conn = new mysqli($servername, $username, $Password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <style type="text/css"></style>
    
</head>
<body>
            <div class="login-p">
                <form action="login.php" method="get">
                    <div class="login-margin">
                        <div class="css-php">
                            <?php
                                if (isset($_GET['DangNhap'])) {
                                    $Name = $_GET['Name'];            
                                    $Password = $_GET['password'];
                                    session_start();
                                
                                    $sql = "SELECT * FROM information WHERE Name = '$Name'";
                                    $query = mysqli_query($conn,$sql);
                                    $data = mysqli_fetch_assoc($query);
                                    $checkName = mysqli_num_rows($query);
                                    $Passwordmd5 = md5($Password);
                                
                                    if ($checkName > 0 ) {                                     
                                        if ($Passwordmd5 !=  $data['Password']) {
                                            echo "<p style= 'color:red; text-align:center;'>  mật khẩu không tồn tại </p>";
                                        } else {
                                            $_SESSION['information'] = $data;
                                            header('location: user.php');
                                        }
                                    } 
                                    else if ($Name == "root" and $Password == "123") {
                                        header('location: themsanpham.php');
                                    }
                                    else {
                                        echo "<p style= 'color:red; text-align:center;'>  tên không tồn tại </p>";
                                    }
                                }

                            ?>
                        </div>
                        <div class="TK sub-login">
                            <h3 class="chu">ĐĂNG NHẬP</h3>
                            <td  class="login-sub"><span>Tài Khoản</span></td>
                            <td class="login-sub input-sub"><input type="text" name="Name" required="required"  ></td>
                        </div>

                        <div class="MK sub-login" >
                            <td class="login-sub"><span>Mật Khẩu</span></td>
                            <td class="login-sub input-sub"><input type="password" name="password" required="required"  ></td>
                        </div>

                        
                        <div class="submit sub-login">
                            <input type="submit" class="submit-login" value="Đăng Nhập" name="DangNhap">                              
                        </div>

                    </div>    
                </form>    
                
                <a class="submit sub-login" href="dangki.php">
                        <input type="submit" class="submit-login" value="Đăng Kí" name="DangKi">
                </a>
            </div>
        
        

                
        
</div>
    
</body>
</html>