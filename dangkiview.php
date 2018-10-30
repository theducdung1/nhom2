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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dung.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="css/dung.js"></script>
    </head>
    <body>
                                                    <?php
                                                        require 'dangki.php';
                                                        if(isset($_POST['kiemtra'])){
                                                            $dangki = new DangKi();
                                                            if($dangki->luu()){
                                                                echo "<button class='btn btn-success'>Bạn đã đăng kí thành công</button>";
                                                            }else{
                                                                echo "<a href='dangkiview.php' class='btn btn-danger'>Đăng kí thất bại</a>";
                                                            }
                                                        }else{
                                                    ?>
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="dangkiform" method="post">
                                                      <fieldset>
                                                        
                                                        <legend style="text-align: center;">Đăng kí</legend>
            
                                                        <span style="color: red; float: right;">*Phải nhập thông tin</span>
                                                        <div class="clear"></div>
                                                        <div class="input_div">
                                                            <span class="glyphicon glyphicon-user"></span>
                                                            <input type="text" name="acc" placeholder="Tên tài khoản" id="acc" >
                                                            <div id="acc_error" class="val_error"></div>
                                                            <span class="star" style="color: red;">*</span>
                                                        </div>
                                                        <div class="input_div">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                            <input type="text" name="email" placeholder="nhập email" id="email">
                                                            <div id="email_error" class="val_error"></div>
                                                            <span class="star" style="color: red;">*</span>
                                                        </div>
                                                        <div class="input_div">
                                                            <span class="glyphicon glyphicon-envelope"></span>
                                                            <input type="text" name="reemail" placeholder="nhập lại email" id="reemail">
                                                            <div id="reemail_error" class="val_error"></div>
                                                            <span class="star" style="color: red;">*</span>
                                                        </div>
                                                        <div class="input_div">
                                                            <span class="glyphicon glyphicon-lock"></span>
                                                            <input type="password" name="pass" placeholder="mật khẩu" id="pass">
                                                            <div id="pass_error" class="val_error"></div>
                                                            <span class="star" style="color: red;">*</span>
                                                        </div>
                                                        <div class="input_div">
                                                            <span class="glyphicon glyphicon-lock"></span>    
                                                            <input type="password" name="repass" placeholder="nhập lại mật khẩu" id="repass">
                                                            <div id="repass_error" class="val_error"></div>
                                                            <span class="star" style="color: red;">*</span>
                                                        </div>
                                                        <div>
                                                            Giới tính:<span style="color: red;">* </span>
                                                            <input type="radio" name="gender" value="female" checked> Nữ
                                                            <input type="radio" name="gender" value="male"> Nam
                                                            <input type="radio" name="gender" value="other"> Khác
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12" style="text-align: center;">
                                                                <input type="hidden" name="kiemtra" value="1">
                                                                <input type="button" value="Đăng kí" class="btn btn-info" style="width: 50%; margin: 10px 0px;" onclick="validate()" name="submitbutton">                                                                
                                                            </div>                                                        
                                                            <div class="col-md-12" style="text-align: center;">
                                                                <a href="#" style="text-decoration: none; color: #333;">Bạn đã có tài khoản? Đăng nhập ngay.</a>
                                                            </div>
                                                        </div>
                                                      </fieldset>
                                                    </form>
                                                        <?php }?>
    </body>
</html>
