<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dangki
 *
 * @author MyPC
 */
require 'database.php';
class DangKi {
    //put your code here
    public function luu(){
        $conn = Database::connect();
        $sql = "INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $username = Database::test_input($_POST['acc']);
        $password = Database::test_input($_POST['pass']);
        $email = Database::test_input($_POST['email']);
        return $stmt->execute();
    }
}
