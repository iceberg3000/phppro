<?php
class ManageEmployee extends Employee{
    public function introduce(){
        echo '管理层员工：'.$this->_name.',愿做企业的桥梁！<br/>';
    }
}