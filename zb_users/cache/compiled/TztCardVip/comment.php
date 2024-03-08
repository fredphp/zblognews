<?php  /* Template Name:单条评论 */  ?>
<div class="tzt-comment-box<?php if ($comment->Level) { ?> active<?php } ?><?php if ($comment->Level>1) { ?> child<?php } ?>" id="cmt<?php  echo $comment->ID;  ?>">
	<?php if ($comment->Level==0) { ?>
	<div class="tzt-comment-box_hd">
		<img src="<?php  echo $comment->Author->Avatar;  ?>" width="45"/>
	</div>
	<?php } ?>
	<div class="tzt-comment-box_bd">
		<?php if ($comment->Level) { ?>
		<h5 class="tzt-comment-box_user">
			<img src="<?php  echo $comment->Author->Avatar;  ?>" alt="" width="24"/> <a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" class="text-link"><?php  echo $comment->Author->StaticName;  ?></a>
		</h5>
		<?php }else{  ?>
		<h5 class="user"><a href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow"><?php  echo $comment->Author->StaticName;  ?></a></h5>
		<?php } ?>
		<p class="cont"><?php  echo $comment->Content;  ?></p>
		<div class="foot">
			<span><?php  echo TztCardVip_TimeAgo($comment->Time(),$zbp->Config('TztCardVip')->ArtCommentTime);  ?></span><a href="javascript:;" onclick="comment_reply('<?php  echo $comment->ID;  ?>','<?php  echo $comment->Author->StaticName;  ?>')"><i class="icon icon-feedback"></i> 回复</a>
	</div>
		<?php  foreach ( $comment->Comments as $comment) { ?>
		<?php  include $this->GetTemplate('comment');  ?>
		<?php }   ?>
	</div>
</div>
