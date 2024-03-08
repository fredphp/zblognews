<label id="AjaxCommentBegin"></label><?php  /* Template Name:所有评论模板 */  ?>

<?php if ($socialcomment) { ?>
	<div class="tzt-panel_bd">
		<?php  echo $socialcomment;  ?>
	</div>
<?php }else{  ?>
	<?php if ($article->CommNums>0) { ?>
		<div class="tzt-panel_hd">
			<a class="text-link pull-right" href="javascript:;" onclick="comment_reply('0')">我要留言</a>
			<h3>网友留言</h3>
		</div>
		<div class="tzt-panel_bd">
			<!--评论输出-->
			<?php  foreach ( $comments as $key => $comment) { ?>
			<?php  include $this->GetTemplate('comment');  ?>
			<?php }   ?>
			<!--评论翻页条输出-->
		</div>
		
		<?php if ($pagebar && $pagebar->PageAll > 1) { ?>
		<div class="tzt-panel_ft">
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

<!--评论框-->
<div id="comment-post" class="mt15"></div>
<?php  include $this->GetTemplate('commentpost');  ?>

<label id="AjaxCommentEnd"></label>