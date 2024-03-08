{* Template Name:留言板模板 *}
<div class="tzt-panel">
	<article class="tzt-panel_bd">
		<h1 class="tzt-article_title mb15">{$article.Title}</h1>
		<div class="tzt-article_content mb15" id="viewer">
			{$article.Content}
		</div>
	</article>
</div>

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
