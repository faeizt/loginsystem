<?php

class SignupContr extends Signup{
    private $username;
    private $password;
    private $passwordrepeat;
    private $email;

    public function __construct($username, $password, $passwordrepeat,$email)  {
        $this->username=$username;
        $this->password=$password;
        $this->passwordrepeat=$passwordrepeat;
        $this->email=$email;

    }
    public function signupUser(){
        if ($this->emptyInput() == false){
            header("location: ../index.html?error=emptyinput");
            exit();
        }
        if ($this->invalidUsername() == false){
            header("location: ../index.html?error=username");
            exit();
        }     
        if ($this->invalidEmail() == false){
            header("location: ../index.html?error=email");
            exit();
        }       
        if ($this->pwdmatched() == false){
            header("location: ../index.html?error=passwordmatch");
            exit();
        }               
        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->password || empty($this->passwordrepeat) || empty($this->email))){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidUsername(){

    }
    private function invalidEmail(){
        
    }
    private function pwdmatched(){
        
    }
    protected function checkUser(){
        $result;
        if ($this->checkUser($this->username, $this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}