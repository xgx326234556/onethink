<?php
if($_GET['echostr']){
    echo $_GET['echostr'];
}else{
    $xml=file_get_contents("php://input");
    file_put_contents('wchat.log',$xml);
}
