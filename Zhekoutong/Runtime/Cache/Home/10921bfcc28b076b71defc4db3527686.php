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
        <title>会员资料</title>
    </head>
    <body>
    <div class="wrap">
        <?php require "/public/inc/app_header.html"; ?>  
        <div style="height:50px"></div> 
    <div class="panel panel-info">
        <div class="panel-heading">会员资料</div>

        <div class="panel-body">
            <form method="post" action="/tp3/index.php/Home/Member/member_update" >
                <div class="space_sm" style="font-size:20px">
                    <?php echo $_SESSION['member_name'] ?>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"  >你的呢称:</span>
                    <input type="text" name="nic_name" value="<?php echo ($member_data['nic_name']); ?>" maxlength="20" class="form-control"  placeholder="取个屌一点的外号吧" />
                </div>   
                <div class="input-group">
                    <span class="input-group-addon"  >个性签名:</span>
                    <input type="text" name="desc" value="<?php echo ($member_data['desc']); ?>" maxlength="20" class="form-control" required="required" placeholder="没有个性不签名" />
                </div> 
                <div class="space_sm">联系方式</div>
                <div class="input-group">
                    <span class="input-group-addon" >QQ  号码:</span>
                    <input type="text" name="qq" value="<?php echo ($member_data['qq']); ?>"　 maxlength="20" class="form-control" required="required" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"  >微信帐号:</span>
                    <input type="text" name="weixin"  value="<?php echo ($member_data['weixin']); ?>"  maxlength="20" class="form-control" required="required" />
                </div>
              
                <div class="input-group">
                    <span class="input-group-addon"  >手机号码:</span>
                    <input type="text" name="mobile" value="<?php echo ($member_data['mobile']); ?>"   maxlength="20" class="form-control" required="required" placeholder="中国大陆手机号码" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"  >电子邮箱:</span>
                    <input type="text" name="email"  value="<?php echo ($member_data['email']); ?>"  maxlength="20" class="form-control" required="required" placeholder="这个可以用来取得密码" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon">验证码:</span>
                    <input type="text" name="vcode"  maxlength="4" class="form-control" required="required" />
                    <span class="input-group-addon">
                        <img id="vcode" src="<?php echo C('HOME_PATH').'/public/create_code.php' ?>" alt="看不清楚，换一张" style="cursor: pointer;" onclick="create_code()"/>
                    </span>
                </div>

                <div class="input_bar">
                    <input class="btn btn-primary form-control" type="submit" value="确定提交" onclick="" />
                </div>
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