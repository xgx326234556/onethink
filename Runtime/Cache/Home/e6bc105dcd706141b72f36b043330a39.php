<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="/onethink/Public/static/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/onethink/Public/static/static/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .main{margin-bottom: 60px;}
            .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
        </style>
    

</head>
<body>
<div class="main">
    <!--导航部分-->

        
            <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="fuwu.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.php?s=/Home/Guarantee/my.html" class="navbar-link">我的</a></p>
            </div>
            </div>
            </nav>
        
    
    <?php if(is_array($index)): $i = 0; $__LIST__ = $index;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Document): $mod = ($i % 2 );++$i;?><div class="row noticeList">
            <div class="col-xs-2">
                <?php $Picture=M('Picture')->where(['id'=>$Document['cover_id']])->select();?>
                <img class="noticeImg" src="./<?php echo $Picture[0]['path']?>"/>
            </div>
            <div class="col-xs-10">
                <p class="title"><a href="<?php echo U('guarantee/sort?id='.$Document['id']);?>"><?php echo ($Document["title"]); ?></a></p>
                <p class="intro"><?php echo ($Document["intro"]); ?></p>
                <p class="info">浏览: 199 <span class="pull-right"><?=date('Y-m-d',$Picture[0]['create_time'])?></span> </p>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>

    <!--导航结束-->
  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="../jquery-1.11.2.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../bootstrap/js/bootstrap.min.js"></script>
  

</body>
</html>