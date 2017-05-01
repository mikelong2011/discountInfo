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
        <title>会员中心</title>
        <style>
            .bar{
                height:50px;
                line-height: 50px;
                border-top:1px solid #ccc;
                border-bottom:1px solid #ccc;
                margin-top:-1px;
            }
        </style>

    </head>
    <body>
    <div class="wrap">
        <?php require "/public/inc/app_header.html"; ?>  
        <div style="height:50px"></div>    

        <div class="panel panel-info">
            <div class="panel-heading">会员中心首页</div>
            <div class="panel-body" >
                <div class="row" style="margin: 10px">
                    <form id="photo_form" action="/discountinfo/index.php/Home/Member/upload_photo" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <img id="photo" src="<?php echo C("HOME_PATH")?>/public/uploads/member_photo/<?php echo $_SESSION['member_id'].'/'.$member['image']; ?>" style="height:100px;width:100px" />
                            <input id="photo_upload" type="file" name="photo_upload" style="display: none" />
                        </div>
                    </form>
                    <div class="col-xs-6" >
                        <div class="text-left" style="font-size:28px">
                            <?php echo ($member['name']); ?>
                        </div>
                        <div class="text-left">
                            <?php echo ($member['nic_name']); ?>
                        </div>
                        <div class="text-left">
                            <?php echo ($member['desc']); ?>
                        </div>                        
                    </div>
                </div>
                
                
                
                <div class="row bar">
                    <div class="col-xs-10" style="text-align: left;text-indent: 10px;">完善资料</div>
                    <a href="/discountinfo/index.php/Home/Member/member_update">
                        <div class="col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>
                    </a>
                </div>
                <div class="row bar">
                    <div class="col-xs-10" style="text-align: left;text-indent: 10px;">我的品牌</div>
                    <a href="/discountinfo/index.php/admin/brand/index/member/<?php echo $_SESSION['member_id'] ?>">
                        <div class="col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>
                    </a>
                </div>                
                <div class="row bar">
                    <div class="col-xs-10" style="text-align: left;text-indent: 10px;">我的门店</div>
                    <a href="/discountinfo/index.php/admin/shop/index/member/<?php echo $_SESSION['member_id'] ?>">
                        <div class="col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>
                    </a>
                </div>

                <div class="row bar">
                    <div class="col-xs-10" style="text-align: left;text-indent: 10px;">我的商品</div>
                    <a href="/discountinfo/index.php/home/goods/index/member/<?php echo $_SESSION['member_id'] ?>">
                        <div class="col-xs-2">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </div>
                    </a>
                </div>                
                <p class="space_sm"></p>
                <div class="input_bar">
                    <button id="logout"  class="form-control btn btn-danger">退出登录</button>
                </div>
            </div>
        </div>


        <div class="footer">
            <?php include '/public/inc/app_footer.html'; ?>
        </div>                   
    </div>


    <script>
        $(function(){
            $("#logout").click(function(){
                if(confirm("确定要退出登录吗？")){
                    location.href="/discountinfo/index.php/Home/Member/logout";
                }
            });

           $("#photo").click(function(){
               $("#photo_upload").trigger("click");
           });
           $("#photo_upload").change(function(){
               //alert($(this).val());
               $("#photo_form").submit();
           });
        })
    </script>


    </body>
</html