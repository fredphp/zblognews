<label id="AjaxCommentBegin"></label><?php  /* Template Name:所有评论模板 */  ?>

<!--评论框-->
<div class="spacing-b" id="comment-post"></div>
<?php  include $this->GetTemplate('commentpost');  ?>

<?php if ($socialcomment) { ?>
	<div class="tzt-panel_bd">
		<?php  echo $socialcomment;  ?>
	</div>
<?php }else{  ?>
	<?php if ($article->CommNums>0) { ?>
		<div class="tzt-panel_hd spacing-t">
			<a class="text-link pull-right" href="javascript:;" onclick="comment_reply('0')">我要留言</a>
			<h3><i class="icon icon-feedback"></i> 共<?php  echo $article->CommNums;  ?>条评论</h3>
		</div>
		<div class="tzt-panel_bd">
			<!--评论输出-->
			<div class="tzt-comment">
				<?php  foreach ( $comments as $key => $comment) { ?>
				<?php  include $this->GetTemplate('comment');  ?>
				<?php }   ?>
			</div>
			<!--评论翻页条输出-->
		</div>

		<?php if ($pagebar && $pagebar->PageAll > 1) { ?>
		<div class="tzt-panel_bd">
			<ul class="tzt-pagination">
				<li><a href="/?page=<?php  echo $pagebar->PageFirst;  ?>">首页</a></li>
				<?php if ($pagebar->prevbutton) { ?><li><a href="<?php  echo $pagebar->prevbutton;  ?>">上一页</a></li><?php } ?>
				<li class="active"><a><?php  echo $pagebar->PageNow;  ?></a></li>
				<?php if ($pagebar->nextbutton) { ?><li><a href="<?php  echo $pagebar->nextbutton;  ?>">下一页</a></li><?php } ?>
				<li><a href="#">共<?php  echo $pagebar->PageAll;  ?>页</a></li>
			</ul>
		</div>
		<?php } ?>

	<?php } ?>
<?php } ?>



<label id="AjaxCommentEnd"></label>