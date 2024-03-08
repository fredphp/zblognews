<?php  /* Template Name:公共导航栏 */  ?>

<header class="tzt-header">
	<div class="page-bd">
		<div class="tzt-header_hd pull-left">
			<a href="<?php  echo $host;  ?>" title="<?php  echo $name;  ?>">
				<img src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/upload/logo.png" alt="<?php  echo $name;  ?>"/>
			</a>
		</div>
		<div class="tzt-header_bd pull-left">
			<a href="<?php  echo $host;  ?>"><i class="icon iconfont icon-home"></i></a>
		</div>
		<div class="tzt-header_ft pull-right">
			<a href="javascript:tzt_dialog('DialogSearch');"><i class="icon iconfont icon-search"></i></a>
			<a href="javascript:tzt_dialog('DialogType');"><i class="icon iconfont icon-classification" style="font-size: 26px;"></i></a>
		</div>
	</div>
</header>
