<?php
class Employee{
    public $name;
    public $age;
    public function introduce(){
        echo '大家好，我叫'.$this->name.',今年'.$this->age.'岁!<br/>';
    }
}