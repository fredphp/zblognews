{* Template Name:公共底部 *}
{if $zbp->Config('TztCardVip')->WebSide && !zbp_is_mobile()}
<aside class="tzt-sidebar">
	<div class="page-box">
		<div class="tzt-sidebar-box">
			{if $zbp->Config('TztCardVip')->SideNav}
			<div class="tzt-panel">
				<div class="tzt-panel_bd">
					<ul class="tzt-sidebar_nav">
						<li>
							<a{if $type=='index'} class="active"{/if} href="{$host}" title="{$name}">
								<i class="icon icon-home"></i> 首页
							</a>
						</li>
						{if $zbp->Config('TztCardVip')->SideNavCate}
							{if $zbp->Config('TztCardVip')->SideNavId=='3'}
								{foreach explode(',',$zbp->Config('TztCardVip')->SideNavIdN) as $key => $cate2}
									{foreach $zbp->GetCategoryList(null,[array('=','cate_ID',$cate2)],array('cate_Order'=>'ASC'),null,null) as $key => $cate}
									<li>
										<a{if $type=='category' && $cate.ID == $category.ID} class="active"{/if} href="{$cate.Url}" title="{$cate.Name}">
											{$cate.Name}
										</a>
									</li>
									{/foreach}
								{/foreach}
							{else}
								{php}
									if($zbp->Config('TztCardVip')->SideNavId){
										$catelist = $zbp->GetCategoryList(null,[array('<>','cate_RootID',0)],array('cate_Order'=>'ASC'),null,null);
									}else{
										$catelist = $zbp->GetCategoryList(null,[array('=','cate_RootID',0)],array('cate_Order'=>'ASC'),null,null);
									}
								{/php}
								{foreach $catelist as $key => $cate}
								<li>
									<a{if $type=='category' && $cate.ID == $category.ID} class="active"{/if} href="{$cate.Url}" title="{$cate.Name}">
										{$cate.Name}
									</a>
								</li>
								{/foreach}
							{/if}
						{/if}
						{foreach json_decode($zbp->Config('TztCardVip')->SideNavData,true) as $key=> $value}
							{if $value['is']}
								<li><a href="{$value['url']}" title="{$value['title']}"><i class="{$value['icon']}"></i> {$value['title']}</a></li>
							{/if}
						{/foreach}
					</ul>
				</div>
			</div>
			{/if}

			{if $zbp->Config('TztCardVip')->SideQrCode}
			<div class="tzt-panel text-center">
				<div class="tzt-panel_bd">
					{if $zbp->Config('TztCardVip')->SideQrCodeShow}<img class="img-responsive" src="{$zbp->Config('TztCardVip')->SideQrCodeImg}" alt="{$zbp->Config('TztCardVip')->SideQrCodeText}" />{else}<div class="qrcode"></div>{/if}
				</div>
				<div class="tzt-panel_ft">
					{$zbp->Config('TztCardVip')->SideQrCodeText}
				</div>
			</div>
			{/if}

			{if $zbp->Config('TztCardVip')->ArtRank && $zbp->Config('TztCardVip')->ArtRankR}
				{template:post-randing}
			{/if}

			{if $zbp->Config('TztCardVip')->SideTag}
			<div class="tzt-panel">
				{if $zbp->Config('TztCardVip')->SideTagTit}
				<div class="tzt-panel_hd">
					<h3>{$zbp->Config('TztCardVip')->SideTagTitle}</h3>
				</div>
				{/if}
				<div class="tzt-panel_bd">
					<div class="tzt-text_tag" style="margin-bottom: -15px;">
						{php}
							if($zbp->Config('TztCardVip')->SideTagSort){
								$sidetagdata = $zbp->GetTagList(null,null,array('tag_Count'=>'DESC'),$zbp->Config('TztCardVip')->SideTagNum,null);
							}else if($zbp->Config('TztCardVip')->SideTagSort=='2'){
								$sidetagdata = $zbp->GetTagList(null,null,array('rand()'=>''),$zbp->Config('TztCardVip')->SideTagNum,null);
							}else{
								$sidetagdata = $zbp->GetTagList(null,null,array('tag_Order'=>'ASC'),$zbp->Config('TztCardVip')->SideTagNum,null);
							}
						{/php}
						{foreach $sidetagdata as $tag}<a href='{$tag.Url}' title='{$tag.Name}'># {$tag.Name}</a>{/foreach}
					</div>
				</div>
			</div>
			{/if}
		</div>
	</div>
</aside>
{/if}

<footer class="footer{if $zbp->Config('TztCardVip')->TabBarM} active{/if}">
	<div class="page-box">

		{if $zbp->Config('TztCardVip')->AdFoot}
		<div class="tzt-panel">
			<div class="tzt-panel-bd">
				<a href="{$zbp->Config('TztCardVip')->AdFootUrl}" target="_blank">
					<img src="{$zbp->Config('TztCardVip')->AdFootImg}" alt="广告">
				</a>
			</div>
		</div>
		{/if}

		{if $type=='index' && $zbp->Config('TztCardVip')->Link}
		<div class="tzt-panel{if !$zbp->Config('TztCardVip')->LinkM} m-hidden{/if}">
			<div class="tzt-panel_hd">
				{if $zbp->Config('TztCardVip')->LinkMore}<a class="pull-right" target="_blank" href="{$zbp->Config('TztCardVip')->LinkMoreUrl}">{$zbp->Config('TztCardVip')->LinkMoreTit}</a>{/if}
				<h3>友情链接</h3>
			</div>
			<div class="tzt-panel_bd">
				<ul class="tzt-link clearfix">
					{module:link}
				</ul>
			</div>
		</div>
		{/if}

		{if $zbp->Config('TztCardVip')->FootLink}
		<div class="tzt-foot-link{if !$zbp->Config('TztCardVip')->FootLinkM} m-hidden{/if}">
			{foreach json_decode($zbp->Config('TztCardVip')->FootLinkData,true) as $key=>$value}
			{if $value['is']}{if $key}<span class="split-line"></span>{/if}<a{if $value['blank']} target="_blank"{/if} href="{$value['url']}">{$value['title']}</a>{/if}
			{/foreach}
		</div>
		{/if}

		<div class="tzt-foot-codyright">
			{if $zbp->Config('TztCardVip')->FootTips}<p{if !$zbp->Config('TztCardVip')->FootTipsM} class="m-hidden"{/if}>{$zbp->Config('TztCardVip')->FootTipsText}</p>{/if}
			© <a target="_blank" href="https://www.zblogcn.com/">{$zblogphp}</a>{if $zbp->Config('TztCardVip')->TztCody}<span class="m-hidden"> <a target="_blank" href="https://www.taozhuti.cn/">+ TaoZhuTi.Cn</a><span class="split-line"></span></span>{/if}<a target="_blank" href="http://beian.miit.gov.cn/">{$zbp->Config('TztCardVip')->Icp}</a>
		</div>

	</div>
</footer>

{if zbp_is_mobile() && $zbp->Config('TztCardVip')->TabBarM}
<div class="tzt-tabbar">
	<div class="page-box">
		<ul class="tzt-tabbar-box">
			{foreach json_decode($zbp->Config('TztCardVip')->TabbarData,true) as $value}
			{if $value['is']}
			<li class="tzt-tabbar-item">
				<a href="{$value['url']}"{if $value['blank']} target="_blank"{/if}>
					<i class="{$value['icon']}"></i>
					<p>{$value['title']}</p>
				</a>
			</li>
			{/if}
			{/foreach}			
		</ul>
	</div>
</div>
{/if}


{if $zbp->Config('TztCardVip')->FootRightLink}
<div class="tzt-rightbtn{if $zbp->Config('TztCardVip')->TabBarM} active{/if}{if !$zbp->Config('TztCardVip')->FootRightLinkM} m-hidden{/if}">
	<div class="tzt-rightbtn-box">
		{foreach json_decode($zbp->Config('TztCardVip')->FootRightData,true) as $value}
		{if $value['is']}
		<a href="{$value['url']}" title="{$value['title']}"{if !$value['ism']} class="m-hidden"{/if}>
			<i class="{$value['icon']}"></i>
		</a>
		{/if}
		{/foreach}	
		{if $zbp->Config('TztCardVip')->TopUp}
		<a href="javascript:;" class="backtop" style="display: none;"><i class="icon icon-up"></i></a>
		{/if}
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->DialogMenu}
<div class="tzt-dialog right" id="DialogType">
	<div class="tzt-panel">
		<div class="tzt-panel_bd">
			<ul class="tzt-nav-menu">
				{module:navbar}
			</ul>
		</div>
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->ArtRank && $zbp->Config('TztCardVip')->DialogRan}
<div class="tzt-dialog bottom" id="DialogRank">
	<div class="page-box">
		{template:post-raninfo}
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->SkinImg || $zbp->Config('TztCardVip')->SkinColor}
<div class="tzt-dialog bottom" id="DialogBg">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				<div class="tzt-col">
					<a class="tzt-theme-bg tzt-col-bd tzt-col-lg-6 tzt-col-xs-3" href="javascript:tzt_cookie_del('webbg');">
						<span class="" style="display: block; padding: 30px; border-radius: 10px; border: 1px solid #eee;"></span>
					</a>
					{foreach json_decode($zbp->Config('TztCardVip')->SkinColorData,true) as $value}
					{if $value['is']}
					<a href="javascript:;" title="{$value['title']}" class="tzt-theme-bg tzt-col-bd tzt-col-lg-6 tzt-col-xs-3" data-id="linear-gradient(-45deg, {$value['val1']}, {$value['val2']})">
						<span class="" style="display: block; padding: 30px; border-radius: 10px; background-image: linear-gradient(-45deg, {$value['val1']}, {$value['val2']});"></span>
					</a>
					{/if}
					{/foreach}
				</div>
				<div class="tzt-col">
					{foreach json_decode($zbp->Config('TztCardVip')->SkinImgData,true) as $value}
					{if $value['is']}
						{if zbp_is_mobile()}
						<a href="javascript:;" title="{$value['title2']}" class="cover-img tzt-col-bd tzt-col-lg-3 tzt-col-xs-3 tzt-theme-bg" data-id="url('{$value['img2']}')">
							<span class="title">{$value['title2']}</span>
							<img src="{$value['img2']}" alt="">
						</a>
						{else}
						<a href="javascript:;" title="{$value['title']}" class="cover-img tzt-col-bd tzt-col-lg-3 tzt-col-xs-3 tzt-theme-bg" data-id="url('{$value['img']}')">
							<span class="title">{$value['title']}</span>
							<img src="{$value['img']}" alt="">
						</a>
						{/if}
					{/if}
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->Notice && $zbp->Config('TztCardVip')->DialogNotice}
<div class="tzt-dialog bottom" id="DialogNotices">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				{$zbp->Config('TztCardVip')->NoticeCode}
			</div>
			<div class="tzt-panel_ft text-center"><a class="btn btn-blue btn-width dialogclose" href="javascript:;">{$zbp->Config('TztCardVip')->NoticeBtn}</a></div>
		</div>
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->DialogSo}
<div class="tzt-dialog bottom" id="DialogSearch">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd text-center" style="padding: 40px 20px;">
				<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="search-form spacing-b" id="#form">
					<button type="submit" class="submit"><i class="icon icon icon-search"></i> 搜索</button>
					<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词">
				</form>
				{if $zbp->Config('TztCardVip')->HotSearch}
				<div class="hot">
					<span class="text-muted">热搜</span>
					{$HotSearch = explode('|',$zbp->Config('TztCardVip')->HotSearchTag)}
					{if is_array($HotSearch)}
						{foreach $HotSearch as $value}
						&nbsp;&nbsp;<a href="{$host}search.php?q={$value}">{$value}</a>
						{/foreach}
					{/if}
				</div>
				{/if}
			</div>
		</div>
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->DialogWx}
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
{/if}

{if $zbp->Config('TztCardVip')->DiyDialog}
{foreach json_decode($zbp->Config('TztCardVip')->DiyDialogData,true) as $value}
{if $value['is']}
<div class="tzt-dialog{if $value['class']} right{else} bottom{/if}" id="Dialog{$value['id']}">
	<div class="page-box">
		<div class="tzt-panel">
			<div class="tzt-panel_bd">
				{$value['code']}
			</div>
		</div>
	</div>
</div>
{/if}
{/foreach}
{/if}

<div id="Toast" style="display: none;">
	<div class="tzt-toast">
		<i class="icon"></i>
		<p class="tips"></p>
	</div>
</div>

<div class="mask" id="mask" style="display: none;"></div>

{if $zbp->Config('TztCardVip')->ImgBox}
<script>
	var $ImgBox = {"title":"{$zbp->Config('TztCardVip')->ImgBox3}","navbar":"{$zbp->Config('TztCardVip')->ImgBox2}","toolbar":"{$zbp->Config('TztCardVip')->ImgBox1}"}
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
{/if}

{$zbp->Config('TztCardVip')->FootSubCode}

{if $zbp->Config('TztCardVip')->WebSide && !zbp_is_mobile()}
<script>
	var $scrollid = $(".tzt-sidebar");
	var $scrollbox = $(".tzt-sidebar-box");
	{if !$zbp->Config('TztCardVip')->HeaderFixed}
		$(window).scroll(function() {
			if(90 < $(this).scrollTop()){
				$scrollbox.css("top", "30px");
			}else{
				$scrollbox.css("top", "86px");
			}
		});
	{/if}
	if($scrollbox.outerHeight() > $(window).height()){
		$(window).scroll(function() {
			if($(this).scrollTop() >= $(document).height() - $(window).height()){
				$scrollbox.css({"bottom":"0","top":"auto"});
				$scrollid.css({"bottom":"30px","top":"auto"});
			}else{
				{if $zbp->Config('TztCardVip')->HeaderFixed}$scrollbox.css("top", "86px");{/if}
				$scrollid.css({"top":"0","bottom":"auto"});
			}
		});
	}
</script>
{/if}

{if $zbp->Config('TztCardVip')->ModeNo}
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
{/if}
{if $zbp->Config('TztCardVip')->RightNo}
<script>
	document.oncontextmenu = function() {  
		event.returnValue = false;  
	}
	document.oncontextmenu=function(e){
		return false;
	}
</script>
{/if}
{if $zbp->Config('TztCardVip')->RightNoText}
<script>
	document.oncontextmenu=function(){
		alert("{$zbp->Config('TztCardVip')->RightNoText;}");
		return false;
	}
</script>
{/if}
{if $zbp->Config('TztCardVip')->SelectNo}
<script>
	document.onselectstart=function(){
		return false;
	}
</script>
{/if}
{if $zbp->Config('TztCardVip')->IframeNo}
<script>
	(function(window) {
		if (window.location !== window.top.location) {
			window.top.location = window.location;
		}
	})(this);
</script>
{/if}
{if $zbp->Config('TztCardVip')->F12No}
<script>
	document.onkeydown = function(e){  
		if ((e.keyCode == 123)){  
			e.preventDefault(); 
		}  
	}
</script>
{/if}
{if $zbp->Config('TztCardVip')->StatiStics}{$zbp->Config('TztCardVip')->StatiSticsJs}{/if}
{$footer}
