<?php /* EL PSY CONGROO */ 			     	 	   	
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    		   	  
$type = 'art';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    			   	 
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';      	 	  	
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>文章列表设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">首页指定分类</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <select name="ArtListIndexId">
                            <?php echo CategorySelect('id','全部分类',$zbp->Config('TztCardVip')->ArtListIndexId);?>
                        </select>
                    </div>
                    <?php if(!$zbp->Config('TztCardVip')->ArtListIndexId) { ?>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtListIndexExclude" placeholder="过滤分类ID" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->ArtListIndexExclude; ?>">
                    </div>
                    <?php }?>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">列表样式选择</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="radio" name="ArtListStyle" value="0" title="左文右图"<?php if(!$zbp->Config('TztCardVip')->ArtListStyle) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="radio" name="ArtListStyle" value="1" title="左图右文"<?php if($zbp->Config('TztCardVip')->ArtListStyle=='1') { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="radio" name="ArtListStyle" value="2" title="无图样式"<?php if($zbp->Config('TztCardVip')->ArtListStyle=='2') { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">缩略图设置</label>
                    <div class="layui-input-inline" style="width: 120px;">
                        宽：<input type="text" name="ArtListImgThumbW" class="layui-input center" placeholder="宽" value="<?php echo $zbp->Config('TztCardVip')->ArtListImgThumbW;?>" style="width: 60px; display: inline-block;"> px
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        高：<input type="text" name="ArtListImgThumbH" class="layui-input center" placeholder="高" value="<?php echo $zbp->Config('TztCardVip')->ArtListImgThumbH;?>" style="width: 60px; display: inline-block;"> px
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtListImgThumb" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListImgThumb" value="1" title="启用" <?php if($zbp->Config('TztCardVip')->ArtListImgThumb) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">时间样式</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <select name="ArtListTime">
                            <option value="0"<?php if(!$zbp->Config('TztCardVip')->ArtListTime) { echo "selected"; }?>>友好时间</option>
                            <option value="1"<?php if($zbp->Config('TztCardVip')->ArtListTime=='1') { echo "selected"; }?>>01-01</option>
                            <option value="2"<?php if($zbp->Config('TztCardVip')->ArtListTime=='2') { echo "selected"; }?>>01-01 01:01</option>
                            <option value="3"<?php if($zbp->Config('TztCardVip')->ArtListTime=='3') { echo "selected"; }?>>1997-01-01</option>
                            <option value="4"<?php if($zbp->Config('TztCardVip')->ArtListTime=='4') { echo "selected"; }?>>1997-01-01 01:01:01</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">摘要字符</label>
                    <div class="layui-input-inline" style="width: 280px;">
                        <input name="ArtListDescNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->ArtListDescNum;?>">
                        <div class="slider" data-min="20" data-max="200"></div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="ArtListDesc" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListDesc" value="1" title="显示" <?php if($zbp->Config('TztCardVip')->ArtListDesc) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">辅助参数</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtListTag" value="0">
                        <input type="checkbox" name="ArtListTag" lay-skin="primary" title="标签" value="1"<?php if($zbp->Config('TztCardVip')->ArtListTag) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListSub1" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub1" value="1" title="栏目" <?php if($zbp->Config('TztCardVip')->ArtListSub1) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListSub2" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub2" value="1" title="作者" <?php if($zbp->Config('TztCardVip')->ArtListSub2) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListSub3" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub3" value="1" title="阅读量" <?php if($zbp->Config('TztCardVip')->ArtListSub3) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListSub4" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub4" value="1" title="评论数" <?php if($zbp->Config('TztCardVip')->ArtListSub4) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListSub5" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub5" value="1" title="时间" <?php if($zbp->Config('TztCardVip')->ArtListSub5) { echo "checked"; }?>>
                        <!-- <input type="hidden" name="ArtListSub6" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListSub6" value="1" title="位置" <?php if($zbp->Config('TztCardVip')->ArtListSub6) { echo "checked"; }?>> -->
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">翻页设置</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtListLoadAuto" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListLoadAuto" value="1" title="自动加载" <?php if($zbp->Config('TztCardVip')->ArtListLoadAuto=='true') { echo "checked"; }?>>
                        <input type="hidden" name="ArtListLoad" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListLoad" value="1" title="点击加载" <?php if($zbp->Config('TztCardVip')->ArtListLoad) { echo "checked"; }?>>
                        <input type="hidden" name="ArtListPage" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtListPage" value="1" title="手动翻页" <?php if($zbp->Config('TztCardVip')->ArtListPage) { echo "checked"; }?>>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>文章正文设置</legend>
            <div class="layui-field-box">
                
                <div class="layui-row">
                    <div class="layui-col-xs4">
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 60px;">摘要</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContDesc" value="0">
                                <input type="checkbox" name="ArtContDesc" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ArtContDesc) { echo "checked"; }?>>
                            </div>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContDescM" value="0">
                                <input type="checkbox" lay-skin="primary" name="ArtContDescM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ArtContDescM) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs4">
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 60px;">tag标签</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContTag" value="0">
                                <input type="checkbox" name="ArtContTag" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ArtContTag) { echo "checked"; }?>>
                            </div>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContTagM" value="0">
                                <input type="checkbox" lay-skin="primary" name="ArtContTagM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ArtContTagM) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-xs4">
                        <div class="layui-form-item">
                            <label class="layui-form-label" style="width: 60px;">上下篇</label>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContNext" value="0">
                                <input type="checkbox" name="ArtContNext" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ArtContNext) { echo "checked"; }?>>
                            </div>
                            <div class="layui-input-inline" style="width: auto;">
                                <input type="hidden" name="ArtContNextM" value="0">
                                <input type="checkbox" lay-skin="primary" name="ArtContNextM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ArtContNextM) { echo "checked"; }?>>
                            </div>
                        </div>
                    </div>									
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">辅助参数</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtContSub1" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContSub1" value="1" title="栏目" <?php if($zbp->Config('TztCardVip')->ArtContSub1) { echo "checked"; }?>>
                        <input type="hidden" name="ArtContSub2" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContSub2" value="1" title="作者" <?php if($zbp->Config('TztCardVip')->ArtContSub2) { echo "checked"; }?>>
                        <input type="hidden" name="ArtContSub3" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContSub3" value="1" title="阅读量" <?php if($zbp->Config('TztCardVip')->ArtContSub3) { echo "checked"; }?>>
                        <input type="hidden" name="ArtContSub4" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContSub4" value="1" title="评论数" <?php if($zbp->Config('TztCardVip')->ArtContSub4) { echo "checked"; }?>>
                        <input type="hidden" name="ArtContSub5" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContSub5" value="1" title="时间" <?php if($zbp->Config('TztCardVip')->ArtContSub5) { echo "checked"; }?>>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">分享按钮</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="ArtContShare" value="0">
                        <input type="checkbox" name="ArtContShare" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ArtContShare) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="ArtContShareM" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContShareM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ArtContShareM) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 620px; margin-top: 15px;">
                        <input type="hidden" name="Share1" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share1" value="1" title="微信" <?php if($zbp->Config('TztCardVip')->Share1) { echo "checked"; }?>>
                        <input type="hidden" name="Share2" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share2" value="1" title="QQ" <?php if($zbp->Config('TztCardVip')->Share2) { echo "checked"; }?>>
                        <input type="hidden" name="Share3" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share3" value="1" title="QQ空间" <?php if($zbp->Config('TztCardVip')->Share3) { echo "checked"; }?>>
                        <input type="hidden" name="Share4" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share4" value="1" title="微博" <?php if($zbp->Config('TztCardVip')->Share4) { echo "checked"; }?>>
                        <input type="hidden" name="Share5" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share5" value="1" title="豆瓣" <?php if($zbp->Config('TztCardVip')->Share5) { echo "checked"; }?>>
                        <input type="hidden" name="Share6" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share6" value="1" title="谷歌" <?php if($zbp->Config('TztCardVip')->Share6) { echo "checked"; }?>>
                        <input type="hidden" name="Share7" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share7" value="1" title="Linked in" <?php if($zbp->Config('TztCardVip')->Share7) { echo "checked"; }?>>
                        <input type="hidden" name="Share8" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share8" value="1" title="facebook" <?php if($zbp->Config('TztCardVip')->Share8) { echo "checked"; }?>>
                        <input type="hidden" name="Share9" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share9" value="1" title="Twitter" <?php if($zbp->Config('TztCardVip')->Share9) { echo "checked"; }?>>
                        <input type="hidden" name="Share0" value="0">
                        <input type="checkbox" lay-skin="primary" name="Share0" value="1" title="复制链接" <?php if($zbp->Config('TztCardVip')->Share0) { echo "checked"; }?>>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">评论</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="ArtComment" value="0">
                        <input type="checkbox" name="ArtComment" lay-skin="switch" value="1" <?php if($zbp->Config('TztCardVip')->ArtComment) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 160px;">
                        <select name="ArtCommentTime">
                            <option value="0"<?php if(!$zbp->Config('TztCardVip')->ArtListTime) { echo "selected"; }?>>友好时间</option>
                            <option value="1"<?php if($zbp->Config('TztCardVip')->ArtListTime=='1') { echo "selected"; }?>>01-01</option>
                            <option value="2"<?php if($zbp->Config('TztCardVip')->ArtListTime=='2') { echo "selected"; }?>>01-01 01:01</option>
                            <option value="3"<?php if($zbp->Config('TztCardVip')->ArtListTime=='3') { echo "selected"; }?>>1997-01-01</option>
                            <option value="4"<?php if($zbp->Config('TztCardVip')->ArtListTime=='4') { echo "selected"; }?>>1997-01-01 01:01:01</option>
                        </select>
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <!-- <input type="hidden" name="ArtComment1" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtComment1" value="1" title="位置" <?php if($zbp->Config('TztCardVip')->ArtComment1) { echo "checked"; }?>> -->
                        <input type="hidden" name="ArtComment2" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtComment2" value="1" title="昵称" <?php if($zbp->Config('TztCardVip')->ArtComment2) { echo "checked"; }?>>
                        <input type="hidden" name="ArtComment3" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtComment3" value="1" title="邮箱" <?php if($zbp->Config('TztCardVip')->ArtComment3) { echo "checked"; }?>>
                        <input type="hidden" name="ArtComment4" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtComment4" value="1" title="主页" <?php if($zbp->Config('TztCardVip')->ArtComment4) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">打赏设置</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="ShCode" value="0">
                        <input type="checkbox" name="ShCode" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ShCode) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline" style="width: 120px;">
                        <input type="text" name="ShCodeBtn" class="layui-input" placeholder="打赏按钮文字" value="<?php echo $zbp->Config('TztCardVip')->ShCodeBtn;?>">
                    </div>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="text" name="ShCodeImg" class="layui-input upload-input" placeholder="二维码图片" value="<?php echo $zbp->Config('TztCardVip')->ShCodeImg;?>">
                    </div>
                    <div class="layui-input-inline" style="width: 120px;">
                        <button type="button" class="layui-btn layui-btn-primary layui-upload">上传图片</button>
                    </div>
                    <div class="layui-input-inline" style="width: 80px;">
                        <input type="hidden" name="ShCodeM" value="0">
                        <input type="checkbox" lay-skin="primary" name="ShCodeM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ShCodeM) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">版权提示</label>
                    <div class="layui-input-inline w420">
                        <textarea name="ArtContCodyText" rows="3" class="layui-textarea"  placeholder=""><?php echo $zbp->Config('TztCardVip')->ArtContCodyText;?></textarea>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="ArtContCody" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContCody" value="1" title="显示" <?php if($zbp->Config('TztCardVip')->ArtContCody) { echo "checked"; }?>>
                    </div>
                    <div class="layui-input-inline">
                        <input type="hidden" name="ArtContCodyM" value="0">
                        <input type="checkbox" lay-skin="primary" name="ArtContCodyM" value="1" title="手机端" <?php if($zbp->Config('TztCardVip')->ArtContCodyM) { echo "checked"; }?>>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">图片自动添加alt</label>
                    <div class="layui-input-inline" style="width: 60px;">
                        <input type="hidden" name="ArtContImgAlt" value="0">
                        <input type="checkbox" name="ArtContImgAlt" lay-skin="switch" value="1"<?php if($zbp->Config('TztCardVip')->ArtContImgAlt) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">开启后正文内容图片均自动添加alt文章标题</div>
                </div>
                
            </div>
        </fieldset>
        <fieldset class="layui-elem-field" style="margin-top: 30px;">
            <legend>排行榜设置</legend>
            <div class="layui-field-box">
                <div class="layui-form-item">
                    <label class="layui-form-label">启用</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <input type="hidden" name="ArtRank" value="0">
                        <input type="checkbox" lay-skin="switch" name="ArtRank" value="1"<?php if($zbp->Config('TztCardVip')->ArtRank) { echo "checked"; }?>>
                    </div>
                    <div class="layui-form-mid layui-word-aux">需配合模块功能使用，设置后编辑模块或任意文章后自动生效</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">tab切换卡</label>
                    <div class="layui-input-inline" style="width: auto;">
                        <?php
                            $post_info = json_decode($zbp->Config('TztCardVip')->ArtInfoTit,true);      		 	 	
                            $list_info = json_decode($zbp->Config('TztCardVip')->ArtInfo, true);         	  
                            foreach ($list_info as $key => $info) {    	   			 
                                echo '<span class="arrange"><input type="hidden" name="ArtInfo[' . $key . ']" value="0"><input type="checkbox" lay-skin="primary" name="ArtInfo[' . $key . ']" value="1" title="' . $post_info[$key] . '"' . ($info == 1 ? ' checked' : '') . '></span>';    	   			 
                            }     			 	  
                        ?>
                    </div>
                    <div class="layui-form-mid layui-word-aux">可拖动排序，默认显示第一组</div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">热门文章</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtInfoTit[view]" class="layui-input" value="<?php echo $post_info['view'];?>">
                        <div class="layui-form-mid layui-word-aux">默认标题，建议不要过长</div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtRankHotTime" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->ArtRankHotTime;?>">
                        <div class="layui-form-mid layui-word-aux">指定天数内的阅读量文章</div>
                    </div>
                    <div class="layui-input-inline">
                        <input name="ArtRankHotNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->ArtRankHotNum;?>">
                        <div class="slider" data-min="3" data-max="20"></div>
                        <div class="layui-form-mid layui-word-aux">指定显示数量</div>
                    </div>
                    
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">热评文章</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtInfoTit[cmt]" class="layui-input" value="<?php echo $post_info['cmt'];?>">
                        <div class="layui-form-mid layui-word-aux">默认标题，建议不要过长</div>
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtRankCmtTime" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->ArtRankCmtTime;?>">
                        <div class="layui-form-mid layui-word-aux">指定天数内的热评文章</div>
                    </div>
                    <div class="layui-input-inline">
                        <input name="ArtRankCmtNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->ArtRankCmtNum;?>">
                        <div class="slider" data-min="3" data-max="20"></div>
                        <div class="layui-form-mid layui-word-aux">指定显示数量</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">推荐文章</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtInfoTit[rec]" class="layui-input" value="<?php echo $post_info['rec'];?>">
                        <div class="layui-form-mid layui-word-aux">默认标题，建议不要过长</div>
                    </div>
                    <div class="layui-input-inline" style="width: 390px;">
                        <input type="text" name="ArtRankTui" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->ArtRankTui;?>">
                        <div class="layui-form-mid layui-word-aux">请输入文章id，多个用逗号隔开</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">最新文章</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtInfoTit[new]" class="layui-input" value="<?php echo $post_info['new'];?>">
                        <div class="layui-form-mid layui-word-aux">默认标题，建议不要过长</div>
                    </div>
                    <div class="layui-input-inline" style="width: 390px;">
                        <input name="ArtRankNewNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->ArtRankNewNum;?>">
                        <div class="slider" data-min="3" data-max="20"></div>
                        <div class="layui-form-mid layui-word-aux">指定显示数量</div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">热门标签</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ArtInfoTit[tag]" class="layui-input" value="<?php echo $post_info['tag'];?>">
                        <div class="layui-form-mid layui-word-aux">默认标题，建议不要过长</div>
                    </div>
                    <div class="layui-input-inline" style="width: 390px;">
                        <input name="ArtRankTagNum" type="hidden" value="<?php echo $zbp->Config('TztCardVip')->ArtRankTagNum;?>">
                        <div class="slider" data-min="5" data-max="50"></div>
                        <div class="layui-form-mid layui-word-aux">指定显示数量</div>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="layui-form-item" style="padding-top: 20px; text-align: center;">
            <button type="submit" class="layui-btn layui-btn-normal post-submit"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
            <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
        </div>
    </form>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>