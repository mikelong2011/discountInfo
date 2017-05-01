<?php if (!defined('THINK_PATH')) exit(); defined('THINK_PATH') or die("不能直接访问文件!"); ?>
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
                            <a class="btn btn-sm btn-primary" href="/tp3/index.php/Admin/Shop/add_shop">新门店注册</a>
                        </div>  
                    </div> 
                    <div class="list">                 
                    <?php if(is_array($shop_list)): $i = 0; $__LIST__ = $shop_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-item">
                             <div class="row">
                                 <div class="col-xs-4">
                                     <img src="<?php echo C("HOME_PATH") ?>/public/uploads/shop_photo/<?php echo ($vo['id']); ?>/<?php echo ($vo['image']); ?>" class="shop-image" />
                                 </div>
                                 <div class="col-xs-8">
                                     <div class="title">
                                         <span><?php echo ($vo['shop_name']); ?></span>
                                         <a href="/tp3/index.php/Admin/Shop/shop_update/shop_id/<?php echo ($vo['id']); ?>">
                                             <span class="glyphicon glyphicon-edit"></span>
                                         </a>
                                    </div>
                                     <div class="desc"><?php echo ($vo['desc']); ?></div>
                                     <div class="tel">成交/好评:<?php echo ($vo['recommend']); ?>/<?php echo ($vo['recommend']); ?></div>
                                     <div class="tel">电话:<?php echo ($vo['tel']); ?></div>
                                     <div class="tel">状态:<?php echo ($vo['status'])?'正常经营':'未审核' ?></div>
                                     <a href="/tp3/index.php/home/shop/shop_map/shop_id/<?php echo ($vo['id']); ?>">
                                        <div class="address">
                                            地址:<?php echo ($vo['address']); ?>
                                            <span class="glyphicon glyphicon-map-marker" ></span>
                                        </div>
                                     </a>
                                 </div>
                             </div>
                             
                             <div class="shop-detail">
                                 更多图片等……
                                 <?php echo ($vo['desc']); ?>
                             </div>
                         </div><?php endforeach; endif; else: echo "" ;endif; ?>
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