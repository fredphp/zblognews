<?php  /* Template Name:文章模板 */  ?>
<div class="tzt-panel">
	<div class="tzt-panel_hd">
		<div class="tzt-panel_bread">
			<span>当前位置：</span>
			<a href="<?php  echo $host;  ?>"><i class="icon iconfont icon-home"></i> 首页 </a> <i class="icon iconfont icon-right1"></i>
			<?php if ($type=='article') { ?><?php if (is_object($article->Category) && $article->Category->ParentID) { ?><a href="<?php  echo $article->Category->Parent->Url;  ?>"><?php  echo $article->Category->Parent->Name;  ?></a> <i class="icon iconfont icon-right1"></i> <?php } ?> <a href="<?php  echo $article->Category->Url;  ?>"><?php  echo $article->Category->Name;  ?></a><?php } ?>
		</div>
	</div>
	<article class="tzt-panel_bd">
		<h1 class="tzt-article_title mb15"><?php  echo $article->Title;  ?></h1>
		<div class="tzt-article_subtit text-muted mb15">
			<span class="m-hidden">栏目：</span><a class="text-link" href="<?php  echo $article->Category->Url;  ?>"><?php  echo $article->Category->Name;  ?></a><span class="split-line"></span>
			<span class="m-hidden">作者：</span><?php  echo $article->Author->StaticName;  ?><span class="split-line"></span>
			<span class="m-hidden">时间：</span><?php  echo $article->Time("UpdateTime","Y-m-d H:i:s");  ?>
		</div>
		<?php if ($zbp->Config('TztCard')->ArticleDesc) { ?>
		<div class="tzt-article_desc mb15">
			<?php  echo $article->Intro;  ?>
		</div>
		<?php } ?>
		<div class="tzt-article_content mb15" id="viewer">
			<?php  echo $article->Content;  ?>
		</div>
		<?php if (count($article->Tags)>0) { ?>
		<div class="tzt-article_tag mb15">
			<?php  foreach ( $article->Tags as $tag) { ?><a class="btn btn-mini btn-border" href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'><?php  echo $tag->Name;  ?></a> &nbsp;&nbsp;<?php }   ?>
		</div>
		<?php } ?>
		<?php if ($zbp->Config('TztCard')->ArticleCody) { ?>
		<div class="tzt-panel bg">
			<div class="tzt-panel_bd">
				<strong>版权声明：</strong><?php  echo $zbp->Config('TztCard')->ArticleCody;  ?>
			</div>
		</div>
		<?php } ?>
	</article>
	<div class="text-muted">阅读：<?php  echo $article->ViewNums;  ?>次</div>
</div>

<div class="tzt-panel">
	<div class="tzt-panel_bd clearfix">
		<p>
			<strong>上一篇：</strong><?php if ($article->Prev) { ?><a href="<?php  echo $article->Prev->Url;  ?>"><?php  echo $article->Prev->Title;  ?></a><?php }else{  ?>没有了<?php } ?>
		</p>
		<p class="margin-0">
			<strong>下一篇：</strong><?php if ($article->Next) { ?><a href="<?php  echo $article->Next->Url;  ?>"><?php  echo $article->Next->Title;  ?></a><?php }else{  ?>没有了<?php } ?>
		</p>
	</div>
</div>

<?php if ($zbp->Config('TztCard')->Related) { ?>
<div class="tzt-panel">
	<div class="tzt-panel_hd">
		<h3>相关文章</h3>
	</div>
	<div class="tzt-panel_bd">
		<?php  foreach ( GetList(5,$article->Category->ID) as $related) { ?>
		<a href="<?php  echo $related->Url;  ?>" class="tzt-media-box" title="<?php  echo $related->Title;  ?>">
			<div class="tzt-media-box_hd">
				<h3 class="tzt-media-box_title"><?php  echo $related->Title;  ?>
				</h3>
				<?php if ($related->Intro) { ?>
				<div class="tzt-media-box_desc m-hidden">
					<?php $Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($related->Intro,'[nohtml]'),40)).'...'); ?> <?php  echo $Intro;  ?>
				</div>
				<?php } ?>
				<div class="tzt-media-box_time"><?php if ($related->TopType) { ?><span class="text-red">置顶</span><span class="split-line"></span><?php } ?><?php  echo $related->Time();  ?></div>
			</div>
			<?php if ($related->AllImages) { ?>
			<div class="tzt-media-box_bd">
				<img src="<?php  echo $related->AllImages[0];  ?>" alt="<?php  echo $related->Title;  ?>">
			</div>
			<?php } ?>
		</a>
		<?php }   ?>
	</div>
</div>
<?php } ?>

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

