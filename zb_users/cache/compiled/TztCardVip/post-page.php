<?php  /* Template Name:留言板模板 */  ?>
<div class="tzt-panel">
	<article class="tzt-panel_bd">
		<h1 class="tzt-article_title mb15"><?php  echo $article->Title;  ?></h1>
		<div class="tzt-article_content mb15" id="viewer">
			<?php  echo $article->Content;  ?>
		</div>
	</article>
</div>

<?php if (!$article->IsLock) { ?>
	<div class="tzt-panel">
		<?php  include $this->GetTemplate('comments');  ?>
	</div>
	
	<div class="tzt-dialog bottom" id="DialogComment">
		<div class="page-bd">
			<div class="tzt-panel">
				<div id="comment-box"></div>
			</div>
		</div>
	</div>
<?php } ?>
