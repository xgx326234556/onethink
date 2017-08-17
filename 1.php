<?php
require "Log.php";
if($_GET['echostr']){
    echo $_GET['echostr'];
}else{
    $xml=file_get_contents("php://input");
    //file_put_contents('wchat.log',$xml);
    Log::write('wchat.log',$xml);
    //解析获取到的数据
    $simpleXml=simplexml_load_string($xml);
    $request = [];
    foreach ($simpleXml as $name=>$value){
        $request[$name] = (string)$value;
    }
    //回复消息
    //解析天气
    $weatherXml=simplexml_load_file('http://flash.weather.com.cn/wmaps/xml/sichuan.xml');
    $weather=[];
    foreach ($weatherXml as $name=>$value){
        $weather[(string)$value['cityname']] = (string)$value['stateDetailed'];
    }
    $content = '';
    if(isset($weather[$request['Content']])){
        $content .= $weather[$request['Content']];
    }else{
        $content .= "不知道你在说什么！";
    }
   require 'message_text.xml';
}
