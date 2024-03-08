<?php /* EL PSY CONGROO */     	  				
require '../../../../zb_system/function/c_system_admin.php';      		 	 		
$zbp->Load();         	 	
$action = 'root';         	  
$appid = 'TztCardVip';      			 	 
if (!$zbp->CheckRights($action)) {    				   	
    $zbp->ShowError(6);     		   	 
    die();     	 	 	 	
}         	 	
if (!$zbp->CheckPlugin($appid)) {    	 		 			
    $zbp->ShowError(48);     	  	   
    die();           	
}      		 			
      		 		 
$blogtitle='简约卡片主题';     	      
    	 	 		  
require $zbp->path . 'zb_system/admin/admin_header.php';    	  			  
    	  	  		
if(!$zbp->Config('TztCardVip')->ZbStyle) {    	 	   		
	require $zbp->path . 'zb_system/admin/admin_top.php';          		
}      	 			 
    		  	   
$act = GetVars("act", "GET");    	 			 		
    			 				
if ($_GET && isset($_GET['type'])) {      			   
	if ($_GET['type'] == 'post') {    				  	 
		//安全验证      		   	
		CheckIsRefererValid();        				
		foreach ($_POST as $key => $value) {     				  	
			if(is_array($value)){      		 	  
				$zbp->Config("TztCardVip")->$key = json_encode($value);    				 	 	
			}else{    		    	 
				$zbp->Config("TztCardVip")->$key = trim($value);      					 
			}    		   	 	
		}    	   				
		// 保存配置项    	   		 	
		$zbp->SaveConfig("TztCardVip");    		 	    
		$zbp->BuildTemplate();      		 			
		$zbp->SetHint('good');    		   			
		Redirect('./'.$type.'.php');    			 	   
	}     	   	 	
}    	 	   	 
if ($_GET && isset($_GET['reduction'])) {     		  			
	TztCardVip_DelModule();          		
	$zbp->DelConfig('TztCardVip');      			   
	TztCardVip_Config();    		 			 	
	$zbp->SaveConfig('TztCardVip');    	   			 
	TztCardVip_CreateModule();      	     
	Redirect('./setup.php');    		 	  		
}    	 		 			
    	 			  	
?>
<link rel="stylesheet" href="static/layui/css/layui.css?v=<?php echo $zbp->themeapp->version?>">
<link rel="stylesheet" href="static/style.css?v=<?php echo $zbp->themeapp->version?>">
<script type="text/javascript" src="static/layui/layui.js?v=<?php echo $zbp->themeapp->version?>"></script>
<script src="../script/drag-arrange.js"></script>

<div class="page-container">
	<div class="tzt-header">
		<div style="float: right;text-align: right; margin-top: 18px;">
			<p>当前版本：v<?php echo $zbp->themeapp->version?></p>
			<span class="layui-badge layui-bg-gray">Ctrl+S快捷保存</span>
		</div>
		<h3>
			<img src="../images/logo2.png" />
			
			<?php if($zbp->Config('TztCardVip')->ZbStyle) { ?>
				<a style="margin-left: 20px;" href="<?php echo $zbp->cmdurl . '?act=admin'; ?>" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon layui-icon-set"></i> 后台首页</a><a style="margin-left: 20px;" href="<?php echo $zbp->host;?>" target="_blank" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon layui-icon-home"></i> 前台首页</a>
			<?php } ?>
			<a style="margin-left: 20px;" href="javascript:;"  onclick="if(confirm('当前操作将清空您主题的所有设置，并还原至初始状态，操作不可撤销，确定要操作吗？')){location.href='?reduction=1'}" class="layui-btn layui-btn-sm layui-btn-normal"><i class="layui-icon layui-icon-delete"></i> 恢复默认</a>
		</h3>
	</div>
	<ul class="layui-nav">
		<?php TztCardVip_SubMenu() ?>
	</ul>
	<div style="padding: 10px 30px 0;">
		<?php
			if($zbp->Config('TztCardVip')->ZbStyle) {    		 	 	 	
				$zbp->GetHint();       	  	 
				foreach ($GLOBALS['hooks']['Filter_Plugin_Admin_Hint'] as $fpname => &$fpsignal) {     	  	   
					$fpname();    	  					
				}      	  			
			}      	    	
		?>
	</div>