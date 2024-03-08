{* Template Name:搜索页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
	<head>
	{template:header}
	</head>
	<body>
		{template:head}
		<main class="page">
			<div class="page-bd">
				<div class="tzt-panel">
					<div class="tzt-panel_hd">
						<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="search-form mb15" id="#form">
							<button type="submit" class="submit"><i class="icon iconfont icon-search"></i> 搜索</button>
							<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词" value="{$_GET['q']}">
						</form>
					</div>
					<div class="tzt-panel_bd">
						{foreach $articles as $article}
						<a href="{$article.Url}" class="tzt-media-box" title="{$article.Title}">
							<div class="tzt-media-box_hd">
								<h3 class="tzt-media-box_title">{$article.Title}</h3>
								{if $article.Intro}
								<div class="tzt-media-box_desc m-hidden">
									{php}$Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),40)).'...');{/php} {$Intro}
								</div>
								{/if}
								<div class="tzt-media-box_time">{if $article.TopType}<span class="text-red">置顶</span><span class="split-line"></span>{/if}{$article.Time()}</div>
							</div>
							{if $article.AllImages}
							<div class="tzt-media-box_bd">
								<img src="{$article.AllImages[0]}" alt="{$article.Title}">
							</div>
							{/if}
						</a>
						{/foreach}
					</div>
					
					{if $pagebar && $pagebar.PageAll > 1}
					<div class="tzt-panel_ft">
						<ul class="tzt-pagination">
							<li><a href="/?page={$pagebar.PageFirst}">首页</a></li>
							{if $pagebar.prevbutton}<li><a href="{$pagebar.prevbutton}">上一页</a></li>{/if}
							<li class="active"><a>{$pagebar.PageNow}</a></li>
							{if $pagebar.nextbutton}<li><a href="{$pagebar.nextbutton}">下一页</a></li>{/if}
							<li><a href="#">共{$pagebar.PageAll}页</a></li>
						</ul>
					</div>
					{/if}
					
				</div>
			</div>
		</main>
		{template:footer}
	</body>
</html>