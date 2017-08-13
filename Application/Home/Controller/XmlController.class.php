<?php
namespace Home\Controller;
use Think\Controller;

class XmlController extends Controller{
    public function Xml(){
        $a=I('get.echostr');
        var_dump($a);
    }
}