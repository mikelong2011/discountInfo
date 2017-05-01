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
        <title>商品录入</title>
        <style rel="stylesheet">
        </style>

    </head>
    <body>
        <div class="wrap">     
            <div class="panel panel-info">
                <div class="panel-heading">商品列表</div>
                <div class="space"></div>
                <div class="panel-body">
                    <?php if($_SESSION['member_id']) { ?>
                        <div class="space text-left">
                        <a href="/discount/index.php/home/goods/addgoods" class="btn btn-primary" style="margin-left:10px">发布商品</a>
                        </div>
                    <?php } ?>
                    <div class="list">
                    <?php if(is_array($goods_list)): foreach($goods_list as $key=>$vo): ?><div class="row list-item">
                            <div class="col-xs-4">
                                <img src="<?php echo C("HOME_PATH") ?>/public/uploads/" class="shop-image" />
                            </div>
                            <div class="col-xs-8">
                                <div class="title"><?php echo ($vo['goods_name']); ?></div>
                                <div class="desc" style="color:#505"><?php echo ($vo['specific']); ?></div>
                                <div class="desc"><?php echo ($vo['desc']); ?></div>
                                <div class="address">
                                    <span class="price">￥<?php echo ($vo['price']); ?></span>
                                    <span class="old_price"> ￥<?php echo ($vo['old_price']); ?></span>
                                 </div>
                                <a href="/discount/index.php/home/shop/shop_map/shop_id/<?php echo ($vo['id']); ?>">
                                </a>
                            </div>
                        </div><?php endforeach; endif; ?>
                    </div>
                </div>
            </div> 
            <div class="space"></div>
            <div class="footer">
                <?php require "/public/inc/app_footer.html"; ?> 
            </div>
        </div>
    </body>
</html>