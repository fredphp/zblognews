{* Template Name:单条评论 *}
<div class="tzt-comment-box{if $comment.Level} active{/if}{if $comment.Level>1} child{/if}" id="cmt{$comment.ID}">
	{if $comment.Level==0}
	<div class="tzt-comment-box_hd">
		<img src="{$comment.Author.Avatar}" width="45"/>
	</div>
	{/if}
	<div class="tzt-comment-box_bd">
		{if $comment.Level}
		<h5 class="tzt-comment-box_user">
			<img src="{$comment.Author.Avatar}" alt="" width="24"/> <a href="{$comment.Author.HomePage}" rel="nofollow" class="text-link">{$comment.Author.StaticName}</a>
		</h5>
		{else}
		<h5 class="user"><a href="{$comment.Author.HomePage}" rel="nofollow">{$comment.Author.StaticName}</a></h5>
		{/if}
		<p class="cont">{$comment.Content}</p>
		<div class="foot">
			<span>{TztCardVip_TimeAgo($comment.Time(),$zbp->Config('TztCardVip')->ArtCommentTime)}</span><a href="javascript:;" onclick="comment_reply('{$comment.ID}','{$comment.Author.StaticName}')"><i class="icon icon-feedback"></i> 回复</a>
	</div>
		{foreach $comment.Comments as $comment}
		{template:comment}
		{/foreach}
	</div>
</div>
