<?php  /* Template Name:搜索页 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
	<head>
	<?php  include $this->GetTemplate('header');  ?>
	</head>
	<body>
		<?php  include $this->GetTemplate('head');  ?>
		<main class="page">
			<div class="page-bd">
				<div class="tzt-panel">
					<div class="tzt-panel_hd">
						<form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="search-form mb15" id="#form">
							<button type="submit" class="submit"><i class="icon iconfont icon-search"></i> 搜索</button>
							<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词" value="<?php  echo $_GET['q'];  ?>">
						</form>
					</div>
					<div class="tzt-panel_bd">
						<?php  foreach ( $articles as $article) { ?>
						<a href="<?php  echo $article->Url;  ?>" class="tzt-media-box" title="<?php  echo $article->Title;  ?>">
							<div class="tzt-media-box_hd">
								<h3 class="tzt-media-box_title"><?php  echo $article->Title;  ?></h3>
								<?php if ($article->Intro) { ?>
								<div class="tzt-media-box_desc m-hidden">
									<?php $Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),40)).'...'); ?> <?php  echo $Intro;  ?>
								</div>
								<?php } ?>
								<div class="tzt-media-box_time"><?php if ($article->TopType) { ?><span class="text-red">置顶</span><span class="split-line"></span><?php } ?><?php  echo $article->Time();  ?></div>
							</div>
							<?php if ($article->AllImages) { ?>
							<div class="tzt-media-box_bd">
								<img src="<?php  echo $article->AllImages[0];  ?>" alt="<?php  echo $article->Title;  ?>">
							</div>
							<?php } ?>
						</a>
						<?php }   ?>
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
					
				</div>
			</div>
		</main>
		<?php  include $this->GetTemplate('footer');  ?>
	</body>
</html>