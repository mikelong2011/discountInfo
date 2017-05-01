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
                            <a class="btn btn-sm btn-primary" href="__URL__/addbrand">品牌新增</a>
                        </div>
                    </div>
                    
                    <ul class="list-group">
                        <volist name="brand_list" id="vo">
                            <li class="list-group-item">
                                <span>{$vo['brand_name']}  《{$vo.type_name}》</span>
                                <!--<a style="float:right" href="__URL__/set_recommend/id/{$vo.id}/recommend/{$vo.recommend}">
                            {$vo['recommend'] ? '取消推荐' : '推荐'}</a>-->
                            </li>
                        </volist>
                    </ul>
                </div>

            </div>

        </div>
    </body>
</htm