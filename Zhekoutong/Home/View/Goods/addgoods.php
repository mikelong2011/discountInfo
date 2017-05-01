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
        <title>商品录入</title>
        <style rel="stylesheet">


        </style>

    </head>
    <body>
        <div class="wrap">
            <?php require "/public/inc/app_header.html"; ?>       

            <div style="height:50px"></div>

            <form action="__APP__/home/goods/addgoods" method="post">
            <div class="panel panel-info">
                <div class="panel-heading">商品录入</div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon">商品名称</span>
                        <input type="text" class="form-control" name="goods_name" value="" placeholder="商品名称" maxlength="20" required="required" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">商品分类</span>
                        <select id="type1" name="type1" class="form-control" required="required" placeholder="请选择"  >
                            <foreach name="typeList" item="vo">
                                <option type_id="{$vo.id}">{$vo.type_name}</option>
                            </foreach>
                        </select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">商品小类</span>
                        <select id="type2" name="type2" class="form-control" required="required" placeholder="请选择" >
                            <foreach name="typeList2" item="vo">
                                <option>{$vo.type_name}</option>
                            </foreach>
                        </select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">商品品牌</span>
                        <select id="brand" name="brand" class="form-control" required="required" placeholder="请选择" >
                        </select>
                    </div>                    
                    <div class="input-group">
                        <span class="input-group-addon">所属商店</span>
                        <select id="shop" name="shop" class="form-control" required="required" placeholder="请选择" >
                            <foreach name="shopList" item="vo">
                                <option>{$vo.shop_name}</option>
                            </foreach>
                        </select>
                    </div>   

                    <div class="input-group" >
                        <span class="input-group-addon">商品广告</span>
                        <input type="text" id="specific" name="specific" class="form-control" maxlength="20"  placeholder="广告语" />
                    </div>
                    <div class="input-group" >
                        <span class="input-group-addon">详细描述</span>
                        <input type="text" id="desc" name="desc" class="form-control"  maxlength="100" />
                    </div>
                    <div class="input-group" >
                        <span class="input-group-addon">促销价格</span>
                        <input type="number" id="price" name="price" class="form-control" required="required" />
                    </div>      
                    <div class="input-group" >
                        <span class="input-group-addon">市场价格</span>
                        <input type="number" id="old_price" name="old_price" class="form-control" required="required" />
                    </div> 
                    <div class="input-group" >
                        <span class="input-group-addon">商品单位</span>
                        <input type="text" id="unit" name="unit" class="form-control"  maxlength="4" required="required" />
                    </div>      
                    <div class="input-group" >
                        <span class="input-group-addon">商品产地</span>
                        <input type="text" id="made_in" name="made_in" class="form-control" maxlength="10" required="required" />
                    </div>                                                                                 

                    <div class="nav_bar"></div>
                    <div class="input_bar">
                        <input type="submit" class="form-control btn btn-primary" value="确定提交" />
                    </div>
                </div>

            </div>
            </form>
            <div class="space"></div>
            <div class="footer">
                <?php require "/public/inc/app_footer.html"; ?>                 
            </div>            
        </div>
        <script>
            $(function(){
                $("#type1").click(function(){
                    $("#type2").empty();
                    var post_data = $(this).val();
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        data:{type1: post_data},
                        url: '__APP__/home/goods/get_type2',
                        success: function (data) {
                            if (data != "") {
                                //取得对象数组，填充小分类列表
                                $("#type2").empty();
                                var type2 ="";
                                for(var i=0;i<data.length;i++){
                                    type2 +="<option>"+ (data[i].type_name)+"</option>";
                                }
                                $("#type2").append(type2);
                            }else{
                                console.log("没有取得数据");
                            }
                        }
                        
                    });
                    //console.log(post_data);
                });
                $("#type2").click(function(){
                    var post_data =$(this).val();
                    $("#brand").empty();
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        data:{type: post_data},
                        url: '__APP__/home/goods/get_brands_by_type',
                        success: function (data) {
                            if (data != "") {
                                //取得对象数组，填充品牌列表
                                $("#brand").empty();
                                var brand ="";
                                for(var i=0;i<data.length;i++){
                                    brand +="<option>"+ (data[i].brand_name)+"</option>";
                                }
                                $("#brand").append(brand);
                                console.log(brand);
                            }
                        }
                        
                    });                    
                });
            })

        </script>
    </body>
</html>