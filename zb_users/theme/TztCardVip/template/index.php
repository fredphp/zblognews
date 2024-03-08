{* Template Name:首页及列表页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
{template:header}
</head>
<body {if $zbp->Config('TztCardVip')->CloreDark} data-skin="dark"{/if}>
	{template:head}
	<main class="page">
		<div class="page-box">
			<div class="page-bd">

				{if $type=='index' && $zbp->Config('TztCardVip')->Slide}
				<div class="owl-carousel{if $zbp->Config('TztCardVip')->IdenxTabs} index{/if}" data-items="1"{if $zbp->Config('TztCardVip')->SlideAuto} data-auto="1"{/if}{if $zbp->Config('TztCardVip')->SlidePage} data-page="1"{/if}{if $zbp->Config('TztCardVip')->SlideNav} data-nav="1"{/if} {if $zbp->Config('TztCardVip')->SlidePageNum}data-pagenum="1"{/if} {if $zbp->Config('TztCardVip')->SlideType} data-type="{$zbp->Config('TztCardVip')->SlideType}"{/if}>
					{foreach json_decode($zbp->Config('TztCardVip')->SlideData,true) as $value}
					{if $value['is']}<a href="{$value['url']}" title="{$value['title']}"{if $value['blank']} target="_blank"{/if}><img src="{$value['img']}" alt="{$value['title']}"></a>{/if}
					{/foreach}
				</div>
				{/if}

				{if $type=='index' && $zbp->Config('TztCardVip')->IdenxTabs}
				<ul class="tzt-index_nav">
					{foreach json_decode($zbp->Config('TztCardVip')->IdenxTabsData,true) as $value}
					{if $value['is']}
					<li>
						<a{if $value['blank']} target="_blank"{/if} href="{$value['url']}" title="{$value['title']}">
							<img src="{$value['img']}" alt="{$value['title']}">
							<span>{$value['title']}</span>
						</a>
					</li>
					{/if}
					{/foreach}
				</ul>
				{/if}

				{if $type=='author'}
				<div class="tzt-index_auth">
					<div class="index-auth_bg" style="background-image: url('{$author.Avatar}');"></div>
					{if $author.Intro}<div class="intro">{$author.Intro}</div>{else}<div class="intro">TA太懒了，什么都没有写！</div>{/if}
					<div class="user">
						<div class="name">{$author.Name} <p>{$author.Email}</p></div>
						<span class="avatar-img"><img src="{$author.Avatar}" alt="{$author.Name}"></span>
					</div>
				</div>
				{/if}
				<div class="tzt-panel"{if $type=='index' || $type=='author'} style="padding-top:0; border-radius: 0 0 var(--tzt-circle) var(--tzt-circle);"{/if}>
					{if $type=='tag'}
					<div class="tzt-panel_hd text-center">
						<h3>与“{$tag.Name}” 相关的“{$tag.Count}”条结果</h3>
					</div>
					{elseif $type=='category'}
					<div class="tzt-panel_hd text-center">
						<h3>在“{$category.Name}” 栏目下找到“{$category.Count}”条结果</h3>
					</div>
					<div class="tzt-panel_hd">
						<ul class="tzt-nav-tabs">
							<li{if GetVars('order','GET') == 'inputtime' || !GetVars('order','GET')} class="active"{/if}>
								<a href="?cate={$category.ID}&order=inputtime&sort=0">按时间 <i class="icon icon-sort"></i></a>
							</li>
							<li{if GetVars('order','GET') == 'updatetime'} class="active"{/if}>
								<a href="?cate={$category.ID}&order=updatetime&sort=0">按更新 <i class="icon icon-sort"></i></a>
							</li>
							<li{if GetVars('order','GET') == 'hits'} class="active"{/if}>
								<a href="?cate={$category.ID}&order=hits&sort=0">按热门 <i class="icon icon-sort"></i></a>
							</li>
							<li{if GetVars('order','GET') == 'comments'} class="active"{/if}>
								<a href="?cate={$category.ID}&order=comments&sort=0">按热评 <i class="icon icon-sort"></i></a>
							</li>
						</ul>
					</div>
					{/if}
					{if $articles}
					{template:post-multi}
					{template:pagebar}
					{else}
					<div class="tzt-panel_bd">
						<div class="text-center" style="padding: 30px;">
							<p class="mb15"><img src="{$host}zb_users/theme/{$theme}/images/empty.png" width="160" alt=""></p>
							{if $type=='tag'}
							<p class="text-muted">没有找到与“{$tag.Name}” 相关的内容</p>
							{elseif $type=='category'}
							<p class="text-muted">没有找到与“{$category.Name}” 相关的内容</p>
							{else}
							<p class="text-muted">这里空空如也</p>
							{/if}
						</div>
					</div>
					{/if}
				</div>
			</div>
		</div>
	</main>
	{template:footer}
	<script>
		$(window).scroll(function() {
			viewer_scroll();
		});
	</script>
</body>

</html>
