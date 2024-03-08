<?php /* EL PSY CONGROO */ 			    	  	 			
require '../../../../zb_system/function/c_system_base.php';     			 			 
$type = 'basic';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     						 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';       	  		
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post" enctype="multipart/form-data">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">资源路径</label>
            <div class="layui-input-inline w420">
                <input type="text" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->StaticUrl;?>" name="StaticUrl">
                <div class="layui-form-mid layui-word-aux">本地路径/开头，外部路径http开头</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">扩展静态资源</label>
            <div class="layui-input-inline w420">
                <textarea name="SubStatic" rows="5" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->SubStatic);?></textarea>
                <div class="layui-form-mid layui-word-aux">可自定义引入css或js等相关扩展资源文件</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">logo</label>
            <div class="layui-input-inline w420">
                <input type="text" class="layui-input upload-input" value="<?php echo $zbp->Config('TztCardVip')->Logo;?>" name="Logo">
                <?php if($zbp->Config('TztCardVip')->Logo){ ?>
                <div class="layui-form-mid layui-word-aux">
                    <img style="max-width: 220px;" src="<?php echo $zbp->Config('TztCardVip')->Logo;?>" />
                </div>
                <?php }else{?>
                <div class="layui-form-mid layui-word-aux">浏览器窗口前面的小图标</div>
                <?php }?>
            </div>
            <div class="layui-input-inline ">
                <button type="button" class="layui-btn layui-btn-primary layui-upload">上传图片</button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Favicon</label>
            <div class="layui-input-inline w420">
                <input type="text" class="layui-input upload-input" value="<?php echo $zbp->Config('TztCardVip')->Favicon;?>" name="Favicon">
                <?php if($zbp->Config('TztCardVip')->Favicon){ ?>
                <div class="layui-form-mid layui-word-aux">
                    <img style="max-width: 220px;" src="<?php echo $zbp->Config('TztCardVip')->Favicon;?>" />
                </div>
                <?php }else{?>
                <div class="layui-form-mid layui-word-aux">浏览器窗口前面的小图标</div>
                <?php }?>
            </div>
            <div class="layui-input-inline ">
                <button type="button" class="layui-btn layui-btn-primary layui-upload">上传图片</button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">底部提示信息</label>
            <div class="layui-input-inline w420">
                <textarea name="FootTipsText" rows="3" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->FootTipsText);?></textarea>
            </div>
            <div class="layui-input-inline">
                <input type="hidden" name="FootTips" value="0">
                <input type="checkbox" lay-skin="primary" title="显示" name="FootTips" value="1" <?php if($zbp->Config('TztCardVip')->FootTips) { echo "checked"; }?>>
                <br>
                <input type="hidden" name="FootTipsM" value="0">
                <input type="checkbox" lay-skin="primary" title="手机端" name="FootTipsM" value="1" <?php if($zbp->Config('TztCardVip')->FootTipsM) { echo "checked"; }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">备案号</label>
            <div class="layui-input-inline w420">
                <input type="text" class="layui-input upload-input" name="Icp" placeholder="icp备案号" value="<?php echo $zbp->Config('TztCardVip')->Icp;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">统计代码</label>
            <div class="layui-input-inline w420">
                <textarea name="StatiSticsJs" rows="3" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->StatiSticsJs);?></textarea>
            </div>
            <div class="layui-input-inline">
                <input type="hidden" name="StatiStics" value="0">
                <input type="checkbox" lay-skin="primary" title="显示" name="StatiStics" value="1" <?php if($zbp->Config('TztCardVip')->StatiStics) { echo "checked"; }?>>
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