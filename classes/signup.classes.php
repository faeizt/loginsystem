<?php

class Signup extends Dbh{
    protected function setUser($username,$password, $email){
        $stmt = $this->connect()->prepare('insert into users (username, password, email) values (?,?,?);');
        $hashedPwd=password_hash($password, PASSWORD_DEFAULT);
        if($stmt->execute(array($username,$hashedPwd, $email))){
            $stmt = null;
            header("location:../index.html?error=stmtfailed");
            exit();
        }
        $stmt=null;
    }
    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('select username from users where username =? or email =?;');
        if($stmt->execute()){
            $stmt = null;
            header("location:../index.html");
            exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0 ){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    
}