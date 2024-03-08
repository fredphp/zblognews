<?php  /* Template Name:公共导航栏 */  ?>
<div class="tzt-web_bg"<?php if ($zbp->Config('TztCardVip')->DefaultWeb && !zbp_is_mobile()) { ?> style="background-image:url('<?php  echo $zbp->Config('TztCardVip')->DefaultWebBg;  ?>');"<?php } ?>></div>
<?php if ($zbp->Config('TztCardVip')->Header) { ?>
<header class="tzt-header<?php if ($zbp->Config('TztCardVip')->HeaderFixed) { ?> fixed<?php } ?><?php if ($zbp->Config('TztCardVip')->HeaderBg) { ?> diybg<?php } ?><?php if (zbp_is_mobile()) { ?> hide<?php } ?><?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> left<?php } ?>"<?php if ($zbp->Config('TztCardVip')->HeaderBg) { ?> style="background-image: linear-gradient(45deg, <?php  echo $zbp->Config('TztCardVip')->HeaderBgColor;  ?>, <?php  echo $zbp->Config('TztCardVip')->HeaderBgColor2;  ?>);"<?php } ?>>
	<div class="page-box">
		<div class="tzt-header_hd<?php if (!$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> pull-left<?php } ?>">
			<a href="<?php  echo $host;  ?>">
				<img src="<?php  echo $zbp->Config('TztCardVip')->Logo;  ?>" alt="<?php  echo $zbp->Config('TztCardVip')->SiteTitle;  ?>">
			</a>
		</div>
		<?php if ($zbp->Config('TztCardVip')->HeaderLeft) { ?>
		<ul class="tzt-header_bd<?php if (!$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> pull-left<?php } ?><?php if (!$zbp->Config('TztCardVip')->HeaderLeftM) { ?> m-hidden<?php } ?>">
			<?php  foreach ( json_decode($zbp->Config('TztCardVip')->HeaderLeftData,true) as $key=>$value) { ?>
			<?php if ($value['is']) { ?><li<?php if (!$value['ism']) { ?> class="m-hidden"<?php } ?>><a href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>"><i class="<?php  echo $value['icon'];  ?>"></i><?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> <?php  echo $value['title'];  ?><?php } ?></a></li><?php } ?>
			<?php }   ?>
</ul>
		<?php } ?>
		<?php if ($zbp->Config('TztCardVip')->HeaderRight) { ?>
		<ul class="tzt-header_ft<?php if (!$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> pull-right<?php } ?><?php if (!$zbp->Config('TztCardVip')->HeaderRightM) { ?> m-hidden<?php } ?>">
			<?php  foreach ( json_decode($zbp->Config('TztCardVip')->HeaderRightData,true) as $key=>$value) { ?>
			<?php if ($value['is']) { ?><li<?php if (!$value['ism']) { ?> class="m-hidden"<?php } ?>><a href="<?php  echo $value['url'];  ?>" title="<?php  echo $value['title'];  ?>"><i class="<?php  echo $value['icon'];  ?>"></i><?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> <?php  echo $value['title'];  ?><?php } ?></a></li><?php } ?>
			<?php }   ?>
			<?php if ($zbp->Config('TztCardVip')->HeaderRightUser) { ?>
			<!-- <?php if ($user->ID > 0) { ?>
			<li<?php if (!$zbp->Config('TztCardVip')->HeaderRightUserM) { ?> class="m-hidden"<?php } ?>><a href="<?php if ($zbp->Config('TztCardVip')->HeaderRightUserUrl) { ?><?php  echo $zbp->Config('TztCardVip')->HeaderRightUserUrl;  ?><?php }else{  ?><?php  echo $host;  ?>zb_system/admin/index.php<?php } ?>"><img src="<?php  echo $user->Avatar;  ?>" alt=""><?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> <?php  echo $zbp->Config('TztCardVip')->HeaderRightUserLoginTit;  ?><?php } ?></a></li>
			<?php }else{  ?>
			<li<?php if (!$zbp->Config('TztCardVip')->HeaderRightUserM) { ?> class="m-hidden"<?php } ?>><a href="<?php if ($zbp->Config('TztCardVip')->HeaderRightUserLogin) { ?><?php  echo $zbp->Config('TztCardVip')->HeaderRightUserLogin;  ?><?php }else{  ?><?php  echo $host;  ?>zb_system/login.php<?php } ?>"><i class="icon icon-user"></i><?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?> <?php  echo $zbp->Config('TztCardVip')->HeaderRightUserLoginTit;  ?><?php } ?></a></li>
			<?php } ?> -->
			<?php } ?>
</ul>
		<?php } ?>
	</div>
	<?php if ($zbp->Config('TztCardVip')->HeaderLeftFixed) { ?>
	<a class="headeropen<?php if (zbp_is_mobile()) { ?> show<?php } ?>" href="javascript:;">
		<i class="icon icon-left"></i>
	</a>
	<?php } ?>
</header>
<?php } ?>
