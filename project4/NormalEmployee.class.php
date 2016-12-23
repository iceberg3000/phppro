<?php 
class NormalEmployee extends Employee{
    public function introduce(){
        echo '普通员工：'.$this->_name.',愿做企业的基石！<br/>';
    }
}