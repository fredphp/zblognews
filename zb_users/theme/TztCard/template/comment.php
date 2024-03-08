{* Template Name:单条评论 *}
<div class="tzt-comment-box{if $comment.Level} active{/if}{if $comment.Level>1} child{/if}" id="cmt{$comment.ID}">
	{if $comment.Level==0}
	<div class="tzt-comment-box_hd">
		<img src="{$comment.Author.Avatar}" alt="" width="42"/>
	</div>
	{/if}
	<div class="tzt-comment-box_bd">
		{if $comment.Level}
		<p class="tzt-comment-box_user">
			<img src="{$comment.Author.Avatar}" alt="" width="24"/> <a class="text-muted" href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a>
		</p>
		{else}
		<p><a class="text-muted" href="{$comment.Author.HomePage}" rel="nofollow" target="_blank">{$comment.Author.StaticName}</a></p>
		{/if}
		<p>{$comment.Content}</p>
		<div class="text-muted">{$comment.Time()}<span class="split-line"></span><a href="javascript:;" onclick="comment_reply('{$comment.ID}','{$comment.Author.StaticName}')"><i class="iconfont icon-chat"></i> 回复</a></div>
		{foreach $comment.Comments as $comment}
		{template:comment}
		{/foreach}
	</div>
</div>
