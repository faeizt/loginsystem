<?php

class Login extends Dbh{

    protected function getUser($username,$password){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username =?;');
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location:../index.html?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
           $stmt=null;
           header("location: ../index.html?error=usernotfoudn");     
           exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]["password"]);
        $stmt=null;

        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.html?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true){
            $stmt = $this-connect()->prepare('select * from users where username= ? and password = ?');
            if($stmt->execute(array($username, $password))){
                $stmt = null;
                header("location: ../index.html?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt=null;
                header("location: ../index.html?error=usernotfoudn");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);        
            session_start();
            $_SESSION['username'] = $row['username'];
        }
        $stmt=null;
    }
    
}