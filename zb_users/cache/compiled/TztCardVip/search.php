<?php  /* Template Name:搜索页 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
<?php  include $this->GetTemplate('header');  ?>
</head>
<body <?php if ($zbp->Config('TztCardVip')->CloreDark) { ?> data-tzt-theme="dark"<?php } ?>>
	<?php  include $this->GetTemplate('head');  ?>
	<main class="page">
		<div class="page-box">
			<div class="page-bd">
				<div class="tzt-panel">
					<?php if ($articles) { ?>
					<div class="tzt-panel_hd text-center">
						<h3>与“<?php  echo $_GET['q'];  ?>” 相关的搜索结果</h3>
					</div>
					<div class="tzt-panel_bd">
						<form method="post" name="search" action="<?php  echo $host;  ?>zb_system/cmd.php?act=search" class="search-form mb15" id="#form">
							<button type="submit" class="submit"><i class="icon icon-search"></i> 搜索</button>
							<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词" value="<?php  echo $_GET['q'];  ?>">
						</form>
					</div>
					<?php  include $this->GetTemplate('post-multi');  ?>
					<?php  include $this->GetTemplate('pagebar');  ?>
					<?php }else{  ?>
					<div class="tzt-panel_bd">
						<div class="text-center" style="padding: 30px;">
							<p class="mb15"><img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/images/empty.png" width="160" alt=""></p>
							<?php if ($_GET['q']) { ?>
							<p class="text-muted">没有找到与“<?php  echo $_GET['q'];  ?>” 相关的内容</p>
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
</body>

</html>
