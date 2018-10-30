<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dangnhap
 *
 * @author MyPC
 */
require './database.php';
class DangNhap {
    //put your code here
    public function kiemtra(){
        $conn = Database::connect();
        $sql = "SELECT username, password, ID FROM accounts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $username = Database::test_input($_POST['acc']);
        $password = Database::test_input($_POST['pass']);
        foreach ($stmt->fetchAll() as $k => $v){
            if(($username == $v['username'])&&($password == $v['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['userId'] = $v['ID'];
            }
        }
        if(isset($_SESSION['username'], $_SESSION['password'])){
            return true;
        }else {
            return false;
        }
    }
}
