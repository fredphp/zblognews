<?php /* EL PSY CONGROO */ 			    	     	 
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							          	 
$type = 'seo';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							      	  	 	
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     	  	   
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">启用</label>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="Seo" value="0">
                <input type="checkbox" lay-skin="switch" name="Seo" value="1"<?php if($zbp->Config('TztCardVip')->Seo) { echo "checked"; }?>>
            </div>
            <div class="layui-form-mid layui-word-aux">使用了SEO插件时可关闭该功能</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站标题</label>
            <div class="layui-input-inline w420">
                <input type="text" name="SiteTitle" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->SiteTitle;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网站副标题</label>
            <div class="layui-input-inline w420">
                <input type="text" name="SiteSubTitle" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->SiteSubTitle;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">首页关键词</label>
            <div class="layui-input-inline w420">
                <textarea name="SiteKeyWords" rows="3" class="layui-textarea"  placeholder=""><?php echo $zbp->Config('TztCardVip')->SiteKeyWords;?></textarea>
                <div class="layui-form-mid layui-word-aux">多个使用逗号隔开,一般不超过100个字符</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">首页描述</label>
            <div class="layui-input-inline w420">
                <textarea name="SiteDescriPtion" rows="3" class="layui-textarea"  placeholder=""><?php echo $zbp->Config('TztCardVip')->SiteDescriPtion;?></textarea>
                <div class="layui-form-mid layui-word-aux">一般不超过200个字符</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分隔符</label>
            <div class="layui-input-inline w420">
                <input type="text" name="SeoLine" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->SeoLine;?>">
                <div class="layui-form-mid layui-word-aux">标题之间的分隔符，一般是-或_比较常用</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题组成</label>
            <div class="layui-input-inline" style="width: auto;">
                <input type="checkbox" lay-skin="primary" title="页面标题" checked="checked" disabled>
                <input type="hidden" name="SeoSetCat" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoSetCat" value="1" title="分类名称" <?php if($zbp->Config('TztCardVip')->SeoSetCat) { echo "checked"; }?>>
                <input type="hidden" name="SeoSetPage" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoSetPage" value="1" title="页码数" <?php if($zbp->Config('TztCardVip')->SeoSetPage) { echo "checked"; }?>>
                <input type="checkbox" lay-skin="primary" title="网站标题" checked="checked" disabled>
                <input type="hidden" name="SeoSetSiteSub" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoSetSiteSub" value="1" title="网站副标题" <?php if($zbp->Config('TztCardVip')->SeoSetSiteSub) { echo "checked"; }?>>									
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">自定义SEO</label>
            <div class="layui-input-inline" style="width: auto;">
                <input type="hidden" name="SeoDiyArt" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoDiyArt" value="1" title="文章页" <?php if($zbp->Config('TztCardVip')->SeoDiyArt) { echo "checked"; }?>>
                <input type="hidden" name="SeoDiyCat" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoDiyCat" value="1" title="分类页" <?php if($zbp->Config('TztCardVip')->SeoDiyCat) { echo "checked"; }?>>
                <input type="hidden" name="SeoDiyTag" value="0">
                <input type="checkbox" lay-skin="primary" name="SeoDiyTag" value="1" title="标签页" <?php if($zbp->Config('TztCardVip')->SeoDiyTag) { echo "checked"; }?>>									
            </div>
            <div class="layui-input-inline" style="width: auto;">
                <div class="layui-form-mid layui-word-aux">勾选后对应编辑页会自动插入SEO字段</div>
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