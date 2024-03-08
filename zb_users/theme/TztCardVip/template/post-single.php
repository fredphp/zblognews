{* Template Name:文章模板 *}

<div class="tzt-panel">
	{if $zbp->Config('TztCardVip')->Bread}
	<div class="tzt-panel_hd{if !$zbp->Config('TztCardVip')->BreadM} m-hidden{/if}">
		<div class="tzt-panel_bread">
			<span>当前位置：</span>
			<a href="{$host}"><i class="icon icon-home"></i> 首页 </a> <i class="icon icon-right"></i>
			{if $type=='article'}{if is_object($article.Category) && $article.Category.ParentID}<a href="{$article.Category.Parent.Url}">{$article.Category.Parent.Name}</a> <i class="icon icon-right"></i> {/if} <a href="{$article.Category.Url}">{$article.Category.Name}</a>{/if}
		</div>
	</div>
	{/if}
	<div class="tzt-panel_bd">
		<article class="tzt-article">
			{if $article.Title!='未命名'}
				<h1 class="tzt-article_title spacing-b">{$article.Title}</h1>
				<div class="tzt-article_subtit text-muted spacing-b">
					{if $zbp->Config('TztCardVip')->ArtContSub1}<a class="text-link" href="{$article.Category.Url}"><i class="icon icon-category"></i> {$article.Category.Name}</a>{/if}
					{if $zbp->Config('TztCardVip')->ArtContSub2}<a class="text-link" href="{$article.Author.Url}">{$article.Author.StaticName}</a>{/if}
					{if $zbp->Config('TztCardVip')->ArtContSub5}<span>{$article.Time("UpdateTime","Y-m-d H:i:s")}</span>{/if}
				</div>
				{if $article.Category.Metas.liststyle!='2' && $article.Intro && $zbp->Config('TztCardVip')->ArtContDesc}
				<div class="tzt-panel_piece{if !$zbp->Config('TztCardVip')->ArtContCodyM} m-hidden{/if}">
					{TransferHTML($article.Intro,'[nohtml]')}
				</div>
				{/if}
			{/if}
			<div class="tzt-article_content viewer">
				<div class="spacing-b">
					{$article.Content}
					{if $article.Tags && $zbp->Config('TztCardVip')->ArtListTag}<span class="tzt-text_tag author">{foreach $article.Tags as $tag}<a href='{$tag.Url}' title='{$tag.Name}'>#{$tag.Name}</a>{/foreach}</span>{/if}
				</div>
				{if $article->Metas->video}
				<div class="spacing-b">
					<video src="{$article->Metas->video}" class="video_player" onplay="stopOtherMedia(this)" controls="controls"></video>
				</div>
				{/if}
				<div class="spacing-b">
					{if $article->Metas->mp3}
					<audio controls>
						<source src="{$article->Metas->mp3}" type="audio/mpeg">
					</audio>
					{/if}
				</div>
			</div>
			{if $zbp->Config('TztCardVip')->ShCode && $article.Category.Metas.liststyle!='2'}
			<div class="spacing-b text-center">
				<a class="btn btn-main btn-width" href="javascript:tzt_dialog('DialogShang');">{$zbp->Config('TztCardVip')->ShCodeBtn}</a>
	</div>
			{/if}
			{if $zbp->Config('TztCardVip')->ArtContCody && $article.Category.Metas.liststyle!='2'}
			<div class="tzt-panel_piece{if !$zbp->Config('TztCardVip')->ArtContCodyM} m-hidden{/if}">
				<div class="tzt-panel_bd">
					<strong>版权声明：</strong>{$zbp->Config('TztCardVip')->ArtContCodyText}
				</div>
			</div>
			{/if}
			{if $zbp->Config('TztCardVip')->ArtContSub3}<div class="text-muted">阅读 {$article.ViewNums}</div>{/if}
		</article>
	</div>
	{if $zbp->Config('TztCardVip')->ArtContShare}
	<div class="tzt-panel_ft text-muted{if !$zbp->Config('TztCardVip')->ArtContShareM} m-hidden{/if}">
		分享到: <span class="tzt-share" data-sites="{if $zbp->Config('TztCardVip')->Share1}wechat,{/if}{if $zbp->Config('TztCardVip')->Share2}qq,{/if}{if $zbp->Config('TztCardVip')->Share3}qzone,{/if}{if $zbp->Config('TztCardVip')->Share4}weibo,{/if}{if $zbp->Config('TztCardVip')->Share5}douban,{/if}{if $zbp->Config('TztCardVip')->Share6}google,{/if}{if $zbp->Config('TztCardVip')->Share7}linkedin,{/if}{if $zbp->Config('TztCardVip')->Share8}facebook,{/if}{if $zbp->Config('TztCardVip')->Share9}twitter,{/if}{if $zbp->Config('TztCardVip')->Share0}copy{/if}"></span>
	</div>
	{/if}
</div>

{if $zbp->Config('TztCardVip')->AdArtFoot}
<div class="tzt-panel">
	<div class="tzt-panel-bd">
		{if $zbp->Config('TztCardVip')->AdArtFootCode}
		{$zbp->Config('TztCardVip')->AdArtFootCode}
		{else}
		<a href="{$zbp->Config('TztCardVip')->AdArtFootUrl}" target="_blank">
			<img src="{$zbp->Config('TztCardVip')->AdArtFootImg}" alt="广告" />
		</a>
		{/if}
	</div>
</div>
{/if}

{if $zbp->Config('TztCardVip')->ArtContNext}
<div class="tzt-panel{if !$zbp->Config('TztCardVip')->ArtContNextM} m-hidden{/if}">
	<div class="tzt-panel_bd text-overflow">
		<p>
			<strong>上一篇：</strong>{if $article.Prev}<a href="{$article.Prev.Url}">{$article.Prev.Title}</a>{else}没有了{/if}
		</p>
		<p class="margin-0">
			<strong>下一篇：</strong>{if $article.Next}<a href="{$article.Next.Url}">{$article.Next.Title}</a>{else}没有了{/if}
		</p>
	</div>
</div>
{/if}

{if !$article.IsLock && $zbp->Config('TztCardVip')->ArtComment}
	<div class="tzt-panel" id="comment">
		{template:comments}
	</div>

	<div class="tzt-dialog bottom" id="DialogComment">
		<div class="page-box">
			<div class="tzt-panel">
				<div id="comment-box"></div>
			</div>
		</div>
	</div>
{/if}

{if $zbp->Config('TztCardVip')->ShCode}
<div class="tzt-dialog bottom" id="DialogShang">
	<div class="page-box">
		<div class="tzt-panel">
			<a class="dialogclose pull-right" href="javascript:;"><i class="icon icon-error"></i></a>
			<div class="tzt-panel_bd text-center" style="padding: 40px 20px;">
				<p>扫一扫二维码打赏</p>
				<p><img src="{$zbp->Config('TztCardVip')->ShCodeImg}" alt="扫一扫二维码打赏" /></p>
			</div>
		</div>
	</div>
</div>
{/if}
