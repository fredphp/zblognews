<?php  /* Template Name:单条评论 */  ?>
<div class="tzt-comment-box<?php if ($comment->Level) { ?> active<?php } ?><?php if ($comment->Level>1) { ?> child<?php } ?>" id="cmt<?php  echo $comment->ID;  ?>">
	<?php if ($comment->Level==0) { ?>
	<div class="tzt-comment-box_hd">
		<img src="<?php  echo $comment->Author->Avatar;  ?>" alt="" width="42"/>
	</div>
	<?php } ?>
	<div class="tzt-comment-box_bd">
		<?php if ($comment->Level) { ?>
		<p class="tzt-comment-box_user">
			<img src="<?php  echo $comment->Author->Avatar;  ?>" alt="" width="24"/> <a class="text-muted" href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a>
		</p>
		<?php }else{  ?>
		<p><a class="text-muted" href="<?php  echo $comment->Author->HomePage;  ?>" rel="nofollow" target="_blank"><?php  echo $comment->Author->StaticName;  ?></a></p>
		<?php } ?>
		<p><?php  echo $comment->Content;  ?></p>
		<div class="text-muted"><?php  echo $comment->Time();  ?><span class="split-line"></span><a href="javascript:;" onclick="comment_reply('<?php  echo $comment->ID;  ?>','<?php  echo $comment->Author->StaticName;  ?>')"><i class="iconfont icon-chat"></i> 回复</a></div>
		<?php  foreach ( $comment->Comments as $comment) { ?>
		<?php  include $this->GetTemplate('comment');  ?>
		<?php }   ?>
	</div>
</div>
