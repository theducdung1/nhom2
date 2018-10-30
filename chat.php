<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script>
    
</script>
<?php
    require "database.php";
    class Chat{
        public function luu(){
            if(isset($_POST['content'])){
            $id = 1;
            $conn = Database::connect();
            $sql = "INSERT INTO chats (message, usernameID) VALUES (:message, :usernameID)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':usernameID', $usernameID);
            $message = Database::test_input($_POST['content']);
            $usernameID = Database::test_input($_SESSION['userId']);
            $stmt->execute();    
            }
        }
        public function in(){
            $conn = Database::connect();
            $sql = "SELECT accounts.username, chats.message, chats.createat FROM accounts INNER JOIN chats on accounts.ID = chats.usernameID ORDER BY createat ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $k => $v){
                echo "<div class='noidung'>";
                echo $v['username'].": ".$v['message']."<br>";
                echo "</div>";
                echo "<div class='thoigian'>";
                echo $v['createat'];
                echo "</div>";
                echo "<br>";
            }            
        }
    }
?>