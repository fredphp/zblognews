<?php /* EL PSY CONGROO */ 			    			  	  
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    		 		 		
$type = 'slide';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    	 		  	 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     	    		
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">启用</label>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="Slide" value="0">
                <input type="checkbox" lay-skin="switch" name="Slide" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->Slide) { echo "checked"; }?>>
            </div>
            <div class="layui-form-mid layui-word-aux">推荐使用尺寸一样的图片，列表支持拖拽排序哦！</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">切换样式</label>
            <div class="layui-input-inline" style="width: auto;">
                <select name="SlideType">
                    <option value="0"<?php if(!$zbp->Config('TztCardVip')->SlideType) { echo "selected"; }?>>横向滚动</option>
                    <option value="fade"<?php if($zbp->Config('TztCardVip')->SlideType=='fade') { echo "selected"; }?>>渐隐渐现</option>
                    <option value="backSlide"<?php if($zbp->Config('TztCardVip')->SlideType=='backSlide') { echo "selected"; }?>>3D叠加</option>
                    <option value="goDown"<?php if($zbp->Config('TztCardVip')->SlideType=='goDown') { echo "selected"; }?>>向下滚动</option>
                    <option value="fadeUp"<?php if($zbp->Config('TztCardVip')->SlideType=='fadeUp') { echo "selected"; }?>>缩放叠加</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">参数设置</label>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SlideAuto" value="0">
                <input type="checkbox" lay-skin="primary" title="自动滚动" name="SlideAuto" value="1"<?php if($zbp->Config('TztCardVip')->SlideAuto) { echo "checked"; }?>>
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SlideNav" value="0">
                <input type="checkbox" lay-skin="primary" title="左右翻页按钮" name="SlideNav" value="1"<?php if($zbp->Config('TztCardVip')->SlideNav) { echo "checked"; }?>>
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SlidePage" value="0">
                <input type="checkbox" lay-skin="primary" title="底部圆点按钮" name="SlidePage" value="1"<?php if($zbp->Config('TztCardVip')->SlidePage) { echo "checked"; }?>>
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SlidePageNum" value="0">
                <input type="checkbox" lay-skin="primary" title="底部数字按钮（需开启圆点）" name="SlidePageNum" value="1"<?php if($zbp->Config('TztCardVip')->SlidePageNum) { echo "checked"; }?>>
            </div>
        </div>
        <?php
            $slidedata = json_decode($zbp->Config('TztCardVip')->SlideData,true);       	    
            if(is_array($slidedata)){     		 	 		
            foreach ($slidedata as $key => $value) {     	   	  
        ?>
        <div class="layui-form-item arrange">
            <div class="layui-input-inline" style="width: 20px;">
                <input type="hidden" name="SlideData[<?php echo $key; ?>][is]" value="0">
                <input type="checkbox" lay-skin="primary" name="SlideData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
            </div>
            <div class="layui-input-inline" style="width: 120px;">
                <input type="text" name="SlideData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
            </div>
            <div class="layui-input-inline" style="width: 180px;">
                <input type="text" name="SlideData[<?php echo $key; ?>][url]" placeholder="链接" class="layui-input" value="<?php echo $value['url']; ?>">
            </div>
            <div class="layui-input-inline" style="width: 210px;">
                <input type="text" name="SlideData[<?php echo $key; ?>][img]" placeholder="图片" class="layui-input upload-input" value="<?php echo $value['img']; ?>">
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <button type="button" class="layui-btn layui-btn-primary layui-upload">上传图片</button>
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SlideData[<?php echo $key; ?>][blank]" value="0">
                <input type="checkbox" lay-skin="primary" name="SlideData[<?php echo $key; ?>][blank]" title="新窗口" value="1" <?php if($value['blank']) { echo "checked"; }?>>
            </div>
        </div>
        <?php }} ?>
        <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
            <button type="submit" class="layui-btn layui-btn-normal"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
            <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
        </div>
    </form>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>幻灯片效果预览</legend>
    </fieldset>
    <div class="layui-carousel" id="slide" style="text-align: center;">
        <div carousel-item>
        <?php
            $slidedata = json_decode($zbp->Config('TztCardVip')->SlideData,true);    			  	 	
            if(is_array($slidedata)){    	 		 			
            foreach ($slidedata as $key => $value) {     	 		 	 
            if($value['is']){         	 	
        ?>
        <a href="<?php echo $value['url']; ?>" title="<?php echo $value['title']; ?>"><img src="<?php echo $value['img']; ?>" /></a>
        <?php }}} ?>
        </div>
    </div>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>