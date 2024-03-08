{* Template Name:所有评论模板 *}

<!--评论框-->
<div class="spacing-b" id="comment-post"></div>
{template:commentpost}

{if $socialcomment}
	<div class="tzt-panel_bd">
		{$socialcomment}
	</div>
{else}
	{if $article.CommNums>0}
		<div class="tzt-panel_hd spacing-t">
			<a class="text-link pull-right" href="javascript:;" onclick="comment_reply('0')">我要留言</a>
			<h3><i class="icon icon-feedback"></i> 共{$article.CommNums}条评论</h3>
		</div>
		<div class="tzt-panel_bd">
			<!--评论输出-->
			<div class="tzt-comment">
				{foreach $comments as $key => $comment}
				{template:comment}
				{/foreach}
			</div>
			<!--评论翻页条输出-->
		</div>

		{if $pagebar && $pagebar.PageAll > 1}
		<div class="tzt-panel_bd">
			<ul class="tzt-pagination">
				<li><a href="/?page={$pagebar.PageFirst}">首页</a></li>
				{if $pagebar.prevbutton}<li><a href="{$pagebar.prevbutton}">上一页</a></li>{/if}
				<li class="active"><a>{$pagebar.PageNow}</a></li>
				{if $pagebar.nextbutton}<li><a href="{$pagebar.nextbutton}">下一页</a></li>{/if}
				<li><a href="#">共{$pagebar.PageAll}页</a></li>
			</ul>
		</div>
		{/if}

	{/if}
{/if}



