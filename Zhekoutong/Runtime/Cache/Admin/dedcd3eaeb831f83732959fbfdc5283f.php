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
        <title>品牌管理</title>


    </head>
    <body>
        <div class="wrap">
            <?php require "/public/inc/app_header.html"; ?>
            <div class="space"></div>
            <div class="panel panel-info">

                <div class="panel-heading">
                    我的品牌
                </div>

                <div class="panel-body">
                    <div class="row space">
                        <div class="col-xs-4">
                            <a class="btn btn-sm btn-primary" href="/tp3/index.php/Admin/Brand/addbrand">品牌新增</a>
                        </div>
                    </div>
                    
                    <ul class="list-group">
                        <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">
                                <span><?php echo ($vo['brand_name']); ?>  《<?php echo ($vo["type_name"]); ?>》</span>
                                <!--<a style="float:right" href="/tp3/index.php/Admin/Brand/set_recommend/id/<?php echo ($vo["id"]); ?>/recommend/<?php echo ($vo["recommend"]); ?>">
                            <?php echo ($vo['recommend'] ? '取消推荐' : '推荐'); ?></a>-->
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>

            </div>

        </div>
    </body>
</htm