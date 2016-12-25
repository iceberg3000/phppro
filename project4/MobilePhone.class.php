<?php
class MobilePhone implements ComInterface{
    public function connect(){
        echo '连接开始...'.'<br/>';
    }
    public function transfer(){
        echo '传输数据开始...传输数据结束'.'<br/>';
    }
    public function disconnect(){
        echo '连接断开...'.'<br/>';
    }
}