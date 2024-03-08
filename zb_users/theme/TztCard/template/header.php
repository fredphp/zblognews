{* Template Name:公共头部 *}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,maximum-scale=1">
{if $type=='article'}
  <title>{$title}_{$article.Category.Name}_{$name}</title>
  {php} $keywords = $article->TagsToNameString(); $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); {/php}
  <meta name="keywords" content="{$keywords}"/>
  <meta name="description" content="{$description}"/>
  <meta name="author" content="{$article.Author.StaticName}">
  <link rel="canonical" href="{$article.Url}"/>
{elseif $type=='page'}
  <title>{$title}_{$name}_{$subname}</title>
  <meta name="keywords" content="{$title},{$name}"/>
  {php} $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...'); {/php}
  <meta name="description" content="{$description}"/>
  <meta name="author" content="{$article.Author.StaticName}">
  <link rel="canonical" href="{$article.Url}"/>
{elseif $type=='index'}
  <title>{$name}{if $page>'1'}_第{$pagebar.PageNow}页{/if}_{$subname}</title>
  <meta name="keywords" content="{$zbp->Config('TztCard')->KeyWords},{$name}">
  <meta name="description" content="{$zbp->Config('TztCard')->DescriPtion}_{$name}_{$title}">
  <meta name="author" content="{$zbp.members[1].Name}">
  <link rel="canonical" href="{$zbp.fullcurrenturl}">
{else}
  {php} $title = preg_replace('/\s.+$/','',$title); $fixTitle = ""; $fixDesc = "";
  if (isset($pagebar)){
    $fixTitle = "_第{$pagebar->PageNow}页";
    $fixDesc = "_当前是第{$pagebar->PageNow}页";
  }
  {/php}
  <title>{$title}_{$name}{$fixTitle}</title>
  <meta name="keywords" content="{$title},{$name}">
  <meta name="description" content="{$title}_{$name}{$fixDesc}">
  <meta name="author" content="{$zbp.members[1].Name}">
  <link rel="canonical" href="{$zbp.fullcurrenturl}">
{/if}
<link href="{$host}zb_users/theme/{$theme}/style/{$style}.css?{$themeinfo['modified']}" rel="stylesheet" type="text/css"/>
<link href="{$host}zb_users/theme/{$theme}/style/font/iconfont.css?{$themeinfo['modified']}" rel="stylesheet" type="text/css"/>
{if $type=='article'}<link href="{$host}zb_users/theme/{$theme}/script/viewer.css" rel="stylesheet" type="text/css" />{/if}
<script src="{$host}zb_system/script/jquery-2.2.4.min.js?v={$version}"></script>
<script src="{$host}zb_system/script/zblogphp.js?v={$version}"></script>
<script src="{$host}zb_system/script/c_html_js_add.php?{if isset($html_js_hash)}hash={$html_js_hash}&{/if}v={$version}"></script>
<script src="{$host}zb_users/theme/{$theme}/script/jquery.qrcode.min.js"></script>
<script src="{$host}zb_users/theme/{$theme}/script/cms.js?{$themeinfo['modified']}"></script>
{if $type=='article'}<script src="{$host}zb_users/theme/{$theme}/script/viewer.min.js"></script>{/if}
{$header}
{if $type=='index'&&$page=='1'}
  <link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}">
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd">
  <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml">
{/if}
