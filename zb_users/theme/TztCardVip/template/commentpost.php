{* Template Name:评论发布框 *}
<div class="mt15" id="divCommentPost">
	<div class="tzt-panel_hd">
		<a class="pull-right" id="cancel-reply" href="javascript:;" style="display:none;"><i class="icon icon-error"></i></a>
		<h3><i class="icon icon-feedback"></i>{if $user.ID>0} {$user.StaticName} {else} {$user.StaticName}{/if} 我要留言</h3>
	</div>
	<div class="tzt-panel_bd">
		<div class="post">
			<form id="frmSumbit" target="_self" method="post" action="{$article.CommentPostUrl}" >
				<input type="hidden" name="inpId" id="inpId" value="{$article.ID}" />
				<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
				{if $user.ID>0}
					<input type="hidden" name="inpName" id="inpName" value="{$user.StaticName}" />
					<input type="hidden" name="inpEmail" id="inpEmail" value="{$user.Email}" />
					<input type="hidden" name="inpHomePage" id="inpHomePage" value="{$user.HomePage}" />
				{else}
				<div class="tzt-comment_input">
					{if $zbp->Config('TztCardVip')->ArtComment2}<p><input type="text" name="inpName" id="inpName" class="form-control text" value="{$user.StaticName}" size="28" tabindex="1" placeholder="{$lang['msg']['name']}" /></p>{/if}
					{if $zbp->Config('TztCardVip')->ArtComment3}<p class="center"><input type="text" name="inpEmail" id="inpEmail" class="form-control text" value="{$user.Email}" size="28" tabindex="2" placeholder="{$lang['msg']['email']}" /></p>{/if}
					{if $zbp->Config('TztCardVip')->ArtComment4}<p><input type="text" name="inpHomePage" id="inpHomePage" class="form-control text" value="{$user.HomePage}" size="28" tabindex="3" placeholder="{$lang['msg']['homepage']}" /></p>{/if}
				</div>
				{/if}
				<p><textarea name="txaArticle" id="txaArticle" class="form-control text" cols="50" rows="4" tabindex="5" placeholder="请输入内容" ></textarea></p>
				{if $option['ZC_COMMENT_VERIFY_ENABLE']}
				<p>
					<input type="text" name="inpVerify" id="inpVerify" class="form-control text" value="" tabindex="4"  placeholder="验证码" style="display: inline-block; max-width: 120px; margin-right: 10px;">
					<img src="{$article.ValidCodeUrl}" onclick="javascript:this.src='{$article.ValidCodeUrl}&amp;tm='+Math.random();">
				</p>
				{/if}
				&nbsp;&nbsp;
				<div class="text-center">
					<button type="submit" tabindex="6" onclick="return zbp.comment.post()" class="btn btn-main btn-width submit"><i class="icon icon-opinion"></i> 提交留言</button>
				</div>
			</form>
		</div>
	</div>
</div>
