{* Template Name:公共导航栏 *}
<div class="tzt-web_bg"{if $zbp->Config('TztCardVip')->DefaultWeb && !zbp_is_mobile()} style="background-image:url('{$zbp->Config('TztCardVip')->DefaultWebBg}');"{/if}></div>
{if $zbp->Config('TztCardVip')->Header}
<header class="tzt-header{if $zbp->Config('TztCardVip')->HeaderFixed} fixed{/if}{if $zbp->Config('TztCardVip')->HeaderBg} diybg{/if}{if zbp_is_mobile()} hide{/if}{if $zbp->Config('TztCardVip')->HeaderLeftFixed} left{/if}"{if $zbp->Config('TztCardVip')->HeaderBg} style="background-image: linear-gradient(45deg, {$zbp->Config('TztCardVip')->HeaderBgColor}, {$zbp->Config('TztCardVip')->HeaderBgColor2});"{/if}>
	<div class="page-box">
		<div class="tzt-header_hd{if !$zbp->Config('TztCardVip')->HeaderLeftFixed} pull-left{/if}">
			<a href="{$host}">
				<img src="{$zbp->Config('TztCardVip')->Logo}" alt="{$zbp->Config('TztCardVip')->SiteTitle}">
			</a>
		</div>
		{if $zbp->Config('TztCardVip')->HeaderLeft}
		<ul class="tzt-header_bd{if !$zbp->Config('TztCardVip')->HeaderLeftFixed} pull-left{/if}{if !$zbp->Config('TztCardVip')->HeaderLeftM} m-hidden{/if}">
			{foreach json_decode($zbp->Config('TztCardVip')->HeaderLeftData,true) as $key=>$value}
			{if $value['is']}<li{if !$value['ism']} class="m-hidden"{/if}><a href="{$value['url']}" title="{$value['title']}"><i class="{$value['icon']}"></i>{if $zbp->Config('TztCardVip')->HeaderLeftFixed} {$value['title']}{/if}</a></li>{/if}
			{/foreach}
</ul>
		{/if}
		{if $zbp->Config('TztCardVip')->HeaderRight}
		<ul class="tzt-header_ft{if !$zbp->Config('TztCardVip')->HeaderLeftFixed} pull-right{/if}{if !$zbp->Config('TztCardVip')->HeaderRightM} m-hidden{/if}">
			{foreach json_decode($zbp->Config('TztCardVip')->HeaderRightData,true) as $key=>$value}
			{if $value['is']}<li{if !$value['ism']} class="m-hidden"{/if}><a href="{$value['url']}" title="{$value['title']}"><i class="{$value['icon']}"></i>{if $zbp->Config('TztCardVip')->HeaderLeftFixed} {$value['title']}{/if}</a></li>{/if}
			{/foreach}
			{if $zbp->Config('TztCardVip')->HeaderRightUser}
			<!-- {if $user.ID > 0}
			<li{if !$zbp->Config('TztCardVip')->HeaderRightUserM} class="m-hidden"{/if}><a href="{if $zbp->Config('TztCardVip')->HeaderRightUserUrl}{$zbp->Config('TztCardVip')->HeaderRightUserUrl}{else}{$host}zb_system/admin/index.php{/if}"><img src="{$user.Avatar}" alt="">{if $zbp->Config('TztCardVip')->HeaderLeftFixed} {$zbp->Config('TztCardVip')->HeaderRightUserLoginTit}{/if}</a></li>
			{else}
			<li{if !$zbp->Config('TztCardVip')->HeaderRightUserM} class="m-hidden"{/if}><a href="{if $zbp->Config('TztCardVip')->HeaderRightUserLogin}{$zbp->Config('TztCardVip')->HeaderRightUserLogin}{else}{$host}zb_system/login.php{/if}"><i class="icon icon-user"></i>{if $zbp->Config('TztCardVip')->HeaderLeftFixed} {$zbp->Config('TztCardVip')->HeaderRightUserLoginTit}{/if}</a></li>
			{/if} -->
			{/if}
</ul>
		{/if}
	</div>
	{if $zbp->Config('TztCardVip')->HeaderLeftFixed}
	<a class="headeropen{if zbp_is_mobile()} show{/if}" href="javascript:;">
		<i class="icon icon-left"></i>
	</a>
	{/if}
</header>
{/if}
