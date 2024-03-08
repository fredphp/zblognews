<?php  /* Template Name:首页及列表页 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
<?php  include $this->GetTemplate('header');  ?>
</head>
<body <?php if ($zbp->Config('TztCardVip')->CloreDark) { ?> data-skin="dark"<?php } ?>>
	<?php  include $this->GetTemplate('head');  ?>
	<main class="page">
		<div class="page-box">
			<div class="page-bd">

				<?php if ($type=='index' && $zbp->Config('TztCardVip')->Slide) { ?>
				<div class="owl-carousel<?php if ($zbp->Config('TztCardVip')->IdenxTabs) { ?> index<?php } ?>" data-items="1"<?php if ($zbp->Config('TztCardVip')->SlideAuto) { ?> data-auto="1"<?php } ?><?php if ($zbp->Config('TztCardVip')->SlidePage) { ?> data-page="1"<?php } ?><?php if ($zbp->Config('TztCardVip')->SlideNav) { ?> data-nav="1"<?php } ?> <?php if ($zbp->Config('TztCardVip')->SlidePageNum) { ?>data-pagenum="1"<?php } ?> <?php if ($zbp->Config('TztCardVip')->SlideType) { ?> data-type="<?php  echo $zbp->Config('TztCardVip')->SlideType;  ?>"<?php } ?>>
					<?php  foreach ( json_decode($zbp->Config('TztCardVip')->SlideData,true) as $value) { ?>
					<?php if ($value['is']) { ?><a href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>"<?php if ($value['blank']) { ?> target="_blank"<?php } ?>><img src="<?php  echo $value['img'];  ?>" alt="<?php  echo $value['title'];  ?>"></a><?php } ?>
					<?php }   ?>
				</div>
				<?php } ?>

				<?php if ($type=='index' && $zbp->Config('TztCardVip')->IdenxTabs) { ?>
				<ul class="tzt-index_nav">
					<?php  foreach ( json_decode($zbp->Config('TztCardVip')->IdenxTabsData,true) as $value) { ?>
					<?php if ($value['is']) { ?>
					<li>
						<a<?php if ($value['blank']) { ?> target="_blank"<?php } ?> href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>">
							<img src="<?php  echo $value['img'];  ?>" alt="<?php  echo $value['title'];  ?>">
							<span><?php  echo $value['title'];  ?></span>
						</a>
					</li>
					<?php } ?>
					<?php }   ?>
				</ul>
				<?php } ?>

				<?php if ($type=='author') { ?>
				<div class="tzt-index_auth">
					<div class="index-auth_bg" style="background-image: url('<?php  echo $author->Avatar;  ?>');"></div>
					<?php if ($author->Intro) { ?><div class="intro"><?php  echo $author->Intro;  ?></div><?php }else{  ?><div class="intro">TA太懒了，什么都没有写！</div><?php } ?>
					<div class="user">
						<div class="name"><?php  echo $author->Name;  ?> <p><?php  echo $author->Email;  ?></p></div>
						<span class="avatar-img"><img src="<?php  echo $author->Avatar;  ?>" alt="<?php  echo $author->Name;  ?>"></span>
					</div>
				</div>
				<?php } ?>
				<div class="tzt-panel"<?php if ($type=='index' || $type=='author') { ?> style="padding-top:0; border-radius: 0 0 var(--tzt-circle) var(--tzt-circle);"<?php } ?>>
					<?php if ($type=='tag') { ?>
					<div class="tzt-panel_hd text-center">
						<h3>与“<?php  echo $tag->Name;  ?>” 相关的“<?php  echo $tag->Count;  ?>”条结果</h3>
					</div>
					<?php }elseif($type=='category') {  ?>
					<div class="tzt-panel_hd text-center">
						<h3>在“<?php  echo $category->Name;  ?>” 栏目下找到“<?php  echo $category->Count;  ?>”条结果</h3>
					</div>
					<div class="tzt-panel_hd">
						<ul class="tzt-nav-tabs">
							<li<?php if (GetVars('order','GET') == 'inputtime' || !GetVars('order','GET')) { ?> class="active"<?php } ?>>
								<a href="?cate=<?php  echo $category->ID;  ?>&order=inputtime&sort=0">按时间 <i class="icon icon-sort"></i></a>
							</li>
							<li<?php if (GetVars('order','GET') == 'updatetime') { ?> class="active"<?php } ?>>
								<a href="?cate=<?php  echo $category->ID;  ?>&order=updatetime&sort=0">按更新 <i class="icon icon-sort"></i></a>
							</li>
							<li<?php if (GetVars('order','GET') == 'hits') { ?> class="active"<?php } ?>>
								<a href="?cate=<?php  echo $category->ID;  ?>&order=hits&sort=0">按热门 <i class="icon icon-sort"></i></a>
							</li>
							<li<?php if (GetVars('order','GET') == 'comments') { ?> class="active"<?php } ?>>
								<a href="?cate=<?php  echo $category->ID;  ?>&order=comments&sort=0">按热评 <i class="icon icon-sort"></i></a>
							</li>
						</ul>
					</div>
					<?php } ?>
					<?php if ($articles) { ?>
					<?php  include $this->GetTemplate('post-multi');  ?>
					<?php  include $this->GetTemplate('pagebar');  ?>
					<?php }else{  ?>
					<div class="tzt-panel_bd">
						<div class="text-center" style="padding: 30px;">
							<p class="mb15"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/images/empty.png" width="160" alt=""></p>
							<?php if ($type=='tag') { ?>
							<p class="text-muted">没有找到与“<?php  echo $tag->Name;  ?>” 相关的内容</p>
							<?php }elseif($type=='category') {  ?>
							<p class="text-muted">没有找到与“<?php  echo $category->Name;  ?>” 相关的内容</p>
							<?php }else{  ?>
							<p class="text-muted">这里空空如也</p>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</main>
	<?php  include $this->GetTemplate('footer');  ?>
	<script>
		$(window).scroll(function() {
			viewer_scroll();
		});
	</script>
</body>

</html>
