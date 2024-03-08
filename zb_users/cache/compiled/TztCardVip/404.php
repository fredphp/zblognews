<?php  /* Template Name:404错误页 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
<head>
  <?php  include $this->GetTemplate('header');  ?>
</head>
<body>
	<div class="page">
		<div class="page-bd">
			<div class="text-center" style="margin-top: 200px;">
				<img class="img-responsive" width="400" src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/images/404.gif" alt="">
			</div>
			<div class="text-center">
				当前页面错误哦!
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		setTimeout(function(){
			window.location.href = "<?php  echo $host;  ?>";
		}, 3000 )
	</script>
</body>
</html>