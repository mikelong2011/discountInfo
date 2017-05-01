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
        <title>会员登录</title>


    </head>
    <body>
    <div class="wrap">
        <?php require "/public/inc/app_header.html"; ?>  
        <div style="height:50px"></div>    

        <div class="panel panel-default">
            <div class="panel-body">
                <form action="__APP__/home/member/login" method="post">
                    <div class="input-group">
                        <span class="input-group-addon">会员名称</span>
                        <input type="text" name="name" required="required"  maxlength="20" class="form-control" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">登录密码</span>
                        <input type="password" name="password"　required="required"  maxlength="20" class="form-control" />
                    </div>
                    <div class="space"></div>
                    <input class="form-control btn btn-primary" type="submit" value="登录" />
                    <div class="space"></div>
                    <a href="__APP__/home/member/regist" >我要注册会员</a>
                </form>
            </div>
        </div>


        <div class="footer">
            <?php require "/public/inc/app_footer.html"; ?> 
        </div>
    </div>

        
    </body>
</html>