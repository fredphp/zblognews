<?php  /* Template Name:评论发布框 */  ?>
<div class="mt15" id="divCommentPost">
	<div class="tzt-panel_hd">
		<a class="pull-right" id="cancel-reply" href="javascript:;" style="display:none;"><i class="iconfont icon-delete"></i></a>
		<h3>我要留言<?php if ($user->ID>0) { ?>(<?php  echo $user->StaticName;  ?>)<?php } ?></h3>
	</div>
	<div class="tzt-panel_bd">
		<div class="post">
			<form id="frmSumbit" target="_self" method="post" action="<?php  echo $article->CommentPostUrl;  ?>" >
				<input type="hidden" name="inpId" id="inpId" value="<?php  echo $article->ID;  ?>" />
				<input type="hidden" name="inpRevID" id="inpRevID" value="0" />
				<?php if ($user->ID>0) { ?>
					<input type="hidden" name="inpName" id="inpName" value="<?php  echo $user->StaticName;  ?>" />
					<input type="hidden" name="inpEmail" id="inpEmail" value="<?php  echo $user->Email;  ?>" />
					<input type="hidden" name="inpHomePage" id="inpHomePage" value="<?php  echo $user->HomePage;  ?>" />
				<?php }else{  ?>
				<div class="tzt-comment_input">
					<p><input type="text" name="inpName" id="inpName" class="form-control text" value="<?php  echo $user->StaticName;  ?>" size="28" tabindex="1" placeholder="<?php  echo $lang['msg']['name'];  ?>" /></p>
					<p class="center"><input type="text" name="inpEmail" id="inpEmail" class="form-control text" value="<?php  echo $user->Email;  ?>" size="28" tabindex="2" placeholder="<?php  echo $lang['msg']['email'];  ?>" /></p>
					<p><input type="text" name="inpHomePage" id="inpHomePage" class="form-control text" value="<?php  echo $user->HomePage;  ?>" size="28" tabindex="3" placeholder="<?php  echo $lang['msg']['homepage'];  ?>" /></p>
				</div>
				<?php } ?>
				<p><textarea name="txaArticle" id="txaArticle" class="form-control text" cols="50" rows="4" tabindex="5" placeholder="请输入内容" ></textarea></p>
				<?php if ($option['ZC_COMMENT_VERIFY_ENABLE']) { ?>
				<p>
					<input type="text" name="inpVerify" id="inpVerify" class="form-control text" value="" tabindex="4"  placeholder="验证码" style="display: inline-block; max-width: 120px; margin-right: 10px;">
					<img src="<?php  echo $article->ValidCodeUrl;  ?>" onclick="javascript:this.src='<?php  echo $article->ValidCodeUrl;  ?>&amp;tm='+Math.random();">
				</p>
				<?php } ?>
				&nbsp;&nbsp;
				<div class="text-center">
					<button type="submit" tabindex="6" onclick="return zbp.comment.post()" class="btn btn-blue btn-width submit"><i class="iconfont icon-fillin"></i> 提交留言</button>
				</div>
			</form>
		</div>
	</div>
</div>
