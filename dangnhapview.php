<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
                                                    <?php
                                                        require 'dangnhap.php';
                                                        if((!isset($_SESSION['username']))&&(!isset($_SESSION['password']))){
                                                            if(isset($_POST['nutdangnhap'])){
                                                                $dangnhap = new DangNhap();
                                                                if($dangnhap->kiemtra()){
                                                                    if(isset($_GET['chat'])){
                                                                        header("location: chatview.php");
                                                                    }else{
                                                                        echo "<button class='btn btn-success'>chào ".$_SESSION['username']."</button>";
                                                                        echo "<a href='dangxuat.php'>Đăng xuất</a>";
                                                                    }
                                                                }else{
                                                                    if(isset($_GET['chat']))
                                                                        echo "<a href='dangnhapview.php?chat=1' class='btn btn-danger'>Đăng nhập thất bại</a>";
                                                                    else
                                                                        echo "<a href='dangnhapview.php' class='btn btn-danger'>Đăng nhập thất bại</a>";
                                                                }
                                                            }else{
                                                        ?>        
                                                        <form action="
                                                        <?php 
                                                        if(isset($_GET['chat'])){
                                                            echo htmlspecialchars($_SERVER["PHP_SELF"])."?chat=1";
                                                        }else{
                                                            echo htmlspecialchars($_SERVER["PHP_SELF"]);
                                                        }
                                                        ?>" method="POST">
                                                          <fieldset>
                                                            <legend style="text-align: center;">Đăng nhập</legend>
                                                            Tên tài khoản:<span style="color: red;">*</span>
                                                            <span style="color: red; float: right;">*Phải nhập thông tin</span> <br>
                                                            <input type="text" name="acc" placeholder="tài khoản" style="width: 100%;">
                                                            <br>
                                                            Mật khẩu:<span style="color: red;">*</span><br>
                                                            <input type="password" name="pass" placeholder="mật khẩu" style="width: 100%;">
                                                            <br>
                                                            <div style="">
                                                                <a href="#">Quên mật khẩu</a><br>
                                                                <input type="submit" value="Đăng nhập" class="btn btn-info" style="" name="nutdangnhap">
                                                                <input type="submit" value="Đăng kí" class="btn btn-default">
                                                            </div>
                                                          </fieldset>
                                                        </form>
                                                    <?php 
                                                            }
                                                        }else{
                                                            echo "<a href='#'>Bạn đã đăng nhập</a>";
                                                            echo "<a href='dangxuat.php'>Đăng xuất</a>";
                                                        }
                                                    ?>
    </body>
</html>