<?php /* EL PSY CONGROO */ 			    						 	
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     	   	  
$type = 'skin';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    	 	  			
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     	   		 
?>
<div class="layui-tab-content">
<fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>基本设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">页面宽度</label>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input name="MainWidth" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->MainWidth;?>">
                        <div class="slider" data-min="768" data-max="1400"></div>
                    </div>
                    <div class="layui-form-mid layui-word-aux">px</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">网站主色调</label>
                    <div class="layui-input-inline">
                        <input type="text" name="MainColorVal" value="<?php echo $zbp->Config('TztCardVip')->MainColorVal;?>" placeholder="请选择颜色" class="layui-input color-input">
                    </div>
                    <div class="layui-input-inline" style="left: -11px; width: 30px;">
                        <div class="set-color"></div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="MainColor" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用" name="MainColor" value="1" <?php if($zbp->Config('TztCardVip')->MainColor) { echo "checked"; }?>>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">顶部导航栏</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="Header" value="0">
                        <input type="checkbox" lay-skin="switch" name="Header" value="1"<?php if($zbp->Config('TztCardVip')->Header) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderLeftFixed" value="0">
                        <input type="checkbox" lay-skin="primary" title="居左样式" name="HeaderLeftFixed" value="1"<?php if($zbp->Config('TztCardVip')->HeaderLeftFixed) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderFixed" value="0">
                        <input type="checkbox" lay-skin="primary" title="吸顶悬浮" name="HeaderFixed" value="1"<?php if($zbp->Config('TztCardVip')->HeaderFixed) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderLeft" value="0">
                        <input type="checkbox" lay-skin="primary" title="左侧导航组" name="HeaderLeft" value="1"<?php if($zbp->Config('TztCardVip')->HeaderLeft) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderRight" value="0">
                        <input type="checkbox" lay-skin="primary" title="右侧导航组" name="HeaderRight" value="1"<?php if($zbp->Config('TztCardVip')->HeaderRight) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline" style="width: auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <input type="text" name="HeaderBgColor" value="<?php echo $zbp->Config('TztCardVip')->HeaderBgColor;?>" placeholder="请选择颜色" class="layui-input color-input">
                        </div>
                        <div class="layui-input-inline" style="left: -11px; width: 30px;">
                            <div class="set-color2"></div>
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <input type="text" name="HeaderBgColor2" value="<?php echo $zbp->Config('TztCardVip')->HeaderBgColor2;?>" placeholder="请选择颜色" class="layui-input color-input">
                        </div>
                        <div class="layui-input-inline" style="left: -11px; width: 30px;">
                            <div class="set-color2"></div>
                        </div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="HeaderBg" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用自定义背景色" name="HeaderBg" value="1" <?php if($zbp->Config('TztCardVip')->HeaderBg) { echo "checked"; }?>>
                    </div>
                </div>
            
                <div class="layui-form-item">
                    <label class="layui-form-label">夜间模式</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="CloreDark" value="">
                        <input type="checkbox" lay-skin="primary" title="全天开启" name="CloreDark" value="dark"<?php if($zbp->Config('TztCardVip')->CloreDark) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="CloreDarkAuto" value="0">
                        <input type="checkbox" lay-skin="primary" title="自动夜间" name="CloreDarkAuto" value="1"<?php if($zbp->Config('TztCardVip')->CloreDarkAuto) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">不影响用户点击切换</div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">图片灯箱</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="ImgBox" value="0">
                        <input type="checkbox" name="ImgBox" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ImgBox) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ImgBox1" value="false">
                        <input type="checkbox" lay-skin="primary" name="ImgBox1" value="true" title="工具栏" <?php if($zbp->Config('TztCardVip')->ImgBox1=='true') { echo "checked"; }?>>
                        <input type="hidden" name="ImgBox2" value="false">
                        <input type="checkbox" lay-skin="primary" name="ImgBox2" value="true" title="缩略图导航" <?php if($zbp->Config('TztCardVip')->ImgBox2=='true') { echo "checked"; }?>>
                        <input type="hidden" name="ImgBox3" value="false">
                        <input type="checkbox" lay-skin="primary" name="ImgBox3" value="true" title="图片信息" <?php if($zbp->Config('TztCardVip')->ImgBox3=='true') { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
                    <button type="submit" class="layui-btn layui-btn-normal"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
                    <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
                </div>
            </form>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>图片背景设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="SkinImg" value="0">
                        <input type="checkbox" lay-skin="switch" name="SkinImg" value="1"<?php if($zbp->Config('TztCardVip')->SkinImg) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">为了更好的适配页面,请确保图片尺寸是一样的，列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $SkinImgData = json_decode($zbp->Config('TztCardVip')->SkinImgData,true);    	 		  		
                    if(is_array($SkinImgData)){    					 		
                    foreach ($SkinImgData as $key => $value) {    							 
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="SkinImgData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="SkinImgData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 90px;">
                        <input type="text" name="SkinImgData[<?php echo $key; ?>][title]" placeholder="电脑端标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 280px;">
                        <div class="layui-input-inline" style="width: 200px;">
                            <input type="text" name="SkinImgData[<?php echo $key; ?>][img]" placeholder="电脑端图片" class="layui-input upload-input" value="<?php echo $value['img']; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                        <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: 90px;">
                        <input type="text" name="SkinImgData[<?php echo $key; ?>][title2]" placeholder="手机端标题" class="layui-input" value="<?php echo $value['title2']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 280px;">
                        <div class="layui-input-inline" style="width: 200px;">
                            <input type="text" name="SkinImgData[<?php echo $key; ?>][img2]" placeholder="手机端图片" class="layui-input upload-input" value="<?php echo $value['img2']; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                        <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
                        </div>
                    </div>
                </div>
                <?php }} ?>
                <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
                    <button type="submit" class="layui-btn layui-btn-normal"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
                    <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
                </div>
            </form>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>颜色背景设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="SkinColor" value="0">
                        <input type="checkbox" lay-skin="switch" name="SkinColor" value="1"<?php if($zbp->Config('TztCardVip')->SkinColor) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">推荐使用渐变色，尽量选择两个相近的颜色值，列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $SkinColorData = json_decode($zbp->Config('TztCardVip')->SkinColorData,true);    		 			  
                    if(is_array($SkinColorData)){     	 			  
                    foreach ($SkinColorData as $key => $value) {      	 		 	
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="SkinColorData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="SkinColorData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 120px;">
                        <input type="text" name="SkinColorData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 240px;">
                        <div class="layui-input-inline" style="width: 180px;">
                            <input type="text" name="SkinColorData[<?php echo $key; ?>][val2]" value="<?php echo $value['val2']; ?>" placeholder="请选择颜色" class="layui-input color-input">
                        </div>
                        <div class="layui-input-inline" style="left: -11px; width: 30px;">
                            <div class="set-color2"></div>
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: 240px;">
                        <div class="layui-input-inline" style="width: 180px;">
                            <input type="text" name="SkinColorData[<?php echo $key; ?>][val1]" value="<?php echo $value['val1']; ?>" placeholder="请选择颜色" class="layui-input color-input">
                        </div>
                        <div class="layui-input-inline" style="left: -11px; width: 30px;">
                            <div class="set-color2"></div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
                <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
                    <button type="submit" class="layui-btn layui-btn-normal"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
                    <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
                </div>
            </form>
        </div>
    </fieldset>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>