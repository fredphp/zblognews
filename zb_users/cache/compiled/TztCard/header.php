<?php  /* Template Name:公共头部 */  ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,maximum-scale=1">
<?php if ($type=='article') { ?>
  <title><?php  echo $title;  ?>_<?php  echo $article->Category->Name;  ?>_<?php  echo $name;  ?></title>
  <?php  $keywords = $article->TagsToNameString(); $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');  ?>
  <meta name="keywords" content="<?php  echo $keywords;  ?>"/>
  <meta name="description" content="<?php  echo $description;  ?>"/>
  <meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
  <link rel="canonical" href="<?php  echo $article->Url;  ?>"/>
<?php }elseif($type=='page') {  ?>
  <title><?php  echo $title;  ?>_<?php  echo $name;  ?>_<?php  echo $subname;  ?></title>
  <meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>"/>
  <?php  $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');  ?>
  <meta name="description" content="<?php  echo $description;  ?>"/>
  <meta name="author" content="<?php  echo $article->Author->StaticName;  ?>">
  <link rel="canonical" href="<?php  echo $article->Url;  ?>"/>
<?php }elseif($type=='index') {  ?>
  <title><?php  echo $name;  ?><?php if ($page>'1') { ?>_第<?php  echo $pagebar->PageNow;  ?>页<?php } ?>_<?php  echo $subname;  ?></title>
  <meta name="keywords" content="<?php  echo $zbp->Config('TztCard')->KeyWords;  ?>,<?php  echo $name;  ?>">
  <meta name="description" content="<?php  echo $zbp->Config('TztCard')->DescriPtion;  ?>_<?php  echo $name;  ?>_<?php  echo $title;  ?>">
  <meta name="author" content="<?php  echo $zbp->members[1]->Name;  ?>">
  <link rel="canonical" href="<?php  echo $zbp->fullcurrenturl;  ?>">
<?php }else{  ?>
  <?php  $title = preg_replace('/\s.+$/','',$title); $fixTitle = ""; $fixDesc = "";
  if (isset($pagebar)){
    $fixTitle = "_第{$pagebar->PageNow}页";
    $fixDesc = "_当前是第{$pagebar->PageNow}页";
  }
   ?>
  <title><?php  echo $title;  ?>_<?php  echo $name;  ?><?php  echo $fixTitle;  ?></title>
  <meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $name;  ?>">
  <meta name="description" content="<?php  echo $title;  ?>_<?php  echo $name;  ?><?php  echo $fixDesc;  ?>">
  <meta name="author" content="<?php  echo $zbp->members[1]->Name;  ?>">
  <link rel="canonical" href="<?php  echo $zbp->fullcurrenturl;  ?>">
<?php } ?>
<link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/<?php  echo $style;  ?>.css?<?php  echo $themeinfo['modified'];  ?>" rel="stylesheet" type="text/css"/>
<link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/style/font/iconfont.css?<?php  echo $themeinfo['modified'];  ?>" rel="stylesheet" type="text/css"/>
<?php if ($type=='article') { ?><link href="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/viewer.css" rel="stylesheet" type="text/css" /><?php } ?>
<script src="<?php  echo $host;  ?>zb_system/script/jquery-2.2.4.min.js?v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $host;  ?>zb_system/script/zblogphp.js?v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $host;  ?>zb_system/script/c_html_js_add.php?<?php if (isset($html_js_hash)) { ?>hash=<?php  echo $html_js_hash;  ?>&<?php } ?>v=<?php  echo $version;  ?>"></script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/jquery.qrcode.min.js"></script>
<script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/cms.js?<?php  echo $themeinfo['modified'];  ?>"></script>
<?php if ($type=='article') { ?><script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/viewer.min.js"></script><?php } ?>
<?php  echo $header;  ?>
<?php if ($type=='index'&&$page=='1') { ?>
  <link rel="alternate" type="application/rss+xml" href="<?php  echo $feedurl;  ?>" title="<?php  echo $name;  ?>">
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php  echo $host;  ?>zb_system/xml-rpc/?rsd">
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php  echo $host;  ?>zb_system/xml-rpc/wlwmanifest.xml">
<?php } ?>
