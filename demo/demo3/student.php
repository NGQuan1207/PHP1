<?php

class student {
    public $name;
    public $id;
    public $major;

    function __construct($name, $id, $major) {
        $this->name = $name;
        $this->id = $id;
        $this->major = $major;
    }

    function getinfo() {
        return "Xin chào: ".$this->name." Chuyên ngành bạn học là: ".$this->major;
    }
}

?>