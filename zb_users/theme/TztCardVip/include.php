<?php /* EL PSY CONGROO */     	 	 		 
#注册插件    		 	   	
RegisterPlugin("TztCardVip","ActivePlugin_TztCardVip");       		 	 
      	   	 
function ActivePlugin_TztCardVip(){      	  	 	
	global $zbp;    		 	  	 
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'TztCardVip_AddMenu');    	 			 		
	if ($zbp->Config('TztCardVip')->ImgAlt) {     				 	 
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','TztCardVip_ImgAlt');    	   	 		
	}      	 		 	
    Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags','TztCardVip_SetUp');    	  			  
	Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax','TztCardVip_Cmd_Ajax');    	   	 	 
	Add_Filter_Plugin('Filter_Plugin_LargeData_Article','TztCardVip_LargeDataArticle');    	 	  			
    if ($zbp->Config('TztCardVip')->Seo && $zbp->Config('TztCardVip')->SeoDiyArt) {       	 	  
    Add_Filter_Plugin('Filter_Plugin_Edit_Response','TztCardVip_Seo_Art');     					 	
    }    	   		  
    Add_Filter_Plugin('Filter_Plugin_Edit_Response5','TztCardVip_Edit_Response');       			  
    if ($zbp->Config('TztCardVip')->Seo && $zbp->Config('TztCardVip')->SeoDiyTag) {    			 	   
    Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','TztCardVip_Seo_Tag');       			 	 
    }     		     
    if ($zbp->Config('TztCardVip')->Seo && $zbp->Config('TztCardVip')->SeoDiyCat) {     			 			
    Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','TztCardVip_Seo_Cat');    	 	 	  	
    }    		 	   	
    Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response', 'TztCardVip_Liststyle');    			  		 
    Add_Filter_Plugin('Filter_Plugin_PostModule_Succeed', 'TztCardVip_CreateModule');    		 		  	
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Succeed', 'TztCardVip_CreateModule');     		     
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Del', 'TztCardVip_CreateModule');      	  			
    Add_Filter_Plugin('Filter_Plugin_ViewList_Core','TztCardVip_ArtList');      			   
}    						 	
    	 	    	
//主题入口    	 		 			
function TztCardVip_AddMenu( & $m ) {     			  		
  global $zbp;    	  	 	  
  $m[] = MakeTopMenu( "root", "主题设置", $zbp->host . "zb_users/theme/TztCardVip/admin/setup.php", "", "topmenu_TztCardVip", "icon-grid-1x2-fill" );    	 					 
}    			 	 	 
        				
//主题导航    		   			
function TztCardVip_SubMenu()    		 				 
{     			  	 
    global $zbp;      					 
    $arySubMenu = array(    	 	  		 
        0 => array('常用设置', 'setup', false,'0','0','0'),        	   
        1 => array('基本设置', 'basic', false,'1','0','0'),    		  		 	
        7 => array('偏好设置', 'skin', false,'7','0','0'),    	 	    	
        2 => array('导航分类', 'guide', false,'2','0','0'),    	 	  	  
        3 => array('首页幻灯', 'slide', false,'3','0','0'),     	     	
        5 => array('文章设置', 'art', false,'5','0','0'),    	 		  	 
        6 => array('侧栏设置', 'side', false,'6','0','0'),    			 	   
        4 => array('SEO设置', 'seo', false,'4','0','0'),     			 	  
        99 => array('+ 更多', 'more', false,'99','0','1'),    					 		
        9 => array('广告管理', 'ad', false,'9','99','0'),      			   
        10 => array('弹窗设置', 'dialog', false,'10','99','0'),        	 		
        11 => array('其他设置', 'more', false,'11','99','0'),     					 	
            	   	  	
    );    				  	 
    foreach ($arySubMenu as $k => $v) {    	    	  
        if($v[4]=='0'){     		 	 	 
            echo '<li class="layui-nav-item">';        	   
            if($v[5]){    		 			 	
                echo '<a href="javascript:;">' . $v[0] . '</a>';     		 	   
                echo '<dl class="layui-nav-child">';       		 		
                foreach ($arySubMenu as $k => $son) {          		
                    if($son[4]==$v[3]){     			  		
                        echo '<dd><a href="' . $son[1] . '.php" ' . ($son[2] == true ? 'target="_blank"' : '') . '>' . $son[0] . '</a></dd>';    						  
                    }    	 	  			
                }     		   		
                echo '</dl>';    		 	 		 
            }else{    		 	   	
                echo '<a href="' . $v[1] . '.php" ' . ($v[2] == true ? 'target="_blank"' : '') . '>' . $v[0] . '</a>';     		 	   
            }    	 	 	  	
            echo '</li>';    	 	 		  
        }     							
    }    	  	 			
}    				 			
        	 	 
// 配置      	   	 
function TztCardVip_SetUp(&$template) {       	  	 
    global $zbp;      			 	 
    if($zbp->Config('TztCardVip')->OpGrey) {    			 		 	
        $posday = substr($zbp->Config('TztCardVip')->OpGreyTime,0,10);    	 	    	
        $today = date('Y-m-d');      			  	
        if($posday==$today || $zbp->Config('TztCardVip')->OpGreyTime==''){       		 			
            $zbp->header .= '<style type="text/css">'."\r\n".'html{-webkit-filter:grayscale(100%);filter:gray;filter:grayscale(100%);filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);}'."\r\n".'</style>'."\r\n";    	       
        }     		   		
    }     	  				
    if($zbp->Config('TztCardVip')->ImgBox) {     	  				
        $zbp->header .= ''."\r\n".'<link rel="stylesheet" href="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/script/viewer.css">';     	 		 	 
        $zbp->header .= ''."\r\n".'<script src="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/script/viewer.min.js"></script>';     		     
    }    	   		 	
    if($zbp->Config('TztCardVip')->TztLess) {     	 		 	 
        $zbp->header .= ''."\r\n".'<script src="'.$zbp->host.'zb_users/theme/'.$zbp->theme.'/script/less.js"></script>';     	 	 			
    }    	 	   	 
    if($zbp->Config('TztCardVip')->CloreDarkAuto) {      		 	  
        $nightTime = date('H');     		   	 
        if ($nightTime >= 20 || $nightTime < 6) {    					   
            $zbp->footer .= ''."\r\n".'<script>$("body").attr("data-skin","dark");</script>';      					 
        }     	    		
    }    	 	   		
}       	 	 	
    		  	   
//重构首页文章列表    	     		
function TztCardVip_ArtList(&$type,&$page,&$category,&$author,&$datetime,&$tag,&$w,&$pagebar)    	 	 	  	
{    				  		
    global $zbp;    	   		 	
    if($type == 'index' && $zbp->Config('TztCardVip')->ArtListIndexId){     		   		
        $w[]=array('=','log_CateID',$zbp->Config('TztCardVip')->ArtListIndexId);    	 		    
        $pagebar->Count = null;    				  	 
    }else if($type == 'index' && $zbp->Config('TztCardVip')->ArtListIndexExclude){    	 	 		  
        $w[] = array('NOT IN', 'log_CateID', explode(',',$zbp->Config('TztCardVip')->ArtListIndexExclude));        			 
        $pagebar->Count = null;    		 	 			
    }    	  			  
}     		  	 	
    	 	 	 		
//获取分类     		  			
function CategorySelect($id,$name,$default){     	  	  	
    global $zbp;       			 	
    $cateArray = $zbp->GetCategoryList(null,null,array('cate_Order'=>'ASC'),null,null);     							
    $s = '';      	 			 
    if($id=='url'){    	    	 	
        $s .= '<option value="#">'.$name.'</option>';      		 		 
        foreach ($cateArray as $id => $cate) {    	  			  
            $s .= '<option ' . ($default == $cate->ID ? 'selected="selected"' : '') . ' value="' . $cate->Url . '">' . $cate->SymbolName . '</option>';     		 		  
        }     		 	   
    }else{      	  		 
        $s .= '<option value="0">'.$name.'</option>';    	 		   	
        foreach ($cateArray as $id => $cate) {         		 
            $s .= '<option ' . ($default == $cate->ID ? 'selected="selected"' : '') . ' value="' . $cate->ID . '">' . $cate->SymbolName . '</option>';    			   	 
        }      				  
    }    		 	 		 
        				  		
    return $s;     				   
}    			   		
    	 	   		
//获取单页     			  	 
function PageSelect($default){    		 		 	 
    global $zbp;     	  	   
    $pageArray = $zbp->GetPageList('','',array('log_PostTime' => 'DESC'),'','');      		 		 
    $s = '';    	   			 
    foreach ($pageArray as $id => $page) {    	     	 
        $s .= '<option ' . ($default == $page->ID ? 'selected="selected"' : '') . ' value="' . $page->Url . '">' . $page->Title . '</option>';    				  		
    }    	   		 	
    return $s;    		  				
}       			 	
    				  	 
//分类Meta字段        	  	        	 	     	 				       	   	        		   	
function TztCardVip_Liststyle() {    			  		      							       				     	 	 	 		     	 	 			
    global $zbp,$cate;
	echo '
	<p>
		<span class="title">样式选择:</span>
		<br>
		<select class="edit" size="1" name="meta_liststyle" id="meta_liststyle">
			<option value="0"'.($cate->Metas->liststyle?'':' selected="selected"').'>文章样式(默认)</option>
            <option value="1"'.($cate->Metas->liststyle==1?' selected="selected"':'').'>图文样式(文章)</option>
			<option value="2"'.($cate->Metas->liststyle==2?' selected="selected"':'').'>微博列表样式</option>
		</select>
	</p>';
}    				  	 
     	 	  		
//文章自定义表单；    		 			  
function TztCardVip_Edit_Response()      						
{    	 		   	
    global $zbp,$article;      		    
    TztCardVip_CustomMeta_Response($article);    	  					
}    	   		 	
    							 
//文章自定义Meta字段       	 		 
function TztCardVip_CustomMeta_Response(&$object){    	    			    		 	 		     	  		       					       	  			      	  	   	         			    		 		 		      		  		        		 				 
    global $zbp;    		 				 
    echo "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/theme/TztCardVip/script/admin.js\"></script>";
    echo '<div class="editmod"><label for="meta_coverimg" class="editinputname">文章封面</label> <input name="meta_coverimg" id="edtTitle" placeholder="留空则默认调用正文第一张图" type="text" class="uplod_img" style="width: 60%;" value="'.$object->Metas->coverimg.'" /> <a href="javascript:;" class="btn-uplod_img" style="color: #ffffff; font-size: 14px;padding: 6px 18px 6px 18px; background: #3a6ea5;border: 1px solid #3399cc; cursor: pointer;">上传</a>
    </div>';
    echo '<div class="editmod"><label for="meta_video" class="editinputname">视频文件</label> <input type="text" name="meta_video" class="uplod_video" id="edtTitle" placeholder="视频地址" value="'.$object->Metas->video.'" style="width: 60%;"/> <a href="javascript:;" class="btn-uplod_video" style="color: #ffffff; font-size: 14px;padding: 6px 18px 6px 18px; background: #3a6ea5;border: 1px solid #3399cc; cursor: pointer;">上传</a></div>';    	 			   
    echo '<div class="editmod"><label for="meta_mp3" class="editinputname">音频文件</label> <input type="text" name="meta_mp3" class="uplod_file" id="edtTitle" placeholder="音频地址" value="'.$object->Metas->mp3.'" style="width: 60%;"/> <a href="javascript:;" class="btn-uplod_file" style="color: #ffffff; font-size: 14px;padding: 6px 18px 6px 18px; background: #3a6ea5;border: 1px solid #3399cc; cursor: pointer;">上传</a></div>';    	  	    
}    		  	 	 
    				 			
//文章seo       	  		
function TztCardVip_Seo_Art()    			 				
{	       	 		 	
	global $zbp,$article;    		 					
	echo '<div class="editmod"><label for="meta_arttitle" class="editinputname">SEO标题(主题自带)：</label><input type="text" name="meta_arttitle" id="edtTitle" placeholder="不填写则调用文章标题" value="'.htmlspecialchars($article->Metas->arttitle).'"/></div>';	    		 		 		
	echo '<div class="editmod"><label for="meta_artkeywords" class="editinputname">SEO关键词(主题自带)：</label><input type="text" name="meta_artkeywords" id="edtTitle" placeholder="不填写则调用文章标签" value="'.htmlspecialchars($article->Metas->artkeywords).'"/></div>';			 	    	  	  		    	    	 	    			   		    	   	 	 
	echo '<div class="editmod"><label for="meta_artdescription" class="editinputname">SEO描述(主题自带)：</label><div id="carea" class="editmod editmod3" style="margin: 5px 0px 0px;"><textarea name="meta_artdescription" id="editor_content" placeholder="不填写则调用文章摘要" style="height: 100px;">'.htmlspecialchars($article->Metas->artdescription).'</textarea></div></div>';     			 	  
}    	 	 	   
     		 			 
//分类seo    	 		  	 
function TztCardVip_Seo_Cat()        				
{       		 	 
	global $zbp,$cate;     				   
	echo '<p><span class="title">SEO标题(主题自带)：</span><br /><input class="edit" name="meta_catetitle" type="text" style="width: 600px;" value="'.htmlspecialchars($cate->Metas->catetitle).'"/> </p>';    	 				 	
	echo "\n";     	  	 		
	echo '<p><span class="title">SEO关键词(主题自带)：</span><br /><input class="edit" name="meta_catekeywords" type="text" style="width: 600px;" value="'.htmlspecialchars($cate->Metas->catekeywords).'"/> </p>';     		 			 
	echo "\n";    	  	 			
	echo '<p><span class="title">SEO描述(主题自带)：</span><br/><textarea name="meta_catedescription" id="edtIntro" cols="3" rows="6" style="width:600px;">'.htmlspecialchars($cate->Metas->catedescription).'</textarea></p>';    	   	 		
}     	 		   
    	  			 	
//标签seo     		 		  
function TztCardVip_Seo_Tag()      	  	 	
{     			  		
	global $zbp,$tag;    		 	   	
	echo '<p><span class="title">SEO标题(主题自带)：</span><br /><input name="meta_tagtitle" class="edit" type="text" style="width: 600px;" value="'.htmlspecialchars($tag->Metas->tagtitle).'"/> </p>';      	   	 
	echo "\n";          	 
	echo '<p><span class="title">SEO关键词(主题自带)：</span><br /><input name="meta_tagkeywords" class="edit" type="text" style="width: 600px;" value="'.htmlspecialchars($tag->Metas->tagkeywords).'"/> </p>';    	   		  
	echo "\n";	 	    		   	 	       		  	      		 	 	
	echo '<p><span class="title">SEO描述(主题自带)：</span><br/><textarea name="meta_tagdescription" id="edtIntro" cols="3" rows="6" style="width: 600px;">'.htmlspecialchars($tag->Metas->tagdescription).'</textarea></p>';     		  			
}    		  	   
     		   		
function TztCardVip_CreateModule()    			  	 	
{    	  		   
    global $zbp;     		  	 	
    //刷新浏览总量      	 				
    $all_views = ($zbp->option['ZC_LARGE_DATA'] == true || $zbp->option['ZC_VIEWNUMS_TURNOFF'] == true) ? 0 : GetValueInArrayByCurrent($zbp->db->Query('SELECT SUM(log_ViewNums) AS num FROM ' . $GLOBALS['table']['Post']), 'num');    	       
    $zbp->cache->all_view_nums = $all_views;    	       
    $zbp->SaveCache();    		 	  		
    $module_list = array(      	 	   
        array("tztcardvip_hotviewarticle", "view", "ul", "热门阅读","0"),      	 	   
        array("tztcardvip_hotcmtarticle", "cmt", "ul", "热评文章","0"),     	    		
        array("tztcardvip_newarticle", "new", "ul", "最新文章","0"),    	   		 	
        array("tztcardvip_recarticle", "rec", "ul", "推荐阅读","0"),      	 		 	
        array("tztcardvip_hottags", "tag", "div", "热门标签","0"),     	 	 	  
    );     		     
    $module_filenames = array();    		 		 		
    foreach ($module_list as $item) {      		 	 	
        array_push($module_filenames, $item[0]);    		  	   
    }     			    
    $modules = $zbp->GetModuleList(array("*"), array(    			 		 	
        array("IN", "mod_FileName", $module_filenames),    		  			 
    ));    		      
    $has_modules = array();     						 
    foreach ($modules as $item) {     	  	 		
        $item->Content = TztCardVip_SideContent($item);      	 				
        $item->Save();     		  	  
        //$zbp->AddBuildModule($item->FileName);    	  	 		 
        array_push($has_modules, $item->FileName);    	 				 	
    }     	   		 
    foreach ($module_filenames as $k => $item) {    	     	 
        if (!array_search($item, $has_modules)) {        		  
            $module = $module_list[$k];     					 	
            $t = new Module();    			  			
            $t->Name = $module[3];    		 			 	
            $t->IsHideTitle = $module[4];    	    	  
            $t->FileName = $module[0];    	 		   	
            $t->Source = "theme_TztCardVip";     			 			
            $t->SidebarID = 0;     	 			  
            $t->Content = TztCardVip_SideContent($t);      	  	 	
            $t->HtmlID = $module[1];    		 	    
            $t->Type = $module[2];     	 	 	  
            $t->Save();      		  		
        }       		 		
    }    			  		 
}    					 		
    	 	 		  
//卸载主题时判断是否删除自定义模块    			    	
function TztCardVip_DelModule()    	  		 	 
{    	 		 	  
    global $zbp;      	  		 
    $modules = array('tztcardvip_hotviewarticle', 'tztcardvip_hotcmtarticle', 'tztcardvip_newarticle', 'tztcardvip_recarticle', 'tztcardvip_hottags');        	   
    $w = array();     		   	 
    $w[] = array('IN', 'mod_FileName', $modules);    		      
    $modules = $zbp->GetModuleList(array('*'),$w);        				
    foreach ($modules as $item) {    	   	 		
        $item->Del();     		   	 
    }    		 	  	 
}    	 	 			 
    	  	   	
//模块内容     	  	   
function TztCardVip_SideContent(&$module)       	   	
{    	 		    
    global $zbp;        	 	 
    $str = "";    		  	 		
    switch ($module->FileName) {      	 	 		
        case 'tztcardvip_hotviewarticle':     	 		 		
            $viewArtList = TztCardVip_GetHotArticleList($zbp->Config('TztCardVip')->ArtRankHotNum, "view");    		 	    
            $viewArtList = array_combine(range(1, count($viewArtList)), $viewArtList);     		   		
            foreach ($viewArtList as $key=>$item) {    	  	   	
                $str .= '<li>';    	 	  	  
                if($item->Title=='未命名'){      			  	
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.TztCardVip_TransferHTML($item->Content).'">'.TztCardVip_TransferHTML($item->Content).'</a>';    	  	   	
                }else{     						 
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.$item->Title.'">'.$item->Title.'</a>';     	 	   	
                }    		   	  
                $str .= '</li>';     	 	  	 
            }    			    	
        break;     			 	 	
        case 'tztcardvip_hotcmtarticle':    	  				 
            $cmtArtList = TztCardVip_GetHotArticleList($zbp->Config('TztCardVip')->ArtRankCmtNum, "cmt");     	 			  
            $cmtArtList = array_combine(range(1, count($cmtArtList)), $cmtArtList);    		 					
            foreach ($cmtArtList as $key=>$item) {    		 		   
                $str .= '<li>';         	 	 	  
                if($item->Title=='未命名'){    		   	  
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.TztCardVip_TransferHTML($item->Content).'">'.TztCardVip_TransferHTML($item->Content).'</a>';    	 	   		
                }else{      	     
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.$item->Title.'">'.$item->Title.'</a>';      	  		 
                }      	 	   
                $str .= '</li>';    			   		
            }         		 
        break;         	  
        case 'tztcardvip_newarticle':     			    
            $newArtList = GetList($zbp->Config('TztCardVip')->ArtRankNewNum);        	   
            foreach ($newArtList as $key=>$item) {     	 	 		 
                $str .= '<li>';    	     	 
                if($item->Title=='未命名'){         	  
                    $str .= '<span class="key">●</span><a href="'.$item->Url.'" title="'.TztCardVip_TransferHTML($item->Content).'">'.TztCardVip_TransferHTML($item->Content).'</a>';    	 	 	  	
                }else{    			 			 
                    $str .= '<span class="key">●</span><a href="'.$item->Url.'" title="'.$item->Title.'">'.$item->Title.'</a>';    		 	  		
                }     		   		
                $str .= '</li>';      		   	
            }    			  		 
        break;    	  	   	
        case 'tztcardvip_recarticle':     			 		 
            $tuiArtList = TztCardVip_GetRecArticle();    		 	 	 	
            $tuiArtList = array_combine(range(1, count($tuiArtList)), $tuiArtList);     			 				
            foreach ($tuiArtList as $key=>$item) {    			    	
                $str .= '<li>';      	   		
                if($item->Title=='未命名'){      	 				
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.TztCardVip_TransferHTML($item->Content).'">'.TztCardVip_TransferHTML($item->Content).'</a>';    		      
                }else{           	
                    $str .= '<span class="key">'.$key.'</span><a href="'.$item->Url.'" title="'.$item->Title.'">'.$item->Title.'</a>';     		     
                }    			    	
                $str .= '</li>';      		  	 
            }    	    		 
        break;       	  	 
        case 'tztcardvip_hottags':    	 	   		
            $hotTagList = TztCardVip_HotTags($zbp->Config('TztCardVip')->ArtRankTagNum);    			 	 		
            foreach ($hotTagList as $item) {               	  				
                $str .= '<a href="'.$item->Url.'" title="'.$item->Name.'">'.$item->Name.'</a>';    			 			 
            }    	 		 			
        break;    	 		    
    }     	  	   
    return $str;    		  	   
}    				 		 
       				 
//热门文章&热评文章     	 	  	 
function TztCardVip_GetHotArticleList($num, $type = "view")      		  		
{    	  	    
    global $zbp;    	  	 		 
    if ($type == "cmt") {    	 				  
        $time = $zbp->Config('TztCardVip')->ArtRankCmtTime;    	       
    } else {     	 		 		
        $time = $zbp->Config('TztCardVip')->ArtRankHotTime;    	    			
    }    	  	  		
    if (empty($time)) {    	 	    	
        $time = 90 * 10;    		   			
    }    	   				
    $time = time() - $time * 24 * 60 * 60;    			  	  
    $w = array();      	     
    $w[] = array("=", "log_Type", "0");      	 	 	 
    $w[] = array("=", "log_Status", "0");       		   
    $w[] = array(">", "log_PostTime", $time);    		 			  
    if ($type == "view") {    				 	  
        $order = array("log_ViewNums" => "DESC");      		   	
    } else {    	 						
        $order = array("log_CommNums" => "DESC");    	 	  	 	
    }      	  	  
    $articles = $zbp->GetArticleList(array('*'), $w, $order, array($num));        	 		
    return $articles;            
}     	  				
     	 	  		
    	 			  	
//推荐阅读     		 	 	 
function TztCardVip_GetRecArticle()    	 		   	
{      	  	 	
    global $zbp;     	 				 
    $w = array();     		 		  
    $w[] = array("=", "log_Type", "0");    	 		 	  
    $w[] = array("=", "log_Status", "0");    	    	 	
    $ids = $zbp->Config('TztCardVip')->ArtRankTui;    		 		 	 
    $ids = explode(",", $ids);     				  	
    $w[] = array("IN", "log_ID", $ids);    		   		 
    $list = $zbp->GetArticleList(array('*'), $w);      	 		  
    $articles = array();         		 
    foreach ($ids as $item) {    			 	 		
        $articles[] = $zbp->GetPostByID($item);    	 	 	 	 
    }    	    	 	
    return $articles;    		 			  
}    	 			 	 
    	  	 			
//热门标签    			 		 	
function TztCardVip_HotTags($num){     		 	 		
	global $zbp;    	 	 				
	$articles = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($num),'');	     	 				 
	return $articles;    		  	 	 
}    	  		 	 
     	 	    
//处理文本    	  	 		 
function TztCardVip_TransferHTML($conent,$num='60'){    	 	     
	global $zbp;      	  		 
	$articles = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($conent,'[nohtml]'),60)));	    	 	   		
	return $articles;    			 	 		
}    		 	 		 
      			 	 
//友好时间     	 				 
function TztCardVip_TimeAgo($ptime, $val)     				 		
{       				 
  global $zbp;     		 				
    if ($val == '0') {     	  	   
        $ptime = strtotime($ptime);      					 
        $etime = time() - $ptime;    		 		 	 
        if ($etime < 1) {    		 	  	 
            return '刚刚';    		 	 			
        }    			 		  
        $interval = array(     				 	 
            12 * 30 * 24 * 60 * 60  => '年前',    			    	
            30 * 24 * 60 * 60       => '个月前',        	   
            7 * 24 * 60 * 60        => '周前',    	 	 		 	
            24 * 60 * 60            => '天前',        	 	 
            60 * 60                 => '小时前',       	 		 
            60                      => '分钟前',    			 		  
            1                       => '秒前',    							 
        );    	  	 	 	
        foreach ($interval as $secs => $str) {     	  		  
            $d = $etime / $secs;    	 			  	
            if ($d >= 1) {    				 	 	
                $r = round($d);    			  	 	
                return $r . $str;      	  			
            }    					 	 
        }     	  	 		
	} else {    			 	 		
		$ptime = strtotime($ptime);    		  		 	
		if ($val == '3'){       				 
			$etime = date('Y-m-d', $ptime);    			  	  
		}elseif($val == '2'){     		   	 
			$etime = date('m-d H:i', $ptime);       		   
		}elseif ($val == '1'){    	  			  
			$etime = date('m-d', $ptime);     		 	   
		}else{          	 
			$etime = date('Y-m-d H:i:s', $ptime);     	 			  
		}       				 
		return $etime;     	   		 
	}        	 		
}    	   				
    		 					
// 处理alt        	   
function TztCardVip_ImgAlt(&$template) {    			 				
	$article = $template->Gettags('article');    		 	    
	$images = "/<img[^>]+src=\"(?<url>[^\"]+)\"[^>]*>/";     				 		
	preg_match_all('/alt="(.*?)"/',$article->Content,$img_array);    		   	  
	if($img_array){      	 		 	
	    foreach($img_array[1] as $val){    		 		  	
	        $article->Content = str_replace('alt="' . $val . '" title="' . $val . '"', '', $article->Content);    	 			   
		}    	 		 	  
	}      	    	
	$change = '<img src="$1" alt="'.$article->Title.'" title="'.$article->Title.'">';     		   	 
	$content = preg_replace($images, $change, $article->Content);     	 			  
	$article->Content = $content;     		 		  
	$template->SetTags('article', $article);    	 		 	 	
}      		  	 
    	 	 		  
//列表    		 		   
function TztCardVip_LargeDataArticle($select, $w, &$order, $limit, $option, $type='')    	 	  	 	
{    		 	 	 	
    global $zbp;     		  			
    switch($type){    								
        case 'category':    						 	
            $pagebar = $option['pagebar'];    	 	 		 	
            $sort = GetVars('sort','GET') ? 'ASC' : 'DESC';       	 		 
            switch($o = GetVars('order','GET')){           	
				case 'updatetime':    		 					
                    $order = array('log_UpdateTime' => $sort);    	  		  	
                    break;        	  	
                case 'hits':     	 				 
                    $order = array('log_ViewNums' => $sort);    	 		 	 	
                    break;      				  
                case 'comments':    	 			 	 
                    $order = array('log_CommNums' => $sort);      	 				
                    break;     	 				 
                case 'inputtime':    		 		 	 
                default:    	   	   
                    $order = array('log_PostTime' => $sort);    		     	
                    $sort == 'DESC' && $o = null;     	 				 
                    break;      	 	 		
            }    	 	 	 	 
            if ($o){     	 	 			
                $pagebar->UrlRule->__construct($zbp->option['ZC_CATEGORY_REGEX'] .($zbp->Config('system')->ZC_STATIC_MODE != 'REWRITE' ? '&' : '?'). 'order={%order%}&sort={%sort%}');     			 	 	
                $pagebar->UrlRule->Rules['{%order%}'] = $o;    		 	   	
                $pagebar->UrlRule->Rules['{%sort%}'] = (int)GetVars('sort','GET');    	 	 		  
            }    					   
            break;      		  		
    }     					 	
}     	 	  	 
    		 		  	
//上传     		     
function TztCardVip_Cmd_Ajax($src){     			  		
    global $zbp;    	 		  	 
    if ($src == 'TztCardVip_upload'){      		    
        if (!$zbp->CheckRights('UploadPst')) {    	 	  			
            $zbp->ShowError(6);    				    
        }    	 	  		 
        Add_Filter_Plugin('Filter_Plugin_Upload_SaveFile','TztCardVip_Upload_SaveFile_Ajax');    	 	 		 	
        $_POST['auto_rename'] = 1;    			 			 
        PostUpload();      		   	
        echo json_encode(array('url' => $GLOBALS['tmp_ul']->Url));     		  		 
        exit;     				 		
    }      			 	 
}    	  	 		 
function TztCardVip_Upload_SaveFile_Ajax($tmp, $ul){    		  	  	
    $GLOBALS['tmp_ul'] = $ul;            
}    				    
      	  	 	
// 缩略图    	 		 	  
function TztCardVip_Thumb($article, $key, $w='' ,$h='') {     					 	
    global $zbp;    		    	 
    if(!$w){     			 		 
        $w = $zbp->Config('TztCardVip')->ArtListImgThumbW;    		 			 	
        $h = $zbp->Config('TztCardVip')->ArtListImgThumbH;     		 			 
    }    		 			 	
    if ($zbp->Config('TztCardVip')->ArtListImgThumb) {       	  	 
        $Thumb = $article->Thumbs( $w, $h, 6);       		 	 
        $img = $Thumb[$key];     					 	
    } else {    	 	 		 	
        $img = $article->AllImages[$key];    			 	  	
    }    				 		 
    return $img;    								
}     				  	
    		   			
//默认配置    	 	 		 	
function TztCardVip_Config()    	 	   		
{    		    	 
    global $zbp;      	  			
    $array = array(     		   		
        'Header' => '1',       	 	  
        'HeaderFixed' => '1',    	   	 	 
        'MainWidth' => '1024',    	   		 	
        'MainColorVal' => '#ff616d',     	  			 
        'CloreDark' => '0',    			  		 
        'Logo' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/logo.png',     	 		   
        'Favicon' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/favicon.ico',     	   			
        'HotSearch' => '1',    	 	  	 	
        'HotSearchTag' => '热搜1|热搜2|热搜3|热搜4|热搜5',    		   			
        'HotSearchM' => '1',        	 		
        'Notice' => '1',     	 		 		
        'NoticeBtn' => '我已知晓',        	   
        'NoticeCode' => '<div style="padding: 30px;text-align: center;"><h2>这是一条通知或公告消息</h2><h3>它可以在-主题后台》常用设置》最新公告-编辑</h3><h4>它同样也支持html代码</h4><p><a class="text-link" href="#">这是一个链接 ></a></p></div>',    	 		   	
        'LinkMore' => '1',        	 	 
        'LinkMoreTit' => '+申请友链(PR>1)',     	   	  
        'LinkMoreUrl' => '{#ZC_BLOG_HOST#}',     			 	 	
        'FootTips' => '1',     		 	  	
        'FootTipsM' => '1',    	       
        'FootTipsText' => '本网站内容只用于学习和交流，如有内容侵犯您的权益请联系我们删除。',     				 	 
        'Icp' => '京ICP备-20088888号',     		  	  
        'Slide' => '1',      	    	
        'SlideAuto' => '1',     	 		  	
        'SlideNav' => '1',    					 		
        'SlidePage' => '1',      	     
        'SlideData' => '[{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/banner/top.jpg","title":"幻灯1","url":"'.$zbp->host.'","blank":""},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/banner/top2.jpg","title":"幻灯2","url":"'.$zbp->host.'","blank":""},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/banner/top3.jpg","title":"幻灯3","url":"'.$zbp->host.'","blank":""},{"is":"0","img":"","title":"","url":"","blank":""},{"is":"0","img":"","title":"","url":"","blank":""}]',      	  	  
        'SkinImg' => '1',    				    
        'SkinImgData' => '[{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/01.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/07.jpg","title":"风格-1","title2":"风格-1"},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/02.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/08.jpg","title":"风格-2","title2":"风格-2"},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/03.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/09.jpg","title":"风格-3","title2":"风格-3"},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/04.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/10.jpg","title":"风格-4","title2":"风格-4"},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/05.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/11.jpg","title":"风格-5","title2":"风格-5"},{"is":"1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/06.jpg","img2":"'.$zbp->host.'zb_users/theme/TztCardVip/images/bg/12.jpg","title":"风格-6","title2":"风格-6"}]',     			  	 
        'SkinColor' => '1',    	 			 		
        'SkinColorData' => '[{"is":"1","title":"风格-1","val1":"rgb(253, 223, 223)","val2":"rgb(252, 240, 228)"},{"is":"1","title":"风格-2","val1":"rgb(255, 161, 182)","val2":"rgb(155, 120, 217)"},{"is":"1","title":"风格-3","val1":"rgb(248, 177, 149)","val2":"rgb(246, 114, 128)"},{"is":"1","title":"风格-4","val1":"rgb(253, 237, 236)","val2":"rgb(197, 198, 208)"},{"is":"1","title":"风格-5","val1":"rgb(142, 238, 212)","val2":"rgb(86, 118, 237)"}]',      	 		  
        'IdenxTabs' => '1',     		 				
        'IdenxTabsM' => '1',    		   			
        'IdenxTabsData' => '[{"is":"1","title":"分类1","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/nav/01.png","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"分类2","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/nav/02.png","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"分类3","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/nav/03.png","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"分类4","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/nav/04.png","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"分类5","img":"'.$zbp->host.'zb_users/theme/TztCardVip/images/nav/05.png","url":"'.$zbp->host.'","blank":""}]',     		 	   
        'TabBarM' => '1',    	     		
        'TabbarData' => '[{"is":"1","title":"首页","icon":"icon icon-home","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"排行榜","icon":"icon icon-ranking","url":"javascript:tzt_dialog(\'DialogRank\');","blank":""},{"is":"1","title":"分类","icon":"icon icon-menu","url":"javascript:tzt_dialog(\'DialogType\');","blank":""},{"is":"1","title":"搜索","icon":"icon icon-search","url":"javascript:tzt_dialog(\'DialogSearch\');","blank":""},{"is":"0","title":"我的","icon":"icon icon-user","url":"'.$zbp->host.'","blank":""}]',      	   	 
        'HeaderLeft' => '1',        	   
        'HeaderLeftM' => '1',    			     
        'HeaderLeftData' => '[{"is":"1","ism":"1","title":"首页","icon":"icon icon-home","url":"'.$zbp->host.'"},{"is":"1","ism":"0","title":"排行榜","icon":"icon icon-ranking","url":"javascript:tzt_dialog(\'DialogRank\');"},{"is":"0","ism":"0","title":"","icon":"","url":""},{"is":"0","ism":"0","title":"","icon":"","url":""},{"is":"0","ism":"0","title":"","icon":"","url":""}]',     			   	
        'HeaderRight' => '1',    		 				 
        'HeaderRightM' => '1',     		  			
        'HeaderRightData' => '[{"is":"1","ism":"1","title":"公告","icon":"icon icon-notices","url":"javascript:tzt_dialog(\'DialogNotices\');"},{"is":"1","ism":"0","title":"搜索","icon":"icon icon-search","url":"javascript:tzt_dialog(\'DialogSearch\');"},{"is":"1","ism":"1","title":"夜间","icon":"skin icon icon-moon","url":"javascript:tzt_night();"},{"is":"1","ism":"1","title":"分类","icon":"icon icon-menu","url":"javascript:tzt_dialog(\'DialogType\');"},{"is":"0","ism":"0","title":"","icon":"","url":""}]',    	 	    	
        'HeaderBgColor' => 'rgb(242, 106, 106)',    	 	 			 
        'HeaderBgColor2' => 'rgb(94, 134, 245)',      	 	 	 
        'HeaderRightUser' => '1',    		    	 
        'FootLink' => '1',    		 	  	 
        'FootLinkM' => '1',          		
        'FootLinkData' => '[{"is":"1","title":"关于我们","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"联系我们","url":"'.$zbp->host.'","blank":""},{"is":"1","title":"收藏本站","url":"'.$zbp->host.'","blank":""},{"is":"0","title":"标题","url":"'.$zbp->host.'","blank":""},{"is":"0","title":"标题","url":"'.$zbp->host.'","blank":""}]',    		  	 		
        'FootRightLink' => '1',     	  			 
        'FootRightLinkM' => '1',     	 			  
        'FootRightData' => '[{"is":"1","ism":"1","title":"微信","icon":"icon icon-weixin","url":"javascript:tzt_dialog(\'DialogWeixin\');"},{"is":"1","ism":"1","title":"意见反馈","icon":"icon icon-opinion","url":"?id=2"},{"is":"1","ism":"1","title":"换肤","icon":"icon icon-theme","url":"javascript:tzt_dialog(\'DialogBg\');"},{"is":"0","ism":"0","title":"","icon":"","url":""},{"is":"0","ism":"0","title":"","icon":"","url":""}]',     	     	
        'Seo' => '1',      	  			
        'SiteTitle' => $zbp->name,    			 		  
        'SiteSubTitle' => '最强开源博客系统',    	   	  	
        'SiteKeyWords' => 'zblog,博客,开源',    		    		
        'SiteDescriPtion' => '最强开源zblog博客系统',     			 	 	
        'SeoLine' => '-',      	  		 
        'ArtRank' => '1',    	 	 		  
        'ArtRankR' => '1',    					  	
        'ArtRankNav1' => '1',       		 	 
        'ArtRankNav2' => '1',      			 	 
        'ArtRankNav3' => '1',       	 	 	
        'ArtRankNav4' => '1',     		 	  	
        'ArtRankNav5' => '1',    	  				 
        'ArtRankHotTime' => '100',    	  				 
        'ArtRankCmtTime' => '100',      	  			
        'ArtRankNewNum' => '10',     		   		
        'ArtRankTagNum' => '20',     	 		   
        'ArtRankCmtNum' => '10',       	 	  
        'ArtRankHotNum' => '10',      		 			
        'ArtRankNav' => '{"view":"1","cmt":"1","new":"1","rec":"0","tag":"1"}',    		   			
        'ArtRankNavBtn' => '{"view":"热门","cmt":"热评","new":"最新","rec":"推荐","tag":"标签"}',     	  	  	
        'ArtListStyle' => '0',    		 		 	 
        'ArtListTime' => '0',       			  
        'ArtListDescNum' => '60',      				 	
        'ArtListDesc' => '1',        			 
        'ArtListImgThumb' => '1',     	  	 	 
        'ArtListImgThumbW' => '280',    	       
        'ArtListImgThumbH' => '280',     	 		 	 
        'ArtInfo' => '{"view":"1","cmt":"1","new":"1","rec":"0","tag":"1"}',    						 	
        'ArtInfoTit' => '{"view":"热门","cmt":"热评","new":"最新","rec":"推荐","tag":"标签"}',       		 	 
        'ArtListTag' => '1',     		 	 		
        'ArtListSub1' => '1',      		    
        'ArtListSub4' => '1',      	  		 
        'ArtListSub5' => '1',    	  					
        'ArtListSub6' => '1',    		  				
        'ArtListLoad' => '1',    		 	 	 	
        'ArtContSub1' => '1',    			   		
        'ArtContSub2' => '1',      				  
        'ArtContSub3' => '1',    		  	 		
        'ArtContSub4' => '1',        				
        'ArtContSub5' => '1',       	 		 
        'ArtContDesc' => '1',     			  		
        'ArtContTag' => '1',    				  		
        'ArtContNext' => '1',    		 	 		 
        'ArtContShare' => '1',    			  			
        'ArtContCody' => '1',     	   	  
        'ArtContCodyM' => '1',    	  	 			
        'ArtContCodyText' => '此文版权归原作者所有，若有来源错误或者侵犯您的合法权益，您可通过邮箱与我们取得联系，我们将及时进行处理。',     	      
        'ArtComment' => '1',      	 		  
        'ArtComment1' => '1',    	 			 		
        'ArtCommentTime' => '0',         		 
        'Share0' => '1',        	 	 
        'Share1' => '1',    					  	
        'Share2' => '1',    		 	    
        'Share3' => '1',     	  		  
        'Share4' => '1',      		 	 	
        'Share5' => '1',    	 	 	 		
        'ImgBox' => '1',    	      	
        'ImgBox1' => 'false',    		 		  	
        'ImgBox2' => 'true',    			 		  
        'ImgBox3' => 'false',       				 
        'SideQrCode' => '1',    		  	   
        'SideQrCodeText' => '手机扫一扫访问本站点',       			 	
        'SideQrCodeImg' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/qrcode.jpg',     	   	 	
        'ShCodeBtn' => '打赏作者',     	 	 	 	
        'ShCodeImg' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/paycode.png',    						  
        'ShCodeText' => '您的支持是我们最大的动力',    		  			 
        'DiyDialog' => '1',      	 			 
        'DiyDialogData' => '[{"is":"1","order":"1","title":"关注微信","id":"Weixin","class":"0","code":"<div class=\'text-center\'><p><img src=\'{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/qrcode.jpg\' alt=\'关注微信\'></p><p>微信扫一扫关注我们</p></div>"}]',        			 
        'DialogRan' => '1',     	 			  
        'DialogNotice' => '1',    			 	   
        'DialogSo' => '1',    	 			   
        'DialogMenu' => '1',     				 		
        'DialogWx' => '1',    			   		
        'HeaderFixed' => '1',      	  			
        'HeaderRightUserLoginTit' => '我的',     	    	 
        'Skin' => '1',     						 
        'HomeBtn' => '1',    			 				
        'SoBtn' => '1',    	       
        'Link' => '1',        		  
        'Bread' => '1',     		 	 	 
        'TopUp' => '1',    			   	 
        'TopUpM' => '1',       	 	 	
        'TztCody' => '1',    	 		  	 
        'ZbStyle' => '1',      		  	 
        'Ad' => '1',     			   	
        'AdList' => '1',     	  	 	 
        'AdListNum' => '5',     				 		
        'AdListUrl' => '{#ZC_BLOG_HOST#}',     		 	 	 
        'AdListImg' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/ad.jpg',    			 		  
        'AdFoot' => '1',    		   	 	
        'AdFootUrl' => '{#ZC_BLOG_HOST#}',     	 			  
        'AdFootImg' => '{#ZC_BLOG_HOST#}zb_users/theme/TztCardVip/images/ad.jpg',    		 		   
        'ModeNo' => '1',    		      
        'IpJson' => '1',     			 	 	
        'IpJsonType' => 'pro',    								
        'WebSide' => '1',    	   				
        'WebSideWidth' => '260',    	 				 	
        'WebSideLayout' => '1',         		 
        'SideNavCate' => '1',        	 		
        'SideNavId' => '0',     				   	
        'SideNavIdN' => '1,2,3,4,5',    	  				 
        'SideNavData' => '[{"is":"1","title":"分享","icon":"icon icon-share","url":"#"},{"is":"0","title":"","icon":"","url":""},{"is":"0","title":"","icon":"","url":""},{"is":"0","title":"","icon":"","url":""},{"is":"0","title":"","icon":"","url":""}]',      			 	 
        'SideTagTitle' => '标签云',    		 				 
        'SideTagNum' => '10',    		 		 	 
    );    	  			 	
    foreach ($array as $value => $intro) {     	 	 			
        $zbp->Config('TztCardVip')->$value = $intro;    			 		  
    }      			 	 
}      			 		
    	 						
//启用     	 	 	  
function InstallPlugin_TztCardVip()    	 	     
{    	  	 	 	
    global $zbp;      	 	   
    if (!$zbp->Config('TztCardVip')->HasKey('Version')) {    		  	 	 
        TztCardVip_Config();    				 			
    }    		 					
    $zbp->Config('TztCardVip')->Version = '1.0';     	 	  	 
    $zbp->SaveConfig('TztCardVip');        				
    TztCardVip_CreateModule();     	 	    
}     	 			  
     	  		  
//升级    						 	
function UpdatePlugin_TztCardVip()    	  	 	 	
{          		
    global $zbp;    	 	 		  
    $version = $zbp->Config('TztCardVip')->Version;     	  			 
    if($version !== 1.0){     						 
        $zbp->Config('TztCardVip')->Version = '1.0';           	
        $zbp->SaveConfig('TztCardVip');    			 		  
    }    			   	 
    if(!$zbp->Config('TztCardVip')->Haskey("Version")){     					  
        $zbp->Config('TztCardVip')->Version = '1.0';    	  		  	
        $zbp->SaveConfig('TztCardVip');    				 	  
    }      	 	 	 
}     							
     	  	 	 
//卸载    				 	 	
function UninstallPlugin_TztCardVip()            
{     	 			 	
    global $zbp;      	   	 
    if ($zbp->Config('TztCardVip')->DelConfig) {    				 		 
        $zbp->DelConfig('TztCardVip');       		  	
    }    						  
    TztCardVip_DelModule();    					  	
}     	  	 	 
    		 	 		 