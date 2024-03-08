<?php /* EL PSY CONGROO */ 			    	 	   	 
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     		  		 
$type = 'ad';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							        			 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     	 	  	 
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">启用</label>
            <div class="layui-input-inline" style="width: 60px;">
                <input type="hidden" name="Ad" value="0">
                <input type="checkbox" name="Ad" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->Ad) { echo "checked"; }?>>
            </div>
            <div class="layui-form-mid layui-word-aux">固定广告位内置了图片广告和手动代码两种模式可选择</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">全局广告</label>
            <div class="layui-input-inline w420">
                <textarea name="AdBody" rows="10" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->AdBody);?></textarea>
                <div class="layui-form-mid layui-word-aux">可以是置顶、底飘、弹窗等类型广告代码</div>
            </div>
            <div class="layui-input-inline">
                <input type="hidden" name="AdBodyShow" value="0">
                <input type="checkbox" lay-skin="primary" title="显示" name="AdBodyShow" value="1"<?php if($zbp->Config('TztCardVip')->AdBodyShow) { echo "checked"; }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">列表插楼广告</label>
            <div class="layui-input-inline" style="width: 40px;">
                <input type="text" class="layui-input" placeholder="几楼" value="<?php echo $zbp->Config('TztCardVip')->AdListNum;?>" name="AdListNum" style="text-align: center; padding: 0;">
            </div>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" placeholder="链接" value="<?php echo $zbp->Config('TztCardVip')->AdListUrl;?>" name="AdListUrl">
            </div>
            <div class="layui-input-inline" style="width: 170px;">
                <input type="text" class="layui-input upload-input" placeholder="图片" value="<?php echo $zbp->Config('TztCardVip')->AdListImg;?>" name="AdListImg">
            </div>
            <div class="layui-input-inline " style="width: 60px;">
                <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
            </div>
           
            <div class="layui-input-inline" style="width: 20px;">
                <input type="hidden" name="AdList" value="0">
                <input type="checkbox" lay-skin="primary" name="AdList" title="显示" value="1"<?php if($zbp->Config('TztCardVip')->AdList) { echo "checked"; }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline w420">
                <textarea name="AdListCode" rows="3" placeholder="请输入广告代码，填写后图片广告失效，留空不起用" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->AdListCode);?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">底部通栏广告</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" placeholder="链接" value="<?php echo $zbp->Config('TztCardVip')->AdFootUrl;?>" placeholder="" name="AdFootUrl">
            </div>
            <div class="layui-input-inline" style="width: 220px;">
                <input type="text" class="layui-input upload-input" placeholder="图片" value="<?php echo $zbp->Config('TztCardVip')->AdFootImg;?>" placeholder="" name="AdFootImg">
            </div>
            <div class="layui-input-inline " style="width: 60px;">
                <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
            </div>
            <div class="layui-input-inline" style="width: 20px;">
                <input type="hidden" name="AdFoot" value="0">
                <input type="checkbox" lay-skin="primary" name="AdFoot" title="显示" value="1"<?php if($zbp->Config('TztCardVip')->AdFoot) { echo "checked"; }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline w420">
                <textarea name="AdFootCode" rows="3" placeholder="请输入广告代码，填写后图片广告失效，留空不起用" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->AdFootCode);?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">正文底部广告</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" placeholder="链接" value="<?php echo $zbp->Config('TztCardVip')->AdArtFootUrl;?>" placeholder="" name="AdArtFootUrl">
            </div>
            <div class="layui-input-inline" style="width: 220px;">
                <input type="text" class="layui-input upload-input" placeholder="图片" value="<?php echo $zbp->Config('TztCardVip')->AdArtFootImg;?>" placeholder="" name="AdArtFootImg">
            </div>
            <div class="layui-input-inline " style="width: 60px;">
                <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
            </div>
            <div class="layui-input-inline" style="width: 20px;">
                <input type="hidden" name="AdArtFoot" value="0">
                <input type="checkbox" lay-skin="primary" name="AdArtFoot" title="显示" value="1"<?php if($zbp->Config('TztCardVip')->AdArtFoot) { echo "checked"; }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"></label>
            <div class="layui-input-inline w420">
                <textarea name="AdArtFootCode" rows="3" placeholder="请输入广告代码，填写后图片广告失效，留空不起用" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->AdArtCode);?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn layui-btn-normal post-submit"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
                <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
            </div>
        </div>
    </form>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>