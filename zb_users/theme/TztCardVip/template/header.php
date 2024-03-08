{* Template Name:公共头部 *}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1,maximum-scale=1">
{if $zbp->Config('TztCardVip')->Seo}{template:post-seo}{else}<title>{$title} - {$name}</title>{/if}
{if $zbp->Config('TztCardVip')->StaticUrl}{php} $static = $zbp->Config('TztCardVip')->StaticUrl;{/php}{else}{php} $static = ''.$host.'zb_users/theme/'.$theme.'/';{/php}{/if}
<link rel="shortcut icon" href="{$zbp->Config('TztCardVip')->Favicon}" type="image/x-icon">
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font/iconfont.css?{$themeinfo['modified']}">
<link rel="stylesheet" href="{$static}share/style.css?{$themeinfo['modified']}">
<link rel="stylesheet" href="{$static}script/carousel.css?{$themeinfo['modified']}">
{if $zbp->Config('TztCardVip')->TztLess}
<link rel="stylesheet/less" href="{$static}style/{$style}.less?{$themeinfo['modified']}">
{else}
<link rel="stylesheet" href="{$static}style/{$style}.css?{$themeinfo['modified']}">
{/if}
<script src="{$host}zb_system/script/jquery-2.2.4.min.js?v={$version}"></script>
<script src="{$host}zb_system/script/zblogphp.js?v={$version}"></script>
<script src="{$host}zb_system/script/c_html_js_add.php?{if isset($html_js_hash)}hash={$html_js_hash}&{/if}v={$version}"></script>
<script src="{$static}script/cms.js?{$themeinfo['modified']}"></script>
<script src="{$static}script/carousel.js?{$themeinfo['modified']}"></script>
<script src="{$static}script/jquery.qrcode.min.js?{$themeinfo['modified']}"></script>
<script src="{$static}share/share.js?{$themeinfo['modified']}"></script>
{if $type=='index'&&$page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="/zb_system/xml-rpc/?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/zb_system/xml-rpc/wlwmanifest.xml">
{/if}
{$zbp->Config('TztCardVip')->SubStatic}
<style>
    {php}
        $SideWidth = $zbp->Config('TztCardVip')->WebSideWidth+30;
    {/php}
    {if $zbp->Config('TztCardVip')->MainColor}body{--tzt-MAIN:{$zbp->Config('TztCardVip')->MainColorVal};}{/if}
    @media screen and (min-width: 1200px){
        .page{
            {if $zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed}padding-top: 90px;{else}padding-top: 30px;{/if}
        }
        .page-box{ 
            width: {$zbp->Config('TztCardVip')->MainWidth}px;
            {if $zbp->Config('TztCardVip')->WebSide}{if $zbp->Config('TztCardVip')->WebSideLayout}padding-right: {$SideWidth}px;{else}padding-left: {$SideWidth}px;{/if}{/if}
        }
        .tzt-sidebar-box {
            width: {$zbp->Config('TztCardVip')->WebSideWidth}px;
            {if $zbp->Config('TztCardVip')->WebSideLayout}right: 0;{else}left: 0;{/if}
            {if $zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed}top: 90px;{else}top: 30px;{/if}
        }
    }
    @media screen and (max-width: 768px){
        .page{
            {if $zbp->Config('TztCardVip')->Header && !$zbp->Config('TztCardVip')->HeaderLeftFixed}padding-top: 60px;{else}padding-top: 0;{/if}
        }
    }
</style>
{$header}