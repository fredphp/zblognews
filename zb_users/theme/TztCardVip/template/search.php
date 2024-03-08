{* Template Name:搜索页 *}
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
				<div class="tzt-panel">
					{if $articles}
					<div class="tzt-panel_hd text-center">
						<h3>与“{$_GET['q']}” 相关的搜索结果</h3>
					</div>
					<div class="tzt-panel_bd">
						<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="search-form mb15" id="#form">
							<button type="submit" class="submit"><i class="icon icon-search"></i> 搜索</button>
							<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词" value="{$_GET['q']}">
						</form>
					</div>
					{template:post-multi}
					{template:pagebar}
					{else}
					<div class="tzt-panel_bd">
						<div class="text-center" style="padding: 30px;">
							<p class="mb15"><img src="{$host}zb_users/theme/{$theme}/images/empty.png" width="160" alt=""></p>
							{if $_GET['q']}
							<p class="text-muted">没有找到与“{$_GET['q']}” 相关的内容</p>
							{else}
							<p class="text-muted">这里空空如也</p>
							{/if}
						</div>
					</div>
					{/if}
				</div>
			</div>
		</div>
	</main>
	{template:footer}
</body>

</html>
