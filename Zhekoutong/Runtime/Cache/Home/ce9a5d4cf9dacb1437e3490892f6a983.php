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
        <title>商品分类</title>
        <style>
        .list-group{

        }
        #typeList2{
            position:fixed;
            top:49px;
            width:70%;
            height:100%;
            right:0;
            display:none;
            z-index:5;
            border:1px solid #ccc;
            background-color:#fafefa;
        }
        </style>

    </head>
    <body>
        <div class="wrap">
            <div class="panel panel-info">
                <div class="panel-heading">分类</div>
                <div class="space"></div>
                <div class="panel-body">
                    <ul class="list-group" >
                        <?php if(is_array($type_list)): foreach($type_list as $key=>$vo): ?><li class="list-group-item type1" style="text-align: left;" id="<?php echo ($vo["id"]); ?>">
                                <?php echo ($vo["type_name"]); ?>
                            </li><?php endforeach; endif; ?>
                    </ul>


                    <ul id="typeList2" class="list-group" style="">
                    </ul>

                </div>

            </div>
            <div class="space"></div>
            <div class="footer">
                <?php require "/public/inc/app_footer.html"; ?>                 
            </div>
        </div>
        <script>
            $(function(){
                //取得二级分类
                $(".type1").click(function(){
                    $(".type1").css("background-color","#fff");
                    $(this).css("background-color","#f60");
                     $("#typeList2").empty();
                     var type1=$(this).prop("id");
                     //console.log(type1);
                     $.ajax({
                         type:'post',
                         data:{'parent':type1},
                         dataType:'json',
                         url:'/discountinfo/index.php/Home/Goods/category',
                         success:function(data){
                            if(data.length){
                                for(var i=0;i<data.length;i++){
                                    list2 ="<a href='/discountinfo/index.php/home/goods/index/type/"+data[i].id+"'>";
                                    list2 += "<li class='list-group-item' id='" +data[i].id+"' style='text-align:left;text-indent:20px'>";
                                    list2 += data[i].type_name;
                                    list2 += "</li></a>";
                                    $("#typeList2").append(list2).show();
                                }

                            }else{
                                $("#typeList2").hide();
                            }
                            
                         }
                     });
                })

            });
        </script>
    </body>
</html>