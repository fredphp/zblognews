{* Template Name:公共底部 *}

<!-- <div class="fixed m-hidden">
	<div class="page-bd">
		<div class="tzt-code">
			<div class="tzt-panel">
				<div class="tzt-panel_bd text-center">
					{if $zbp->Config('TztCard')->CodeIs}
					<p><img class="img-responsive" src="{$host}zb_users/theme/{$theme}/upload/code.jpg" alt="{$zbp->Config('TztCard')->CodeText}" /></p>
					{else}
					<p class="qrcode"></p>
					{/if}
					<label>{$zbp->Config('TztCard')->CodeText}</label>
				</div>
			</div>
		</div>
	</div>
</div> -->

<a href="javascript:;" class="backtop" style="display: none;"><i class="iconfont icon-up"></i></a>

<div class="mask" id="mask" style="display: none;"></div>

<div class="tzt-dialog right" id="DialogType">
	<div class="tzt-panel">
		<div class="tzt-panel_hd">
			<h3>
				<span class="pull-right">分类栏目</span>
				<a class="dialogclose" href="javascript:;"><i class="iconfont icon-delete"></i></a>
			</h3>
		</div>
		<div class="tzt-panel_bd">
			<ul class="tzt-nav-menu">
				{module:navbar}
			</ul>
		</div>
	</div>
</div>

<div class="tzt-dialog bottom" id="DialogSearch">
	<div class="page-bd">
		<div class="tzt-panel">
			<a class="dialogclose pull-right" href="javascript:;"><i class="iconfont icon-delete"></i></a>
			<div class="tzt-panel_bd text-center" style="padding: 50px 30px;">
				<form method="post" name="search" action="{$host}zb_system/cmd.php?act=search" class="search-form mb15" id="#form">
					<button type="submit" class="submit"><i class="icon iconfont icon-search"></i> 搜索</button>
					<input type="text" name="q" class="form-control" placeholder="请输入要搜索的关键词">
				</form>
			</div>
		</div>
	</div>
</div>

<footer class="footer">
	<div class="page-bd">
		<div class="text-center text-muted">
			{$copyright} Powered By <a href="https://www.zblogcn.com/">Z-BlogPHP</a>
		</div>
	</div>
</footer>

{if $type=='article'}<script>$('#viewer').viewer({title: false,navbar: false,toolbar: false,});</script>{/if}

{$footer}
