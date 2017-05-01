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
        <title>门店维护</title>
        <style rel="stylesheet">

       </style>

    </head>
    <body>
        <div class="wrap">
            <?php require "/public/inc/app_header.html"; ?>       
            <div style="height:50px"></div>

            <div id="shop_update">
                <form action="__URL__/shop_update" method="post">
                    <div class="panel panel-info">
                        <div class="panel-heading">门店维护</div>
                        <div class="panel-body">
                            <input type="hidden" name="shop_id" value="{$shop_info[0]['id']}" />
                            <div class="input-group">
                                <span class="input-group-addon">门店名称</span>
                                <input type="text" name="shop_name" class="form-control"  value="{$shop_info[0]['shop_name']}" required="required" />
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">门店说明</span>
                                <input type="text" name="desc" class="form-control" value="{$shop_info[0]['desc']}" required="required" />
                            </div>                    
                            <div class="input-group">
                                <span class="input-group-addon">门店地址</span>
                                <input type="text" name="address" class="form-control" value="{$shop_info[0]['address']}" required="required" />
                            </div>
                     
                            <div class="input-group" >
                                <span class="input-group-addon">联系手机</span>
                                <input type="text" name="tel" class="form-control" value="{$shop_info[0]['tel']}" required="required" />
                            </div>
                            <div class="input-group" >
                                <span class="input-group-addon">门店坐标</span>
                                <input type="text" name="lnglat" class="form-control" value="{$shop_info[0]['lng']},{$shop_info[0]['lat']}" required="required" />
                            </div>  

                            <div class="space_sm">
                                <a href="http://lbs.amap.com/console/show/picker">
                                    高德地图坐标拾取器，取得门店坐标
                                </a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">验证密码</span>
                                <input type="text" name="vcode"  maxlength="4" class="form-control" required="required" />
                                <span class="input-group-addon">
                                    <img id="vcode"  src="<?php echo C('HOME_PATH').'/public/create_code.php' ?>" alt="就要换一张" style="cursor: pointer; " onclick="create_code()" />
                                </span>
                            </div>
                            <div class="nav_bar"></div>
                            <div class="input_bar">
                                <input type="submit" class="form-control btn btn-primary" value="确定修改" />
                            </div>
                        </div>
                    </div>
                </form>

                <div class="input_bar">
                    <button class="form-control btn btn-info" id="show_upload_image">图片管理</button>
                </div>                               
            </div>
    
            <div id="upload_image" style="display: none">
                <form method="POST" action="__URL__/upload_shop_image" enctype="multipart/form-data">                
                    <div class="panel panel-info">
                        <div class="panel-heading">图片管理</div>
                        <div class="panel-body">
                            <input type="hidden" name="shop_id" value="{$shop_info[0]['id']}" />
                            <div class="input-group" >
                                <span class="input-group-addon">照片1</span>
                                <input type="file" name='shop_image1' class="form-control" />
                            </div>       
                            <div class="input-group" >             
                                <span class="input-group-addon">照片2</span>                    
                                <input type="file" name='shop_image2' class="form-control" />
                            </div>
                            <div class="input-group" >
                                <span class="input-group-addon">照片3</span>                    
                                <input type="file" name='shop_image3' class="form-control" />
                            </div>
                            <div class="input-group" >                    
                                <span class="input-group-addon">照片4</span>                    
                                <input type="file" name='shop_image4' class="form-control" />
                            </div>
                            <div class="input-group" >                    
                                <span class="input-group-addon">照片5</span>                   
                                <input type="file" name='shop_image5' class="form-control" />
                            </div>

                            <div class="input_bar">
                                <input type="submit" class="form-control btn btn-primary" value="确定上传" />
                            </div>
                        </div>
                    </div>
                </form>
                <div class="input_bar">
                    <button id="cancel_upload"  class="form-control btn btn-info">取消</button>
                </div>   
            </div>
            <div class="footer">
                <?php include '/public/inc/app_footer.html'; ?>
            </div>
        </div>
        <script>
            $(function(){
             $("#show_upload_image").click(function(){
                 $("#upload_image").slideToggle();
                 $("#shop_update").slideToggle();
             })
             $("#cancel_upload").click(function(){
                 $("#upload_image").slideToggle();
                 $("#shop_update").slideToggle();
             })
            })
            function create_code(){
                document.getElementById('vcode').src = "<?php echo C('HOME_PATH').'/public/create_code.php' ?>?"+Math.random()*100;
            }
        </script>
    </body>
</html>