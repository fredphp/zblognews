<?php

RegisterPlugin("TztCard","ActivePlugin_TztCard");

function ActivePlugin_TztCard(){
	global $zbp;
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'TztCard_AddMenu');
}

function TztCard_AddMenu( & $m ) {
  global $zbp;
  $m[] = MakeTopMenu( "root", "主题设置", $zbp->host . "zb_users/theme/TztCard/main.php", "", "topmenu_TztCard", "icon-grid-1x2-fill" );
}

function InstallPlugin_TztCard() {
	global $zbp;
	$filesList = array("LogoImg","TopImg","CodeImg");
	foreach ($filesList as $key => $value) {
	  $uFile = TztCard_Path("u-{$value}");
	  $vFile = TztCard_Path("v-{$value}");
	  if (!is_file($uFile)) {
	    @mkdir(dirname($uFile));
	    copy($vFile, $uFile);
	  }
	}
}

function TztCard_Path($file, $t = 'path')
{
  global $zbp;
  $result = $zbp->$t . 'zb_users/theme/TztCard/';

  switch ($file) {
	// logo.png
	case 'u-LogoImg':
		return $result . 'upload/logo.png';
		break;
	case 'v-LogoImg':
		return $result . 'images/logo.png';
		break;
	// top.jpg
	case 'u-TopImg':
		return $result . 'upload/top.jpg';
		break;
	case 'v-TopImg':
		return $result . 'images/top.jpg';
		break;
	// code.jpg
	case 'u-CodeImg':
		return $result . 'upload/code.jpg';
		break;
	case 'v-CodeImg':
		return $result . 'images/code.jpg';
		break;
    // 目录
    case 'upload':
      return $result . 'upload/';
      break;
    case 'images':
      return $result . 'images/';
      break;
    case 'main':
      return $result . 'main.php';
      break;
    default:
      return $result . $file;
  }
}