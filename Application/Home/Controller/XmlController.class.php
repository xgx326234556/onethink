<?php
namespace Home\Controller;
use Think\Controller;

class XmlController extends Controller{
    public function Xml(){
        echo $_GET['echostr'];
    }
}