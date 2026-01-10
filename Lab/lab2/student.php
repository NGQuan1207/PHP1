<?php

class student{
    // thuộc tính
    public $name;
    protected $email;
    private $phone;

    //phương thức
    public function setName($value){
        $this ->name = $value;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setEmail($value){
        $this->email = $value;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setPhone($value){
        $this->phone = $value;
    }
    
    public function getPhone(){
        return $this->phone;
    }
}

?>