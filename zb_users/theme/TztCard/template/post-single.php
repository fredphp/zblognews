{* Template Name:文章模板 *}
<div class="tzt-panel">
	<div class="tzt-panel_hd">
		<div class="tzt-panel_bread">
			<span>当前位置：</span>
			<a href="{$host}"><i class="icon iconfont icon-home"></i> 首页 </a> <i class="icon iconfont icon-right1"></i>
			{if $type=='article'}{if is_object($article.Category) && $article.Category.ParentID}<a href="{$article.Category.Parent.Url}">{$article.Category.Parent.Name}</a> <i class="icon iconfont icon-right1"></i> {/if} <a href="{$article.Category.Url}">{$article.Category.Name}</a>{/if}
		</div>
	</div>
	<article class="tzt-panel_bd">
		<h1 class="tzt-article_title mb15">{$article.Title}</h1>
		<div class="tzt-article_subtit text-muted mb15">
			<span class="m-hidden">栏目：</span><a class="text-link" href="{$article.Category.Url}">{$article.Category.Name}</a><span class="split-line"></span>
			<span class="m-hidden">作者：</span>{$article.Author.StaticName}<span class="split-line"></span>
			<span class="m-hidden">时间：</span>{$article.Time("UpdateTime","Y-m-d H:i:s")}
		</div>
		{if $zbp->Config('TztCard')->ArticleDesc}
		<div class="tzt-article_desc mb15">
			{$article.Intro}
		</div>
		{/if}
		<div class="tzt-article_content mb15" id="viewer">
			{$article.Content}
		</div>
		{if count($article.Tags)>0}
		<div class="tzt-article_tag mb15">
			{foreach $article.Tags as $tag}<a class="btn btn-mini btn-border" href='{$tag.Url}' title='{$tag.Name}'>{$tag.Name}</a> &nbsp;&nbsp;{/foreach}
		</div>
		{/if}
		{if $zbp->Config('TztCard')->ArticleCody}
		<div class="tzt-panel bg">
			<div class="tzt-panel_bd">
				<strong>版权声明：</strong>{$zbp->Config('TztCard')->ArticleCody}
			</div>
		</div>
		{/if}
	</article>
	<div class="text-muted">阅读：{$article.ViewNums}次</div>
</div>

<div class="tzt-panel">
	<div class="tzt-panel_bd clearfix">
		<p>
			<strong>上一篇：</strong>{if $article.Prev}<a href="{$article.Prev.Url}">{$article.Prev.Title}</a>{else}没有了{/if}
		</p>
		<p class="margin-0">
			<strong>下一篇：</strong>{if $article.Next}<a href="{$article.Next.Url}">{$article.Next.Title}</a>{else}没有了{/if}
		</p>
	</div>
</div>

{if $zbp->Config('TztCard')->Related}
<div class="tzt-panel">
	<div class="tzt-panel_hd">
		<h3>相关文章</h3>
	</div>
	<div class="tzt-panel_bd">
		{foreach GetList(5,$article.Category.ID) as $related}
		<a href="{$related.Url}" class="tzt-media-box" title="{$related.Title}">
			<div class="tzt-media-box_hd">
				<h3 class="tzt-media-box_title">{$related.Title}
				</h3>
				{if $related.Intro}
				<div class="tzt-media-box_desc m-hidden">
					{php}$Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($related->Intro,'[nohtml]'),40)).'...');{/php} {$Intro}
				</div>
				{/if}
				<div class="tzt-media-box_time">{if $related.TopType}<span class="text-red">置顶</span><span class="split-line"></span>{/if}{$related.Time()}</div>
			</div>
			{if $related.AllImages}
			<div class="tzt-media-box_bd">
				<img src="{$related.AllImages[0]}" alt="{$related.Title}">
			</div>
			{/if}
		</a>
		{/foreach}
	</div>
</div>
{/if}

{if !$article.IsLock}
	<div class="tzt-panel">
		{template:comments}
	</div>

	<div class="tzt-dialog bottom" id="DialogComment">
		<div class="page-bd">
			<div class="tzt-panel">
				<div id="comment-box"></div>
			</div>
		</div>
	</div>
{/if}

