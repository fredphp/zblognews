<?php /* EL PSY CONGROO */ 			    		    	 
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     		 	  	
$type = 'dialog';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							     			  	 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';     		 		  
if ($_POST && isset($_POST['code'])) {          		
    if(!$_POST["id"] or !$_POST["title"] or !$_POST["code"]){    	   		 	
        $zbp->SetHint('bad','id/标题/代码不能为空');    		  		  
        Redirect('./dialog.php');         	  
        exit();    						 	
    }           	
    if ($_GET && isset($_GET['type'])) {    	 	  	  
        $PostData = 'DiyDialogData';      	  	  
        if ($_GET['type'] == 'add') {            
            if($zbp->Config('TztCardVip')->HasKey($PostData)){    	  		  	
                $PostData = json_decode($zbp->Config('TztCardVip')->$PostData,true);      			 	 
            }    		 	 		 
            $PostData[] = $_POST;    					  	
            $zbp->Config('TztCardVip')->DiyDialogData = json_encode($PostData);      	 		 	
            $zbp->SaveConfig('TztCardVip');         			
            $zbp->SetHint('good','添加成功');    	  				 
            header("Refresh:0");     		 		 	
        }elseif($_GET['type'] == 'edit'){    			 	 	 
            $PostData = json_decode($zbp->Config('TztCardVip')->$PostData,true);       			  
            $editid = $_POST['editid'];           	
            unset($_POST['editid']);    			 		 	
            $PostData[$editid] =$_POST;     			  	 
            $zbp->Config('TztCardVip')->DiyDialogData = json_encode($PostData);      	   		
            $zbp->SaveConfig('TztCardVip');    		  	  	
            $zbp->SetHint('good','修改成功');    			   		
            Redirect('./dialog.php');       	 	  
        }    			  			
    }     	 	  	 
}elseif ($_GET && isset($_GET['type'])) {     			 	  
    if ($_GET['type'] == 'del') {    		 	 	 	
        $diydialogdata = json_decode($zbp->Config('TztCardVip')->DiyDialogData,true);    					   
        $editid = $_GET['id'];     				 	 
        unset($diydialogdata[$editid]);      		 			
        $zbp->Config('TztCardVip')->DiyDialogData = json_encode($diydialogdata);    	  	 			
        $zbp->SaveConfig('TztCardVip');        		  
        $zbp->SetHint('good','删除成功');     	 	  	 
        Redirect('./dialog.php');         	 	
    }       	 	  
}     		 	   
?>
<div class="layui-tab-content">
<form class="layui-form" method="post" action="?type=post" enctype="multipart/form-data">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>主题预置弹窗设置</legend>
            <div class="layui-field-box">
                <blockquote class="layui-elem-quote" style="margin: 20px 0;">
                    关闭一些未用到的弹窗可减少网站加载资源，关闭后别忘记隐藏或删除相关按钮链接哦！
                </blockquote>
                <div class="layui-row">
                    <div class="layui-col-xs6">
                        <div class="layui-form-item">
                            <label class="layui-form-label">排行榜</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="DialogRan" value="0">
                                <input type="checkbox" lay-skin="switch" name="DialogRan" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DialogRan) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs6">
                        <div class="layui-form-item">
                            <label class="layui-form-label">公告</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="DialogNotice" value="0">
                                <input type="checkbox" lay-skin="switch" name="DialogNotice" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DialogNotice) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs6">
                        <div class="layui-form-item">
                            <label class="layui-form-label">搜索栏</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="DialogSo" value="0">
                                <input type="checkbox" lay-skin="switch" name="DialogSo" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DialogSo) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs6">
                        <div class="layui-form-item">
                            <label class="layui-form-label">分类侧栏</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="DialogMenu" value="0">
                                <input type="checkbox" lay-skin="switch" name="DialogMenu" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DialogMenu) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs6">
                        <div class="layui-form-item">
                            <label class="layui-form-label">微信分享</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="DialogWx" value="0">
                                <input type="checkbox" lay-skin="switch" name="DialogWx" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DialogWx) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

    <fieldset class="layui-elem-field" style="margin-top: 30px;">
        <legend>自定义弹窗</legend>
        <div class="layui-field-box">
            <form class="layui-form" method="post" action="?type=post">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <input type="hidden" name="order" value="1">
                <div class="layui-form-item">
                    <div class="layui-form-mid layui-word-aux">启用</div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="DiyDialog" value="0">
                        <input type="checkbox" lay-skin="switch" name="DiyDialog" value="1" lay-filter="submit"<?php if($zbp->Config('TztCardVip')->DiyDialog) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">该功能一般用于碎片信息提醒，支持右侧和底部弹出内容，使用按钮事件调用</div>
                </div>
            </form>
            <form class="layui-form" method="post" action="?type=add" enctype="multipart/form-data">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <input type="hidden" name="is" value="1">
                <div class="layui-form-item">
                    <div class="layui-input-block box" style=" margin: 0 0 20px;">
                        <textarea name="code" rows="5" class="layui-textarea" placeholder="自定义内容和样式，支持html"><?php echo htmlspecialchars($zbp->Config('TztCardVip')->code);?></textarea>
                    </div>
                    <div class="layui-input-block" style="margin: 0;">
                        <div class="layui-input-inline" style="width: 150px;">
                            <input type="text" name="id" placeholder="id标识" class="layui-input">
                        </div>
                        <div class="layui-input-inline" style="width: 180px;">
                            <input type="text" name="title" placeholder="标题" class="layui-input">
                        </div>
                        <div class="layui-input-inline" style="width: 180px;">
                            <select name="class" lay-verify="required">
                                <option value="0">下划出</option>
                                <option value="1">右划出</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <button type="submit" class="layui-btn layui-btn-warm"><i class="layui-icon layui-icon-addition"></i> 添加一组</button>
                        </div>
                    </div>
                    
                </div>
            </form>
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>已添加的弹窗组</legend>
            </fieldset>
            <?php
                $diydialogdata = json_decode($zbp->Config('TztCardVip')->DiyDialogData,true);     		 	 	 
                if(is_array($diydialogdata)){     	 		   
                foreach ($diydialogdata as $key => $value) {     	  	 	 
            ?>
            <form class="layui-form" method="post" action="?type=edit" enctype="multipart/form-data">
                <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
                <div class="layui-form-item">
                    <div class="layui-input-block" style="margin: 0;">
                        <div class="layui-input-inline" style="width: 20px;">
                            <input type="hidden" name="is" value="0">
                            <input type="checkbox" lay-skin="primary" name="is" value="1" <?php if($value['is']) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: 90px;">
                            <input type="text" name="id" placeholder="id标识" class="layui-input" value="<?php echo $value['id']; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: 100px;">
                            <input type="text" name="title" placeholder="标题" class="layui-input" value="<?php echo $value['title']; ?>">
                        </div>
                        <div class="layui-input-inline" style="width: 240px;">
                            <input type="text" class="layui-input" value="javascript:tzt_dialog('Dialog<?php echo $value['id']; ?>');">
                        </div>
                        <div class="layui-input-inline" style="width: 110px;">
                            <select name="class" lay-verify="required">
                                <option value="0"<?php if($value['class']=='0') { echo "checked"; }?>>下划出</option>
                                <option value="1"<?php if($value['class']=='1') { echo "checked"; }?>>右划出</option>
                            </select>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="editid" value="<?php echo $key; ?>">
                            <button type="button" class="layui-btn layui-btn-warm btn-code"><i class="layui-icon layui-icon-fonts-code"></i></button>
                            <button type="submit" class="layui-btn layui-btn-warm"><i class="layui-icon layui-icon-edit"></i></button>
                            <button type="button" class="layui-btn layui-btn-danger" onclick="if(confirm('您确定要进行删除操作吗？')){location.href='?act=slide&type=del&id=<?php echo $key; ?>'}"><i class="layui-icon layui-icon-close"></i></button>
                        </div>
                    </div>
                    <div class="layui-input-block box" style="display: none; margin: 20px 0 0;">
                        <textarea name="code" rows="5" class="layui-textarea" placeholder="自定义内容和样式，支持html"><?php echo htmlspecialchars($value['code']);?></textarea>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
    <?php }} ?>
    
    <script>
        $('.btn-code').click(function(){
            let $_this = $(this);
            $_this.parent().parent().parent().find('.box').show();
        });
    </script>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>