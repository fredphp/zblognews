<?php /* EL PSY CONGROO */ 			    			 	 	 
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    	   		 	
$type = 'setup';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     				   
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     		  	  
?>
<div class="layui-tab-content">
    <blockquote class="layui-elem-quote" style="margin: 20px 0;">
        欢迎使用“<?php echo $zbp->themeapp->name?>”您已获得授权，在您配置或修改文件前请备份相关文件，以免数据丢失造成不必要的麻烦！
    </blockquote>
    <fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>主题介绍</legend>
        <div class="layui-field-box">
            <div class="layui-row">
                <div class="layui-col-md4">
                    <table class="layui-table">	
                        <tbody>
                            <tr>
                                <td class="layui-font-gray">主题名称</td>
                                <td>
                                    <?php echo $zbp->themeapp->name?>
                                </td>
                            </tr>
                            <tr>
                                <td class="layui-font-gray">当前版本</td>
                                <td>v<?php echo $zbp->themeapp->version?></td>
                            </tr> 
                            <tr>
                                <td class="layui-font-gray">更新日期</td>
                                <td><?php echo $zbp->themeapp->modified?></td>
                            </tr>
                        </tbody>
                    </table> 
                </div>
                <div class="layui-col-md4" style="padding: 0 15px;">
                    <table class="layui-table">	
                        <tbody>
                            <tr>
                                <td class="layui-font-gray">发布时间</td>
                                <td><?php echo $zbp->themeapp->pubdate?></td>
                            </tr>	
                            <tr>
                                <td class="layui-font-gray">主题作者</td>
                                <td>王多于</td>
                            </tr>		        	
                            <tr>
                                <td class="layui-font-gray">联系作者</td>
                                <td>QQ：726662013</td>
                            </tr>
                        </tbody>
                    </table>   
                </div>
                <div class="layui-col-md4">
                    <table class="layui-table">	
                        <tbody>
                            <tr>
                                <td class="layui-font-gray">适用版本</td>
                                <td>Z-Blog PHP 1.7.2+</td>
                            </tr>
                            <tr>
                                <td class="layui-font-gray">兼容浏览器</td>
                                <td>IE10+</td>
                            </tr>
                            <tr>
                                <td class="layui-font-gray">官网地址</td>
                                <td> <a target="_blank" href="<?php echo $zbp->themeapp->url?>">taozhuti.cn</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="layui-font-red" style="text-align: center">
                    请尊重作者劳动成果，尊重版权，禁止任何形式的二次出售、分享他人行为。
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>常用设置</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post" enctype="multipart/form-data">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">默认背景</label>
                    <div class="layui-input-inline w420">
                        <div class="layui-input-inline" style="width: 340px;">
                            <input type="text" name="DefaultWebBg" placeholder="图片地址" class="layui-input upload-input" value="<?php echo $zbp->Config('TztCardVip')->DefaultWebBg; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <button type="button" class="layui-btn layui-btn-normal layui-upload"><i class="layui-icon layui-icon-picture"></i></button>
                        </div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="DefaultWeb" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用，仅PC端有效" name="DefaultWeb" value="1" <?php if($zbp->Config('TztCardVip')->DefaultWeb) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">最新公告</label>
                    <div class="layui-input-inline w420">
                        <textarea name="NoticeCode" rows="10" class="layui-textarea"><?php echo $zbp->Config('TztCardVip')->NoticeCode;?></textarea>
                        <div class="layui-input-inline w420" style="margin-top: 10px;">
                            <input type="text" class="layui-input upload-input" name="NoticeBtn" placeholder="关闭弹窗按钮名称" value="<?php echo $zbp->Config('TztCardVip')->NoticeBtn;?>">
                        </div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="Notice" value="0">
                        <input type="checkbox" lay-skin="primary" title="启用" name="Notice" value="1" <?php if($zbp->Config('TztCardVip')->Notice) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">热搜关键词</label>
                    <div class="layui-input-inline w420">
                        <textarea name="HotSearchTag" rows="3" class="layui-textarea" ><?php echo $zbp->Config('TztCardVip')->HotSearchTag;?></textarea>
                        <div class="layui-form-mid layui-word-aux">多个请用|隔开</div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="HotSearch" value="0">
                        <input type="checkbox" lay-skin="primary" title="显示" name="HotSearch" value="1" <?php if($zbp->Config('TztCardVip')->HotSearch) { echo "checked"; }?>>
                        <br>
                        <input type="hidden" name="HotSearchM" value="0">
                        <input type="checkbox" lay-skin="primary" title="手机端" name="HotSearchM" value="1" <?php if($zbp->Config('TztCardVip')->HotSearchM) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">申请友链入口</label>
                    <div class="layui-input-inline" style="width: 150px;">
                        <input type="text" class="layui-input" placeholder="名称" value="<?php echo $zbp->Config('TztCardVip')->LinkMoreTit;?>" name="LinkMoreTit">
                    </div>
                    <div class="layui-input-inline" style="width: 260px;">
                        <input type="text" class="layui-input" placeholder="链接" value="<?php echo $zbp->Config('TztCardVip')->LinkMoreUrl;?>" name="LinkMoreUrl">
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="LinkMore" value="0">
                        <input type="checkbox" lay-skin="primary" title="显示" name="LinkMore" value="1" <?php if($zbp->Config('TztCardVip')->LinkMore) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">尾部扩展代码</label>
                    <div class="layui-input-inline w420">
                        <textarea name="FootSubCode" rows="5" class="layui-textarea"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->FootSubCode);?></textarea>
                        <div class="layui-form-mid layui-word-aux">可自定义写入标准代码，支持html、css、js格式</div>
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
    </fieldset>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>