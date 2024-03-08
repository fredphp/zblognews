<?php /* EL PSY CONGROO */ 			    		   	  
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     	  	 		
$type = 'guide';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							      		  	 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';    	  	  		
?>
<div class="layui-tab-content">
<fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>首页推荐链接设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="IdenxTabs" value="0">
                        <input type="checkbox" name="IdenxTabs" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->IdenxTabs) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>               
                <?php
                    $idenxtabsdata = json_decode($zbp->Config('TztCardVip')->IdenxTabsData,true);    	 			 	 
                    if(is_array($idenxtabsdata)){    		   			
                    foreach ($idenxtabsdata as $key => $value) {    	   				
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="IdenxTabsData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="IdenxTabsData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="text" name="IdenxTabsData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 100px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 190px;">
                            <input type="text" name="IdenxTabsData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <div class="layui-input-inline" style="width: 200px;">
                            <input type="text" name="IdenxTabsData[<?php echo $key; ?>][img]" placeholder="图片" class="layui-input upload-input" value="<?php echo $value['img']; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: 80px;">
                        <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="IdenxTabsData[<?php echo $key; ?>][blank]" value="0">
                        <input type="checkbox" lay-skin="primary" name="IdenxTabsData[<?php echo $key; ?>][blank]" title="新窗口" value="1" <?php if($value['blank']) { echo "checked"; }?>>
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
        <legend>导航栏左上角按钮设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderLeft" value="0">
                        <input type="checkbox" name="HeaderLeft" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->HeaderLeft) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderLeftM" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderLeftM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->HeaderLeftM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $headerleftdata = json_decode($zbp->Config('TztCardVip')->HeaderLeftData,true);      	  	 	
                    if(is_array($headerleftdata)){     	  		  
                    foreach ($headerleftdata as $key => $value) {       	 	 	
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="HeaderLeftData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderLeftData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="HeaderLeftData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 150px;">
                        <input type="text" name="HeaderLeftData[<?php echo $key; ?>][icon]" placeholder="图标" class="layui-input" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 260px;">
                            <input type="text" name="HeaderLeftData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderLeftData[<?php echo $key; ?>][ism]" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderLeftData[<?php echo $key; ?>][ism]" title="手机端" value="1" <?php if($value['ism']) { echo "checked"; }?>>
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
        <legend>导航栏右上角按钮设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderRight" value="0">
                        <input type="checkbox" name="HeaderRight" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->HeaderRight) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderRightM" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderRightM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->HeaderRightM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $headerightdata = json_decode($zbp->Config('TztCardVip')->HeaderRightData ,true);      	  			
                    if(is_array($headerightdata)){    		 	  	 
                    foreach ($headerightdata as $key => $value) {    	   	 	 
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="HeaderRightData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderRightData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="HeaderRightData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 150px;">
                        <input type="text" name="HeaderRightData[<?php echo $key; ?>][icon]" placeholder="图标" class="layui-input" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 260px;">
                            <input type="text" name="HeaderRightData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderRightData[<?php echo $key; ?>][ism]" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderRightData[<?php echo $key; ?>][ism]" title="手机端" value="1" <?php if($value['ism']) { echo "checked"; }?>>
                    </div>
                </div>
                <?php }} ?>
                <div class="layui-form-item">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="HeaderRightUser" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderRightUser" value="1" <?php if($zbp->Config('TztCardVip')->HeaderRightUser) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="HeaderRightUserLoginTit" placeholder="标题" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->HeaderRightUserLoginTit;?>">
                    </div>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input type="text" name="HeaderRightUserLoginUrl" placeholder="登陆链接" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->HeaderRightUserLoginUrl;?>">
                    </div>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input type="text" name="HeaderRightUserUrl" placeholder="主页链接" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->HeaderRightUserUrl;?>">
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="HeaderRightUserM" value="0">
                        <input type="checkbox" lay-skin="primary" name="HeaderRightUserM" title="手机端" value="1" <?php if($zbp->Config('TztCardVip')->HeaderRightUserM) { echo "checked"; }?>>
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
        <legend>网站页尾链接设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootLink" value="0">
                        <input type="checkbox" name="FootLink" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->FootLink) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootLinkM" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootLinkM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->FootLinkM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $footlinkdata = json_decode($zbp->Config('TztCardVip')->FootLinkData,true);    	  	 	  
                    if(is_array($footlinkdata)){    	  		   
                    foreach ($footlinkdata as $key => $value) {    		 	 	 	
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="FootLinkData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootLinkData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 90px;">
                        <input type="text" name="FootLinkData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 400px;">
                             <input type="text" name="FootLinkData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootLinkData[<?php echo $key; ?>][blank]" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootLinkData[<?php echo $key; ?>][blank]" title="新窗口" value="1" <?php if($value['blank']) { echo "checked"; }?>>
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
        <legend>网站右下角按钮设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootRightLink" value="0">
                        <input type="checkbox" name="FootRightLink" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->FootRightLink) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootRightLinkM" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootRightLinkM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->FootRightLinkM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $footrightdata = json_decode($zbp->Config('TztCardVip')->FootRightData,true);           	
                    if(is_array($footrightdata)){    		 				 
                    foreach ($footrightdata as $key => $value) {    	    	 	
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="FootRightData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootRightData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="FootRightData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 150px;">
                        <input type="text" name="FootRightData[<?php echo $key; ?>][icon]" placeholder="图标" class="layui-input" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 260px;">
                            <input type="text" name="FootRightData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="FootRightData[<?php echo $key; ?>][ism]" value="0">
                        <input type="checkbox" lay-skin="primary" name="FootRightData[<?php echo $key; ?>][ism]" title="手机端" value="1" <?php if($value['ism']) { echo "checked"; }?>>
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
        <legend>手机底部导航菜单设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="TabBarM" value="0">
                        <input type="checkbox" name="TabBarM" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->TabBarM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">列表支持拖拽排序哦！</div>
                </div>
                <?php
                    $tabbardata = json_decode($zbp->Config('TztCardVip')->TabbarData,true);    	 		   	
                    if(is_array($tabbardata)){       	   	
                    foreach ($tabbardata as $key => $value) {      	  	  
                ?>
                <div class="layui-form-item arrange">
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="TabbarData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="TabbarData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="TabbarData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 150px;">
                        <input type="text" name="TabbarData[<?php echo $key; ?>][icon]" placeholder="图标" class="layui-input" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 140px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 260px;">
                            <input type="text" name="TabbarData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="TabbarData[<?php echo $key; ?>][blank]" value="0">
                        <input type="checkbox" lay-skin="primary" name="TabbarData[<?php echo $key; ?>][blank]" title="新窗口" value="1" <?php if($value['blank']) { echo "checked"; }?>>
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