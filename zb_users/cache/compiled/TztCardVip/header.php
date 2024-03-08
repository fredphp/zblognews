<?php  /* Template Name:公共头部 */  ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,maximum-scale=1">
<?php if ($zbp->Config('TztCardVip')->Seo) { ?><?php  include $this->GetTemplate('post-seo');  ?><?php }else{  ?><title><?php  echo $title;  ?> - <?php  echo $name;  ?></title><?php } ?>
<?php if ($zbp->Config('TztCardVip')->StaticUrl) { ?><?php  $static = $zbp->Config('TztCardVip')->StaticUrl; ?><?php }else{  ?><?php  $static = ''.$host.'zb_users/theme/'.$theme.'/'; ?><?php } ?>
<link rel="shortcut icon" href="<?php  echo $zbp->Config('TztCardVip')->Favicon;  ?>" type="image/x-icon">
<link rel="stylesheet" href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/font/iconfont.css?<?php  echo $themeinfo['modified'];  ?>">
<link rel="stylesheet" href="<?php  echo $static;  ?>share/style.css?<?php  echo $themeinfo['modified'];  ?>">
<link rel="stylesheet" href="<?php  echo $static;  ?>script/carousel.css?<?php  echo $themeinfo['modified'];  ?>">
<?php if ($zbp->Config('TztCardVip')->TztLess) { ?>
<link rel="stylesheet/less" href="<?php  echo $static;  ?>style/<?php  echo $style;  ?>.less?<?php  echo $themeinfo['modified'];  ?>">
<?php }else{  ?>
<link rel="stylesheet" href="<?php  echo $static;  ?>style/<?php  echo $style;  ?>.css?<?php  echo $themeinfo['modified'];  ?>">
<?php } ?>
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js?v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js?v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php?<?php if (isset($html_js_hash)) { ?>hash=<?php  echo $html_js_hash;  ?>&<?php } ?>v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $static;  ?>script/cms.js?<?php  echo $themeinfo['modified'];  ?>"></script>
<script src="<?php  echo $static;  ?>script/carousel.js?<?php  echo $themeinfo['modified'];  ?>"></script>
<script src="<?php  echo $static;  ?>script/jquery.qrcode.min.js?<?php  echo $themeinfo['modified'];  ?>"></script>
<script src="<?php  echo $static;  ?>share/share.js?<?php  echo $themeinfo['modified'];  ?>"></script>
<?php if ($type=='index'&&$page=='1') { ?>
<link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="/zb_system/xml-rpc/?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/zb_system/xml-rpc/wlwmanifest.xml">
<?php } ?>
<?php  echo $zbp->Config('TztCardVip')->SubStatic;  ?>
<style>
    <?php 
        $SideWidth = $zbp->Config('TztCardVip')->WebSideWidth+30;
     ?>
    <?php if ($zbp->Config('TztCardVip')->MainColor) { ?>body{--tzt-MAIN:<?php  echo $zbp->Config('TztCardVip')->MainColorVal;  ?>;}<?php } ?>
    @media screen and (min-width: 1200px){
        .page{
            <?php if ($zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?>padding-top: 90px;<?php }else{  ?>padding-top: 30px;<?php } ?>
        }
        .page-box{ 
            width: <?php  echo $zbp->Config('TztCardVip')->MainWidth;  ?>px;
            <?php if ($zbp->Config('TztCardVip')->WebSide) { ?><?php if ($zbp->Config('TztCardVip')->WebSideLayout) { ?>padding-right: <?php  echo $SideWidth;  ?>px;<?php }else{  ?>padding-left: <?php  echo $SideWidth;  ?>px;<?php } ?><?php } ?>
        }
        .tzt-sidebar-box {
            width: <?php  echo $zbp->Config('TztCardVip')->WebSideWidth;  ?>px;
            <?php if ($zbp->Config('TztCardVip')->WebSideLayout) { ?>right: 0;<?php }else{  ?>left: 0;<?php } ?>
            <?php if ($zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?>top: 90px;<?php }else{  ?>top: 30px;<?php } ?>
        }
    }
    @media screen and (max-width: 768px){
        .page{
            <?php if ($zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed) { ?>padding-top: 60px;<?php }else{  ?>padding-top: 0;<?php } ?>
        }
    }
</style>
<?php  echo $header;  ?>