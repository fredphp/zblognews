<?php  /* Template Name:文章模板 */  ?>

<div class="tzt-panel">
	<?php if ($zbp->Config('TztCardVip')->Bread) { ?>
	<div class="tzt-panel_hd<?php if (!$zbp->Config('TztCardVip')->BreadM) { ?> m-hidden<?php } ?>">
		<div class="tzt-panel_bread">
			<span>当前位置：</span>
			<a href="<?php  echo $host;  ?>"><i class="icon icon-home"></i> 首页 </a> <i class="icon icon-right"></i>
			<?php if ($type=='article') { ?><?php if (is_object($article->Category) && $article->Category->ParentID) { ?><a href="<?php  echo $article->Category->Parent->Url;  ?>"><?php  echo $article->Category->Parent->Name;  ?></a> <i class="icon icon-right"></i> <?php } ?> <a href="<?php  echo $article->Category->Url;  ?>"><?php  echo $article->Category->Name;  ?></a><?php } ?>
		</div>
	</div>
	<?php } ?>
	<div class="tzt-panel_bd">
		<article class="tzt-article">
			<?php if ($article->Title!='未命名') { ?>
				<h1 class="tzt-article_title spacing-b"><?php  echo $article->Title;  ?></h1>
				<div class="tzt-article_subtit text-muted spacing-b">
					<?php if ($zbp->Config('TztCardVip')->ArtContSub1) { ?><a class="text-link" href="<?php  echo $article->Category->Url;  ?>"><i class="icon icon-category"></i> <?php  echo $article->Category->Name;  ?></a><?php } ?>
					<?php if ($zbp->Config('TztCardVip')->ArtContSub2) { ?><a class="text-link" href="<?php  echo $article->Author->Url;  ?>"><?php  echo $article->Author->StaticName;  ?></a><?php } ?>
					<?php if ($zbp->Config('TztCardVip')->ArtContSub5) { ?><span><?php  echo $article->Time("UpdateTime","Y-m-d H:i:s");  ?></span><?php } ?>
				</div>
				<?php if ($article->Category->Metas->liststyle!='2' && $article->Intro && $zbp->Config('TztCardVip')->ArtContDesc) { ?>
				<div class="tzt-panel_piece<?php if (!$zbp->Config('TztCardVip')->ArtContCodyM) { ?> m-hidden<?php } ?>">
					<?php  echo TransferHTML($article->Intro,'[nohtml]');  ?>
				</div>
				<?php } ?>
			<?php } ?>
			<div class="tzt-article_content viewer">
				<div class="spacing-b">
					<?php  echo $article->Content;  ?>
					<?php if ($article->Tags && $zbp->Config('TztCardVip')->ArtListTag) { ?><span class="tzt-text_tag author"><?php  foreach ( $article->Tags as $tag) { ?><a href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'>#<?php  echo $tag->Name;  ?></a><?php }   ?></span><?php } ?>
				</div>
				<?php if ($article->Metas->video) { ?>
				<div class="spacing-b">
					<video src="<?php  echo $article->Metas->video;  ?>" class="video_player" onplay="stopOtherMedia(this)" controls="controls"></video>
				</div>
				<?php } ?>
				<div class="spacing-b">
					<?php if ($article->Metas->mp3) { ?>
					<audio controls>
						<source src="<?php  echo $article->Metas->mp3;  ?>" type="audio/mpeg">
					</audio>
					<?php } ?>
				</div>
			</div>
			<?php if ($zbp->Config('TztCardVip')->ShCode && $article->Category->Metas->liststyle!='2') { ?>
			<div class="spacing-b text-center">
				<a class="btn btn-main btn-width" href="javascript:tzt_dialog('DialogShang');"><?php  echo $zbp->Config('TztCardVip')->ShCodeBtn;  ?></a>
	</div>
			<?php } ?>
			<?php if ($zbp->Config('TztCardVip')->ArtContCody && $article->Category->Metas->liststyle!='2') { ?>
			<div class="tzt-panel_piece<?php if (!$zbp->Config('TztCardVip')->ArtContCodyM) { ?> m-hidden<?php } ?>">
				<div class="tzt-panel_bd">
					<strong>版权声明：</strong><?php  echo $zbp->Config('TztCardVip')->ArtContCodyText;  ?>
				</div>
			</div>
			<?php } ?>
			<?php if ($zbp->Config('TztCardVip')->ArtContSub3) { ?><div class="text-muted">阅读 <?php  echo $article->ViewNums;  ?></div><?php } ?>
		</article>
	</div>
	<?php if ($zbp->Config('TztCardVip')->ArtContShare) { ?>
	<div class="tzt-panel_ft text-muted<?php if (!$zbp->Config('TztCardVip')->ArtContShareM) { ?> m-hidden<?php } ?>">
		分享到: <span class="tzt-share" data-sites="<?php if ($zbp->Config('TztCardVip')->Share1) { ?>wechat,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share2) { ?>qq,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share3) { ?>qzone,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share4) { ?>weibo,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share5) { ?>douban,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share6) { ?>google,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share7) { ?>linkedin,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share8) { ?>facebook,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share9) { ?>twitter,<?php } ?><?php if ($zbp->Config('TztCardVip')->Share0) { ?>copy<?php } ?>"></span>
	</div>
	<?php } ?>
</div>

<?php if ($zbp->Config('TztCardVip')->AdArtFoot) { ?>
<div class="tzt-panel">
	<div class="tzt-panel-bd">
		<?php if ($zbp->Config('TztCardVip')->AdArtFootCode) { ?>
		<?php  echo $zbp->Config('TztCardVip')->AdArtFootCode;  ?>
		<?php }else{  ?>
		<a href="<?php  echo $zbp->Config('TztCardVip')->AdArtFootUrl;  ?>" target="_blank">
			<img src="<?php  echo $zbp->Config('TztCardVip')->AdArtFootImg;  ?>" alt="广告" />
		</a>
		<?php } ?>
	</div>
</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->ArtContNext) { ?>
<div class="tzt-panel<?php if (!$zbp->Config('TztCardVip')->ArtContNextM) { ?> m-hidden<?php } ?>">
	<div class="tzt-panel_bd text-overflow">
		<p>
			<strong>上一篇：</strong><?php if ($article->Prev) { ?><a href="<?php  echo $article->Prev->Url;  ?>"><?php  echo $article->Prev->Title;  ?></a><?php }else{  ?>没有了<?php } ?>
		</p>
		<p class="margin-0">
			<strong>下一篇：</strong><?php if ($article->Next) { ?><a href="<?php  echo $article->Next->Url;  ?>"><?php  echo $article->Next->Title;  ?></a><?php }else{  ?>没有了<?php } ?>
		</p>
	</div>
</div>
<?php } ?>

<?php if (!$article->IsLock && $zbp->Config('TztCardVip')->ArtComment) { ?>
	<div class="tzt-panel" id="comment">
		<?php  include $this->GetTemplate('comments');  ?>
	</div>

	<div class="tzt-dialog bottom" id="DialogComment">
		<div class="page-box">
			<div class="tzt-panel">
				<div id="comment-box"></div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($zbp->Config('TztCardVip')->ShCode) { ?>
<div class="tzt-dialog bottom" id="DialogShang">
	<div class="page-box">
		<div class="tzt-panel">
			<a class="dialogclose pull-right" href="javascript:;"><i class="icon icon-error"></i></a>
			<div class="tzt-panel_bd text-center" style="padding: 40px 20px;">
				<p>扫一扫二维码打赏</p>
				<p><img src="<?php  echo $zbp->Config('TztCardVip')->ShCodeImg;  ?>" alt="扫一扫二维码打赏" /></p>
			</div>
		</div>
	</div>
</div>
<?php } ?>
