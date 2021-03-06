<?php defined('THINK_PATH')  or die("不能直接访问文件!"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/bootstrap.min.css" />
        <script src="<?php echo C('HOME_PATH') ?>/public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/public/script/bootstrap.min.js"></script>   
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/index.css" />                     
        <title>门店管理</title>


    </head>
    <body>
        <div class="wrap">
            <?php require "/public/inc/app_header.html"; ?>
            <div class="space"></div>
            <div class="panel panel-info">

                <div class="panel-heading row">
                    我的门店
                </div>

                <div class="panel-body">
                    <div class="row space">
                        <div class="col-xs-4">
                            <a class="btn btn-sm btn-primary" href="__URL__/add_shop">新门店注册</a>
                        </div>  
                    </div> 
                    <div class="list">                 
                    <volist name="shop_list" id="vo">
                        <div class="list-item">
                             <div class="row">
                                 <div class="col-xs-4">
                                     <img src="<?php echo C("HOME_PATH") ?>/public/uploads/shop_photo/{$vo['id']}/{$vo['image']}" class="shop-image" />
                                 </div>
                                 <div class="col-xs-8">
                                     <div class="title">
                                         <span>{$vo['shop_name']}</span>
                                         <a href="__URL__/shop_update/shop_id/{$vo['id']}">
                                             <span class="glyphicon glyphicon-edit"></span>
                                         </a>
                                    </div>
                                     <div class="desc">{$vo['desc']}</div>
                                     <div class="tel">成交/好评:{$vo['recommend']}/{$vo['recommend']}</div>
                                     <div class="tel">电话:{$vo['tel']}</div>
                                     <div class="tel">状态:<?php echo ($vo['status'])?'正常经营':'未审核' ?></div>
                                     <a href="__APP__/home/shop/shop_map/shop_id/{$vo['id']}">
                                        <div class="address">
                                            地址:{$vo['address']}
                                            <span class="glyphicon glyphicon-map-marker" ></span>
                                        </div>
                                     </a>
                                 </div>
                             </div>
                             
                             <div class="shop-detail">
                                 更多图片等……
                                 {$vo['desc']}
                             </div>
                         </div>
                    </volist>
                    </div>
 
                </div>

            </div>
            <div class="space"></div>
            <div class="footer">
                <?php include '/public/inc/app_footer.html'; ?>
            </div>
        </div>
    </body>
</htm