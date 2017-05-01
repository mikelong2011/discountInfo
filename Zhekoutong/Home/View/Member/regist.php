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
        <title>会员注册</title>
    </head>
    <body>
    <div class="wrap">
        <?php require "/public/inc/app_header.html"; ?>  
        <div style="height:50px"></div> 
    <div class="panel panel-info">
        <div class="panel-heading">会员注册</div>

        <div class="panel-body">
            <form method="post" action="__URL__/regist" >
                <div class="input-group">
                    <span class="input-group-addon"  >登录名称:</span>
                    <input type="text" name="name" maxlength="20" class="form-control" required="required" placeholder="就是帐号了" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon" >输入密码:</span>
                    <input type="password" name="password1"　 maxlength="20" class="form-control" required="required" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"  >确认密码:</span>
                    <input type="password" name="password2"    maxlength="20" class="form-control" required="required" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon">验证码:</span>
                    <input type="text" name="vcode"  maxlength="4" class="form-control" required="required" placeholder="不输不行..." />
                </div>
                <div>
                     <img id="vcode" src="<?php echo C('HOME_PATH').'/public/create_code.php' ?>" alt="就要换一张" style="cursor: pointer;border:1px solid #888;border-radius: 5px;box-shadow: 5px 5px 5px " onclick="create_code()"/>
                </div>
                <div class="space"></div>
                <input class="btn btn-primary form-control" type="submit" value="确定注册" onclick="return checkForm1()" />
            </form>
        </div>
        </div>

        <div class="footer">
            <?php require "/public/inc/app_footer.html"; ?> 
        </div>        
    </div>

    <script>
    
    // var checkForm = function(){
    //     var ok =1;
    //     var inputList = document.getElementsByTagName("input");
    //     for(let i=0;i<inputList.length;i++){
    //         if(inputList[i].type=='text' && inputList[i].value==''){
    //             ok=0;
    //             break;
    //         }
    //     }
    //     if(ok==0){
    //         alert("请填写完整……");
    //         return false;
    //     }
    //     return true;
    // }
    function create_code(){
        document.getElementById('vcode').src = "<?php echo C('HOME_PATH').'/public/create_code.php' ?>?"+Math.random()*100;
    }
    </script>

    </body>
</html>