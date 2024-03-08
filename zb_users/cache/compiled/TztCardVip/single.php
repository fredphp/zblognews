<?php  /* Template Name:文章页单页 */  ?>
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
				<?php if ($article->Type==ZC_POST_TYPE_ARTICLE) { ?>
				<?php  include $this->GetTemplate('post-single');  ?>
				<?php }else{  ?>
				<?php  include $this->GetTemplate('post-page');  ?>
				<?php } ?>
			</div>
		</div>
	</main>
	<?php  include $this->GetTemplate('footer');  ?>
</body>

</html>
