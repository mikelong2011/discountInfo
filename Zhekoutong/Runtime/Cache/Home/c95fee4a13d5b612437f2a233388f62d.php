<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/bootstrap.min.css" />
        <script src="<?php echo C('HOME_PATH') ?>/public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/public/script/bootstrap.min.js"></script>   
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/index.css" />                     
        <title>城市 选择</title>
    </head>
    <body >
        <div class="wrap">

            <?php require "/public/inc/app_header.html"; ?>
            <div style="height: 45px"></div>
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    选择城市
                </div>
                <div class="panel-body">
                <ul class="list-group">
                    <?php if(is_array($cityList)): foreach($cityList as $key=>$vo): ?><a href="/tp3/index.php/home/area/getdist/city_id/<?php echo ($vo["id"]); ?>/city_name/<?php echo (urlencode($vo["shortname"])); ?>">
                            <li class="list-group-item"><?php echo ($vo["areaname"]); ?></li>
                        </a><?php endforeach; endif; ?>
                </ul>
                </div>                             
            </div>            

        </div>
    </body>

</html>