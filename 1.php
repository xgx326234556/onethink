<?php
if($_GET['echostr']){
    echo $_GET['echostr'];
}else{
    $xml=file_get_contents("php://input");
    file_put_contents('wchat.log',$xml);
    $simpleXml=simplexml_load_string($xml);
    $request = [];
    foreach ($simpleXml as $name=>$value){
        $request[$name] = (string)$value;
    }
   require 'message_text.xml';
}
