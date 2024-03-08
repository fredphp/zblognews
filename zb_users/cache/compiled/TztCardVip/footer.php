<?php  /* Template Name:公共底部 */  ?>
<?php if ($zbp->Config('TztCardVip')->WebSide && !zbp_is_mobile()) { ?>
<aside class="tzt-sidebar">
	<div class="page-box">
		<div class="tzt-sidebar-box">
			<?php if ($zbp->Config('TztCardVip')->SideNav) { ?>
			<div class="tzt-panel">
				<div class="tzt-panel_bd">
					<ul class="tzt-sidebar_nav">
						<li>
							<a<?php if ($type=='index') { ?> class="active"<?php } ?> href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">
								<i class="icon icon-home"></i> 首页
							</a>
						</li>
						<?php if ($zbp->Config('TztCardVip')->SideNavCate) { ?>
							<?php if ($zbp->Config('TztCardVip')->SideNavId=='3') { ?>
								<?php  foreach ( explode(',',$zbp->Config('TztCardVip')->SideNavIdN) as $key => $cate2) { ?>
									<?php  foreach ( $zbp->GetCategoryList(null,[array('=','cate_ID',$cate2)],array('cate_Order'=>'ASC'),null,null) as $key => $cate) { ?>
									<li>
										<a<?php if ($type=='category' && $cate->ID == $category->ID) { ?> class="active"<?php } ?> href="<?php  echo $cate->Url;  ?>" title="<?php  echo $cate->Name;  ?>">
											<?php  echo $cate->Name;  ?>
										</a>
									</li>
									<?php }   ?>
								<?php }   ?>
							<?php }else{  ?>
								<?php 
									if($zbp->Config('TztCardVip')->SideNavId){
										$catelist = $zbp->GetCategoryList(null,[array('<>','cate_RootID',0)],array('cate_Order'=>'ASC'),null,null);
									}else{
										$catelist = $zbp->GetCategoryList(null,[array('=','cate_RootID',0)],array('cate_Order'=>'ASC'),null,null);
									}
								 ?>
								<?php  foreach ( $catelist as $key => $cate) { ?>
								<li>
									<a<?php if ($type=='category' && $cate->ID == $category->ID) { ?> class="active"<?php } ?> href="<?php  echo $cate->Url;  ?>" title="<?php  echo $cate->Name;  ?>">
										<?php  echo $cate->Name;  ?>
									</a>
								</li>
								<?php }   ?>
							<?php } ?>
						<?php } ?>
						<?php  foreach ( json_decode($zbp->Config('TztCardVip')->SideNavData,true) as $key=> $value) { ?>
							<?php if ($value['is']) { ?>
								<li><a href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>"><i class="<?php  echo $value['icon'];  ?>"></i> <?php  echo $value['title'];  ?></a></li>
							<?php } ?>
						<?php }   ?>
					</ul>
				</div>
			</div>
			<?php } ?>

			<?php if ($zbp->Config('TztCardVip')->SideQrCode) { ?>
			<div class="tzt-panel text-center">
				<div class="tzt-panel_bd">
					<?php if ($zbp->Config('TztCardVip')->SideQrCodeShow) { ?><img class="img-responsive" src="<?php  echo $zbp->Config('TztCardVip')->SideQrCodeImg;  ?>" alt="<?php  echo $zbp->Config('TztCardVip')->SideQrCodeText;  ?>" /><?php }else{  ?><div class="qrcode"></div><?php } ?>
				</div>
				<div class="tzt-panel_ft">
					<?php  echo $zbp->Config('TztCardVip')->SideQrCodeText;  ?>
				</div>
			</div>
			<?php } ?>

			<?php if ($zbp->Config('TztCardVip')->ArtRank && $zbp->Config('TztCardVip')->ArtRankR) { ?>
				<?php  include $this->GetTemplate('post-randing');  ?>
			<?php } ?>

			<?php if ($zbp->Config('TztCardVip')->SideTag) { ?>
			<div class="tzt-panel">
				<?php if ($zbp->Config('TztCardVip')->SideTagTit) { ?>
				<div class="tzt-panel_hd">
					<h3><?php  echo $zbp->Config('TztCardVip')->SideTagTitle;  ?></h3>
				</div>
				<?php } ?>
				<div class="tzt-panel_bd">
					<div class="tzt-text_tag" style="margin-bottom: -15px;">
						<?php 
							if($zbp->Config('TztCardVip')->SideTagSort){
								$sidetagdata = $zbp->GetTagList(null,null,array('tag_Count'=>'DESC'),$zbp->Config('TztCardVip')->SideTagNum,null);
							}else if($zbp->Config('TztCardVip')->SideTagSort=='2'){
								$sidetagdata = $zbp->GetTagList(null,null,array('rand()'=>''),$zbp->Config('TztCardVip')->SideTagNum,null);
							}else{
								$sidetagdata = $zbp->GetTagList(null,null,array('tag_Order'=>'ASC'),$zbp->Config('TztCardVip')->SideTagNum,null);
							}
						 ?>
						<?php  foreach ( $sidetagdata as $tag) { ?><a href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'># <?php  echo $tag->Name;  ?></a><?php }   ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</aside>
<?php } ?>

<footer class="footer<?php if ($zbp->Config('TztCardVip')->TabBarM) { ?> active<?php } ?>">
	<div class="page-box">

		<?php if ($zbp->Config('TztCardVip')->AdFoot) { ?>
		<div class="tzt-panel">
			<div class="tzt-panel-bd">
				<a href="<?php  echo $zbp->Config('TztCardVip')->AdFootUrl;  ?>" target="_blank">
					<img src="<?php  echo $zbp->Config('TztCardVip')->AdFootImg;  ?>" alt="广告">
				</a>
			</div>
		</div>
		<?php } ?>

		<?php if ($type=='index' && $zbp->Config('TztCardVip')->Link) { ?>
		<div class="tzt-panel<?php if (!$zbp->Config('TztCardVip')->LinkM) { ?> m-hidden<?php } ?>">
			<div class="tzt-panel_hd">
				<?php if ($zbp->Config('TztCardVip')->LinkMore) { ?><a class="pull-right" target="_blank" href="<?php  echo $zbp->Config('TztCardVip')->LinkMoreUrl;  ?>"><?php  echo $zbp->Config('TztCardVip')->LinkMoreTit;  ?></a><?php } ?>
				<h3>友情链接</h3>
			</div>
			<div class="tzt-panel_bd">
				<ul class="tzt-link clearfix">
					<?php  if(isset($modules['link'])){echo $modules['link']->Content;}  ?>
				</ul>
			</div>
		</div>
		<?php } ?>

		<?php if ($zbp->Config('TztCardVip')->FootLink) { ?>
		<div class="tzt-foot-link<?php if (!$zbp->Config('TztCardVip')->FootLinkM) { ?> m-hidden<?php } ?>">
			<?php  foreach ( json_decode($zbp->Config('TztCardVip')->FootLinkData,true) as $key=>$value) { ?>
			<?php if ($value['is']) { ?><?php if ($key) { ?><span class="split-line"></span><?php } ?><a<?php if ($value['blank']) { ?> target="_blank"<?php } ?> href="<?php  echo $value['url'];  ?>"><?php  echo $value['title'];  ?></a><?php } ?>
			<?php }   ?>
		</div>
		<?php } ?>

		<div class="tzt-foot-codyright">
			<?php if ($zbp->Config('TztCardVip')->FootTips) { ?><p<?php if (!$zbp->Config('TztCardVip')->FootTipsM) { ?> class="m-hidden"<?php } ?>><?php  echo $zbp->Config('TztCardVip')->FootTipsText;  ?></p><?php } ?>
			© <a target="_blank" href="https://www.zblogcn.com/"><?php  echo $zblogphp;  ?></a><?php if ($zbp->Config('TztCardVip')->TztCody) { ?><span class="m-hidden"> <a target="_blank" href="https://www.taozhuti.cn/">+ TaoZhuTi.Cn</a><span class="split-line"></span></span><?php } ?><a target="_blank" href="http://beian.miit.gov.cn/"><?php  echo $zbp->Config('TztCardVip')->Icp;  ?></a>
		</div>

	</div>
</footer>

<?php if (zbp_is_mobile() && $zbp->Config('TztCardVip')->TabBarM) { ?>
<div class="tzt-tabbar">
	<div class="page-box">
		<ul class="tzt-tabbar-box">
			<?php  foreach ( json_decode($zbp->Config('TztCardVip')->TabbarData,true) as $value) { ?>
			<?php if ($value['is']) { ?>
			<li class="tzt-tabbar-item">
				<a href="<?php  echo $value['url'];  ?>"<?php if ($value['blank']) { ?> target="_blank"<?php } ?>>
					<i class="<?php  echo $value['icon'];  ?>"></i>
					<p><?php  echo $value['title'];  ?></p>
				</a>
			</li>
			<?php } ?>
			<?php }   ?>			
		</ul>
	</div>
</div>
<?php } ?>


<?php if ($zbp->Config('TztCardVip')->FootRightLink) { ?>
<div class="tzt-rightbtn<?php if ($zbp->Config('TztCardVip')->TabBarM) { ?> active<?php } ?><?php if (!$zbp->Config('TztCardVip')->FootRightLinkM) { ?> m-hidden<?php } ?>">
	<div class="tzt-rightbtn-box">
		<?php  foreach ( json_decode($zbp->Config('TztCardVip')->FootRightData,true) as $value) { ?>
		<?php if ($value['is']) { ?>
		<a href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>"<?php if (!$value['ism']) { ?> class="m-hidden"<?php } ?>>
			<i class="<?php  echo $value['icon'];  ?>"></i>
		</a>
		<?php } ?>
		<?php }   ?>	
		<?php if ($zbp->Config('TztCardVip')->TopUp) { ?>
		<a href="javascript:;" class="backtop" style="display: none;"><i class="icon icon-up"></i></a>
		<?php } ?>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->DialogMenu) { ?>
<div class="tzt-dialog right" id="DialogType">
	<div class="tzt-panel">
		<div class="tzt-panel_bd">
			<ul class="tzt-nav-menu">
				<?php  if(isset($modules['navbar'])){echo $modules['navbar']->Content;}  ?>
			</ul>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->ArtRank && $zbp->Config('TztCardVip')->DialogRan) { ?>
<div class="tzt-dialog bottom" id="DialogRank">
	<div class="page-box">
		<?php  include $this->GetTemplate('post-raninfo');  ?>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->SkinImg || $zbp->Config('TztCardVip')->SkinColor) { ?>
<div class="tzt-dialog bottom" id="DialogBg">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				<div class="tzt-col">
					<a class="tzt-theme-bg tzt-col-bd tzt-col-lg-6 tzt-col-xs-3" href="javascript:tzt_cookie_del('webbg');">
						<span class="" style="display: block; padding: 30px; border-radius: 10px; border: 1px solid #eee;"></span>
					</a>
					<?php  foreach ( json_decode($zbp->Config('TztCardVip')->SkinColorData,true) as $value) { ?>
					<?php if ($value['is']) { ?>
					<a href="javascript:;" title="<?php  echo $value['title'];  ?>" class="tzt-theme-bg tzt-col-bd tzt-col-lg-6 tzt-col-xs-3" data-id="linear-gradient(-45deg, <?php  echo $value['val1'];  ?>, <?php  echo $value['val2'];  ?>)">
						<span class="" style="display: block; padding: 30px; border-radius: 10px; background-image: linear-gradient(-45deg, <?php  echo $value['val1'];  ?>, <?php  echo $value['val2'];  ?>);"></span>
					</a>
					<?php } ?>
					<?php }   ?>
				</div>
				<div class="tzt-col">
					<?php  foreach ( json_decode($zbp->Config('TztCardVip')->SkinImgData,true) as $value) { ?>
					<?php if ($value['is']) { ?>
						<?php if (zbp_is_mobile()) { ?>
						<a href="javascript:;" title="<?php  echo $value['title2'];  ?>" class="cover-img tzt-col-bd tzt-col-lg-3 tzt-col-xs-3 tzt-theme-bg" data-id="url('<?php  echo $value['img2'];  ?>')">
							<span class="title"><?php  echo $value['title2'];  ?></span>
							<img src="<?php  echo $value['img2'];  ?>" alt="">
						</a>
						<?php }else{  ?>
						<a href="javascript:;" title="<?php  echo $value['title'];  ?>" class="cover-img tzt-col-bd tzt-col-lg-3 tzt-col-xs-3 tzt-theme-bg" data-id="url('<?php  echo $value['img'];  ?>')">
							<span class="title"><?php  echo $value['title'];  ?></span>
							<img src="<?php  echo $value['img'];  ?>" alt="">
						</a>
						<?php } ?>
					<?php } ?>
					<?php }   ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->Notice && $zbp->Config('TztCardVip')->DialogNotice) { ?>
<div class="tzt-dialog bottom" id="DialogNotices">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				<?php  echo $zbp->Config('TztCardVip')->NoticeCode;  ?>
			</div>
			<div class="tzt-panel_ft text-center"><a class="btn btn-blue btn-width dialogclose" href="javascript:;"><?php  echo $zbp->Config('TztCardVip')->NoticeBtn;  ?></a></div>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->DialogSo) { ?>
<div class="tzt-dialog bottom" id="DialogSearch">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd text-center" style="padding: 40px 20px;">
				<form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="search-form spacing-b" id="#form">
					<button type="submit" class="submit"><i class="icon icon icon-search"></i> 搜索</button>
					<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词">
				</form>
				<?php if ($zbp->Config('TztCardVip')->HotSearch) { ?>
				<div class="hot">
					<span class="text-muted">热搜</span>
					<?php  $HotSearch = explode('|',$zbp->Config('TztCardVip')->HotSearchTag);  ?>
					<?php if (is_array($HotSearch)) { ?>
						<?php  foreach ( $HotSearch as $value) { ?>
						&nbsp;&nbsp;<a href="<?php  echo $host;  ?>search.php?q=<?php  echo $value;  ?>"><?php  echo $value;  ?></a>
						<?php }   ?>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->DialogWx) { ?>
<div class="tzt-dialog bottom" id="DialogShare">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd text-center">
				<div class="qrcode"></div>
				<h4>微信扫一扫分享给朋友</h4>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->DiyDialog) { ?>
<?php  foreach ( json_decode($zbp->Config('TztCardVip')->DiyDialogData,true) as $value) { ?>
<?php if ($value['is']) { ?>
<div class="tzt-dialog<?php if ($value['class']) { ?> right<?php }else{  ?> bottom<?php } ?>" id="Dialog<?php  echo $value['id'];  ?>">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				<?php  echo $value['code'];  ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php }   ?>
<?php } ?>

<div id="Toast" style="display: none;">
	<div class="tzt-toast">
		<i class="icon"></i>
		<p class="tips"></p>
	</div>
</div>

<div class="mask" id="mask" style="display: none;"></div>

<?php if ($zbp->Config('TztCardVip')->ImgBox) { ?>
<script>
	var $ImgBox = {"title":"<?php  echo $zbp->Config('TztCardVip')->ImgBox3;  ?>","navbar":"<?php  echo $zbp->Config('TztCardVip')->ImgBox2;  ?>","toolbar":"<?php  echo $zbp->Config('TztCardVip')->ImgBox1;  ?>"}
	function viewer_scroll() {
		$(".viewer").each(function(){
			$(this).viewer({
				url: 'data-viewer',
				title: eval($ImgBox.title),
				navbar: eval($ImgBox.navbar),
				toolbar: eval($ImgBox.toolbar),
			});
		});
	}
	viewer_scroll();
</script>
<?php } ?>

<?php  echo $zbp->Config('TztCardVip')->FootSubCode;  ?>

<?php if ($zbp->Config('TztCardVip')->WebSide && !zbp_is_mobile()) { ?>
<script>
	var $scrollid = $(".tzt-sidebar");
	var $scrollbox = $(".tzt-sidebar-box");
	<?php if (!$zbp->Config('TztCardVip')->HeaderFixed) { ?>
		$(window).scroll(function() {
			if(90 < $(this).scrollTop()){
				$scrollbox.css("top", "30px");
			}else{
				$scrollbox.css("top", "86px");
			}
		});
	<?php } ?>
	if($scrollbox.outerHeight() > $(window).height()){
		$(window).scroll(function() {
			if($(this).scrollTop() >= $(document).height() - $(window).height()){
				$scrollbox.css({"bottom":"0","top":"auto"});
				$scrollid.css({"bottom":"30px","top":"auto"});
			}else{
				<?php if ($zbp->Config('TztCardVip')->HeaderFixed) { ?>$scrollbox.css("top", "86px");<?php } ?>
				$scrollid.css({"top":"0","bottom":"auto"});
			}
		});
	}
</script>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->ModeNo) { ?>
<script>
	setInterval(function() {
		check();
	}, 2000);
	var check = function() {
	function doCheck(a) {
		if (('' + a / a)['length'] !== 1 || a % 20 === 0) {
		(function() {}['constructor']('debugger')());
	} else {
		(function() {}['constructor']('debugger')());
	}
		doCheck(++a);
	}
	try {
		doCheck(0);
	} catch (err) {}
	};
	check();
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->RightNo) { ?>
<script>
	document.oncontextmenu = function() {  
		event.returnValue = false;  
	}
	document.oncontextmenu=function(e){
		return false;
	}
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->RightNoText) { ?>
<script>
	document.oncontextmenu=function(){
		alert("<?php  echo $zbp->Config('TztCardVip')->RightNoText;;  ?>");
		return false;
	}
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->SelectNo) { ?>
<script>
	document.onselectstart=function(){
		return false;
	}
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->IframeNo) { ?>
<script>
	(function(window) {
		if (window.location !== window.top.location) {
			window.top.location = window.location;
		}
	})(this);
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->F12No) { ?>
<script>
	document.onkeydown = function(e){  
		if ((e.keyCode == 123)){  
			e.preventDefault(); 
		}  
	}
</script>
<?php } ?>
<?php if ($zbp->Config('TztCardVip')->StatiStics) { ?><?php  echo $zbp->Config('TztCardVip')->StatiSticsJs;  ?><?php } ?>
<?php  echo $footer;  ?>
