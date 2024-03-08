<?php /* EL PSY CONGROO */ 			      	 	   
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     							         	 	
$type = 'side';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    	 			   
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';      	 	 		
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post" enctype="multipart/form-data">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>基础设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">侧栏状态</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="WebSide" value="0">
                        <input type="checkbox" name="WebSide" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->WebSide) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">关闭后所有侧栏模块将不显示</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">侧栏布局</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="radio" name="WebSideLayout" value="0" title="左侧"<?php if(!$zbp->Config('TztCardVip')->WebSideLayout) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="radio" name="WebSideLayout" value="1" title="右侧"<?php if($zbp->Config('TztCardVip')->WebSideLayout=='1') { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">侧栏宽度</label>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input name="WebSideWidth" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->WebSideWidth;?>">
                        <div class="slider" data-min="190" data-max="360"></div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>导航栏设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">启用</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="SideNav" value="0">
                        <input type="checkbox" name="SideNav" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->SideNav) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">关闭后不显示，列表支持拖拽排序</div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">指定分类</label>
                    <div class="layui-input-inline">
                        <select name="SideNavId">
                            <option value="0">全部顶级分类</option>
                            <option value="1"<?php if($zbp->Config('TztCardVip')->SideNavId=='1') { echo "selected"; }?>>全部二级分类</option>
                            <option value="3"<?php if($zbp->Config('TztCardVip')->SideNavId=='3') { echo "selected"; }?>>指定ID参数</option>
                        </select>
                    </div>
                    <?php if($zbp->Config('TztCardVip')->SideNavId=='3') { ?>
                    <div class="layui-input-inline">
                        <input type="text" name="SideNavIdN" placeholder="ID参数，支持多个" class="layui-input value" value="<?php echo $zbp->Config('TztCardVip')->SideNavIdN; ?>">
                    </div>
                    <?php }?>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="SideNavCate" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用" name="SideNavCate" value="1" <?php if($zbp->Config('TztCardVip')->SideNavCate) { echo "checked"; }?>>
                    </div>
                </div>
                <?php
                    $SideNavData = json_decode($zbp->Config('TztCardVip')->SideNavData,true);     	 		   
                    if(is_array($SideNavData)){    	 	 		  
                    foreach ($SideNavData as $key => $value) {    	   		 	
                ?>
                <div class="layui-form-item arrange">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="SideNavData[<?php echo $key; ?>][is]" value="0">
                        <input type="checkbox" lay-skin="primary" name="SideNavData[<?php echo $key; ?>][is]" value="1" <?php if($value['is']) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="text" name="SideNavData[<?php echo $key; ?>][title]" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width: 120px;">
                        <input type="text" name="SideNavData[<?php echo $key; ?>][icon]" placeholder="图标" class="layui-input" value="<?php echo $value['icon']; ?>">
                    </div>
                    <div class="layui-input-inline" style="width:auto;">
                        <div class="layui-input-inline" style="width: 120px;">
                            <select lay-filter="filter">
                                <?php echo CategorySelect('url','选择链接','0');?>
                                <?php echo PageSelect('0');?>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: 260px;">
                            <input type="text" name="SideNavData[<?php echo $key; ?>][url]" placeholder="自定义链接" class="layui-input value" value="<?php echo $value['url']; ?>">
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>二维码设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">启用</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="SideQrCode" value="0">
                        <input type="checkbox" name="SideQrCode" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->SideQrCode) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">默认自动获取当前页面链接二维码，可上传启用固定二维码模式</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">二维码提示文字</label>
                    <div class="layui-input-inline w420">
                        <input type="text" name="SideQrCodeText" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->SideQrCodeText;?>">
                        <div class="layui-form-mid layui-word-aux">例如:扫一扫用手机访问本站</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">固定二维码图片</label>
                    <div class="layui-input-inline" style="width: 320px;">
                        <input type="text" name="SideQrCodeImg" class="layui-input upload-input" value="<?php echo $zbp->Config('TztCardVip')->SideQrCodeImg;?>">
                        <div class="layui-form-mid layui-word-aux">启用后自动二维码失效改用固定二维码模式</div>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <button type="button" class="layui-btn layui-btn-primary layui-upload">上传图片</button>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="SideQrCodeShow" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用" name="SideQrCodeShow" value="1" <?php if($zbp->Config('TztCardVip')->SideQrCodeShow) { echo "checked"; }?>>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>排行榜设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">启用</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtRankR" value="0">
                        <input type="checkbox" lay-skin="switch" name="ArtRankR" value="1"<?php if($zbp->Config('TztCardVip')->ArtRankR) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">关闭后不显示，列表支持拖拽排序，内容设置前往文章设置页面</div>
                </div>
                <!-- <div class="layui-form-item">
                    <label class="layui-form-label">tab切换卡</label>
                    <div class="layui-input-inline" style="width: auto;"> -->
                        <!-- <?php
                            // $post_info = json_decode($zbp->Config('TztCardVip')->ArtRankNavBtn,true);    	   	 	 
                            // $list_info = json_decode($zbp->Config('TztCardVip')->ArtRankNav, true);    		  	 		
                            // foreach ($list_info as $key => $info) {    				  		
                            //     echo '<span class="arrange"><input type="hidden" name="ArtRankNav[' . $key . ']" value="0"><input type="checkbox" lay-skin="primary" name="ArtRankNav[' . $key . ']" value="1" title="' . $post_info[$key] . '"' . ($info == 1 ? ' checked' : '') . '></span>';     	 					
                            // }
                         ?> -->
                    <!-- </div>
                    <div class="layui-form-mid layui-word-aux">可拖动排序，默认显示第一组</div>
                </div> -->

                <?php
                    $post_info = json_decode($zbp->Config('TztCardVip')->ArtRankNavBtn,true);    	  				 
                    $list_info = json_decode($zbp->Config('TztCardVip')->ArtRankNav, true);    		 	 	 	
                    foreach ($list_info as $key => $info) {    		   	 	
                ?>
                <div class="layui-form-item arrange">
                    <label class="layui-form-label">
                        <?php if($key=='view'){echo '热门文章';} ?>
                        <?php if($key=='cmt'){echo '热评文章';} ?>
                        <?php if($key=='new'){echo '最新文章';} ?>
                        <?php if($key=='rec'){echo '推荐文章';} ?>
                        <?php if($key=='tag'){echo '热门标签';} ?>
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtRankNavBtn[<?php echo $key; ?>]" class="layui-input" value="<?php echo $post_info[$key];?>">
                    </div>
                    <div class="layui-input-inline" style="width: 20px;">
                        <input type="hidden" name="ArtRankNav[<?php echo $key; ?>]" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtRankNav[<?php echo $key; ?>]" value="1" <?php if($info) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">显示</div>
                </div>
                <?php }?>

            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>标签云设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">启用</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="SideTag" value="0">
                        <input type="checkbox" name="SideTag" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->SideTag) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">关闭后模块将不显示</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">模块标题</label>
                    <div class="layui-input-inline">
                        <input type="text" name="SideTagTitle" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->SideTagTitle;?>">
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="SideTagTit" value="0">
                        <input type="checkbox" lay-skin="primary" title="显示" name="SideTagTit" value="1"<?php if($zbp->Config('TztCardVip')->SideTagTit) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">指定排序</label>
                    <div class="layui-input-inline">
                        <select name="SideTagSort">
                            <option value="0">最新标签</option>
                            <option value="1"<?php if($zbp->Config('TztCardVip')->SideTagSort=='1') { echo "selected"; }?>>热门标签</option>
                            <option value="2"<?php if($zbp->Config('TztCardVip')->SideTagSort=='2') { echo "selected"; }?>>随机标签</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">展示数量</label>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input name="SideTagNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->SideTagNum;?>">
                        <div class="slider" data-min="5" data-max="30"></div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
            <button type="submit" class="layui-btn layui-btn-normal submit"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
            <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
        </div>
    </form>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>