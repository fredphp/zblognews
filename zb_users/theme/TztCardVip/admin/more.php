<?php /* EL PSY CONGROO */ 			    		 			  
require '../../../../zb_system/function/c_system_base.php'; 	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    	  	    
$type = 'more';	    	  			      					 		    							         		 	        	  	    							     			  		     	 	  	       	   	      		 		  	    		 		 		     			 	 	     	 	 			     	     	      		 	       	 	 	 	        		        	 		       							    			  			
require $zbp->path . 'zb_users/theme/TztCardVip/admin/header.php';      			  	
?>
<div class="layui-tab-content">
    <form class="layui-form" method="post" action="?type=post">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
            <div class="layui-row">
                <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">友情链接</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="Link" value="0">
                            <input type="checkbox" lay-skin="switch" name="Link" value="1"<?php if($zbp->Config('TztCardVip')->Link) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="LinkM" value="0">
                            <input type="checkbox" lay-skin="primary" title="手机端" name="LinkM" value="1"<?php if($zbp->Config('TztCardVip')->LinkM) { echo "checked"; }?>>
                        </div>
                    </div>
                </div>

                <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">面包屑导航</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="Bread" value="0">
                            <input type="checkbox" lay-skin="switch" name="Bread" value="1"<?php if($zbp->Config('TztCardVip')->Bread) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="BreadM" value="0">
                            <input type="checkbox" lay-skin="primary" title="手机端" name="BreadM" value="1"<?php if($zbp->Config('TztCardVip')->BreadM) { echo "checked"; }?>>
                        </div>
                    </div>
                </div>

                <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">返回顶部</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="TopUp" value="0">
                            <input type="checkbox" lay-skin="switch" name="TopUp" value="1"<?php if($zbp->Config('TztCardVip')->TopUp) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="TopUpM" value="0">
                            <input type="checkbox" lay-skin="primary" title="手机端" name="TopUpM" value="1"<?php if($zbp->Config('TztCardVip')->TopUpM) { echo "checked"; }?>>
                        </div>
                    </div>
                </div>

                <!-- <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">IP定位</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="IpJson" value="0">
                            <input type="checkbox" lay-skin="switch" name="IpJson" value="1"<?php if($zbp->Config('TztCardVip')->Link) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: 120px;">
                            <select name="IpJsonType">
                                <option value="pro"<?php if(!$zbp->Config('TztCardVip')->IpJson=='pro') { echo "selected"; }?>>省份</option>
                                <option value="city"<?php if($zbp->Config('TztCardVip')->IpJson=='city') { echo "selected"; }?>>城市</option>
                                <option value="addr"<?php if($zbp->Config('TztCardVip')->IpJson=='addr') { echo "selected"; }?>>省份+城市+运营商</option>
                            </select>
                        </div>
                    </div>
                </div> -->

                <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">程序版权标识</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="checkbox" lay-skin="switch" name="TztCody" value="1" checked="checked" disabled>
                        </div>
                        <div class="layui-form-mid layui-word-aux">尊重版权，禁止去除</div>
                    </div>
                </div>

                <div class="layui-col-xs6">
                    <div class="layui-form-item">
                        <label class="layui-form-label">主题版权标识</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="TztCody" value="0">
                            <input type="checkbox" lay-skin="switch" name="TztCody" value="1"<?php if($zbp->Config('TztCardVip')->TztCody) { echo "checked"; }?>>
                        </div>
                        <div class="layui-form-mid layui-word-aux">可关闭，推荐开启</div>
                    </div>
                </div>

                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">less调试模式</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="TztLess" value="0">
                            <input type="checkbox" lay-skin="switch" name="TztLess" value="1"<?php if($zbp->Config('TztCardVip')->TztLess) { echo "checked"; }?>>
                        </div>
                        <div class="layui-form-mid layui-word-aux">确保您了解的情况下开启，否则可能会导致样式错误，不建议正式环境使用less</div>
                    </div>
                </div>

                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">主题安全</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="ModeNo" value="0">
                            <input type="checkbox" lay-skin="primary" title="禁止调式" name="ModeNo" value="1"<?php if($zbp->Config('TztCardVip')->ModeNo) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="RightNo" value="0">
                            <input type="checkbox" lay-skin="primary" title="屏蔽右键" name="RightNo" value="1"<?php if($zbp->Config('TztCardVip')->RightNo) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="F12No" value="0">
                            <input type="checkbox" lay-skin="primary" title="禁用F12" name="F12No" value="1"<?php if($zbp->Config('TztCardVip')->F12No) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="IframeNo" value="0">
                            <input type="checkbox" lay-skin="primary" title="禁止框架引用" name="IframeNo" value="1"<?php if($zbp->Config('TztCardVip')->IframeNo) { echo "checked"; }?>>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="SelectNo" value="0">
                            <input type="checkbox" lay-skin="primary" title="禁止选择内容" name="SelectNo" value="1"<?php if($zbp->Config('TztCardVip')->SelectNo) { echo "checked"; }?>>
                        </div>
                    </div>
                </div>

                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">屏蔽右键</br>提示文字</label>
                        <div class="layui-input-inline w420">
                            <textarea name="RightNoText" rows="3" class="layui-textarea"><?php echo $zbp->Config('TztCardVip')->RightNoText;?></textarea>
                            <div class="layui-form-mid layui-word-aux">留空不启用,例如:你知道的太多啦</div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">纯净版主题后台</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="ZbStyle" value="0">
                            <input type="checkbox" lay-skin="switch" name="ZbStyle" value="1"<?php if($zbp->Config('TztCardVip')->ZbStyle) { echo "checked"; }?>>
                        </div>
                        <div class="layui-form-mid layui-word-aux">开启后会隐藏官方的侧栏及头部导航样式</div>
                    </div>
                </div>
                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">全站变灰</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="text" name="OpGreyTime" class="layui-input" value="<?php echo $zbp->Config('TztCardVip')->OpGreyTime;?>" id="laydate" placeholder="选择时间">
                            <div class="layui-form-mid layui-word-aux">无时间限制可留空</div>
                        </div>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="OpGrey" value="0">
                            <input type="checkbox" lay-skin="primary" name="OpGrey" title="启用" value="1"<?php if($zbp->Config('TztCardVip')->OpGrey) { echo "checked"; }?>>
                        </div>
                        
                    </div>
                </div>
                <div class="layui-col-xs12">
                    <div class="layui-form-item">
                        <label class="layui-form-label">卸载时删除配置信息</label>
                        <div class="layui-input-inline" style="width: auto;">
                            <input type="hidden" name="DelConfig" value="0">
                            <input type="checkbox" lay-skin="primary" name="DelConfig" value="1"<?php if($zbp->Config('TztCardVip')->DelConfig) { echo "checked"; }?>>
                        </div>
                        <div class="layui-form-mid layui-word-aux">请谨慎勾选该功能，配置信息一经删除后将无法恢复</div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button type="submit" class="layui-btn layui-btn-normal post-submit"> <i class="layui-icon layui-icon-release"></i> 确认保存</button>
                    <a href="<?php echo $zbp->host;?>" target="_back" class="layui-btn layui-btn-primary"> <i class="layui-icon layui-icon-home"></i> 打开前台</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require $zbp->path . 'zb_users/theme/TztCardVip/admin/footer.php'; ?>