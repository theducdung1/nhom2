
        <?php 
            session_start();
            if(isset($_SESSION['username'], $_SESSION['password'])){
                require 'chat.php';
                $chat = new Chat();
                $chat->luu();
                $chat->in();
            }else{
                echo "<a href='dangnhapview.php?chat=1'>Bạn phải đăng nhập</a>";
            }
        ?>
        