{* Template Name:首页及列表页 *}
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
				<div class="tzt-panel_bd mb15">
					<a href="{$zbp->Config('TztCard')->TopUrl}" title="{$name}">
						<img class="img-responsive img-radius" src="{$host}zb_users/theme/{$theme}/upload/top.jpg" alt="{$name}"/>
					</a>
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
							<div class="tzt-media-box_time">{if $article.TopType}<span class="text-red">置顶</span><span class="split-line"></span>{/if}{$article.Category.Name}<span class="split-line"></span>{$article.Time()}</div>
						</div>
						{if $article.AllImages}
						{php}
						if($zbp->Config('TztCard')->ThumbsW){
							$ThumbsW = $zbp->Config('TztCard')->ThumbsW;
							$ThumbsH = $zbp->Config('TztCard')->ThumbsH;
						}else{
							$ThumbsW = '400';
							$ThumbsH = '300';
						}
						{/php}
						<div class="tzt-media-box_bd">
							<img src="{$article->Thumbs($ThumbsW, $ThumbsH, 1, true)[0]}" alt="{$article.Title}">
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

			{if $type=='index'}
			<div class="tzt-panel{if $zbp->Config('TztCard')->LinkIs} m-hidden{/if}">
				<div class="tzt-panel_hd">
					<h3>友情链接</h3>
				</div>
				<div class="tzt-panel_bd">
					<ul class="tzt-link clearfix">
						{module:link}
					</ul>
				</div>
			</div>
			{/if}

		</div>
	</main>
	{template:footer}
</body>

</html>
