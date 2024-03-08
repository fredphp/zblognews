{* Template Name:文章页单页 *}
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
{template:header}
</head>
<body {if $zbp->Config('TztCardVip')->CloreDark} data-tzt-theme="dark"{/if}>
	{template:head}
	<main class="page">
		<div class="page-box">
			<div class="page-bd">
				{if $article.Type==ZC_POST_TYPE_ARTICLE}
				{template:post-single}
				{else}
				{template:post-page}
				{/if}
			</div>
		</div>
	</main>
	{template:footer}
</body>

</html>
