<?php
class Employee{
    private $_name;
    private $_age;
    public function introduce(){
        echo '大家好，我叫'.$this->name.',今年'.$this->age.'岁!<br/>';
    }
    // public function __construct($name,$age){
    //     $this->name = $name;
    //     $this->age = $age;
    // }


    public function __set($n,$v){
        $this->$n = $v;
    }

    public function __get($n){
        if(isset($this->$n)){
            return $this->$n;
        }else{
            return NULL;
        }
    }

    //当调用一个不存在或不可访问的类属性和方法时，程序会自动调用重载方法
    public function __call($f_name,$f_args){
        list($name,$sales) = $f_args;
        $this-$f_name($name,$sales);
    }
}