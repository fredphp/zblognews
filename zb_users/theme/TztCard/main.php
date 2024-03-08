<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('TztCard')) {$zbp->ShowError(48);die();}

$blogtitle='简约卡片主题';
require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

$act = GetVars("act", "GET");

if ($act === "save") {
  // ↓↓安全验证，需要配合表单中的csrfToken
  CheckIsRefererValid();

  foreach ($_POST as $key => $value) {
    // 跳过不需要保存的表单字段
    if ("csrfToken" === $key) {
      continue;
    }
    $zbp->Config("TztCard")->$key = trim($value);
  }

  // 保存配置项
  $zbp->SaveConfig("TztCard");

  // 上传相关开始
  $extList = "png|jpg|jpeg|ico"; // 允许上传的文件后缀
  foreach ($_FILES as $key => $value) {
    if ($_FILES[$key]['error'] === 0) {
      $ext = GetFileExt($_FILES[$key]['name']);
      $file = TztCard_Path("u-{$key}"); // 根据字段返回实际文件路径，参考TztCard主题
      // 只允许覆盖已有文件，不允许增加新文件
      if (!HasNameInString($extList, $ext) || !is_file($file)) {
        continue;
      }
      // 接受上传文件
      if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
        move_uploaded_file($_FILES[$key]['tmp_name'], $file);
      }
    }
  }

  $zbp->BuildTemplate();

  $zbp->SetHint('good');

  Redirect('./main.php');
}

InstallPlugin_TztCard();

$LogoImg = TztCard_Path("u-LogoImg", "host") . "?" . time();
$TopImg = TztCard_Path("u-TopImg", "host") . "?" . time();
$CodeImg = TztCard_Path("u-CodeImg", "host") . "?" . time();

?>

<style>
	.tableBorder tr,.tableBorder td{ padding: 15px;}
</style>

<div id="divMain">
  <div class="divHeader"><?php echo $blogtitle;?></div>
  <div id="divMain2">
    <form method="post" action="main.php?act=save" enctype="multipart/form-data">
      <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken() ?>">
      <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
        <input type="hidden" name="csrfToken" value="<?php echo $zbp->GetCSRFToken();?>">
        <tr>
          <th width="15%"><p align="center">名称</p></th>
          <th width="50%"><p align="center">内容</p></th>
          <th width="25%"><p align="center">说明</p></th>
        </tr>
		<tr>
		  <td>logo</td>
		  <td>
		  <input type="file" name="LogoImg" size="60">&nbsp;&nbsp;<img src="<?php echo $LogoImg; ?>" alt="logo" style="max-height: 30px;width: auto;margin-bottom: -8px;padding: 0;">
		  </td>
		  <td>默认尺寸286*68px,推荐上传同比例大小的图片</td>
		</tr>
		<tr>
		  <td>首页关键词</td>
		  <td>
		  <textarea name="KeyWords" cols="30" rows="3" style="width:274px;"><?php echo htmlspecialchars($zbp->Config('TztCard')->KeyWords);?></textarea>
		  </td>
		  <td>多个使用逗号隔开,一般不超过100个字符</td>
		</tr>
		<tr>
		  <td>首页描述</td>
		  <td>
		  <textarea name="DescriPtion" cols="30" rows="5" style="width:274px;"><?php echo htmlspecialchars($zbp->Config('TztCard')->DescriPtion);?></textarea>
		  </td>
		  <td>一般不超过200个字符</td>
		</tr>
        <tr>
          <td>首页头图</td>
          <td><input type="file" name="TopImg" size="60">&nbsp;&nbsp;<img src="<?php echo $TopImg; ?>" alt="logo" style="max-height: 30px;width: auto;margin-bottom: -8px;padding: 0;"></td>
          <td>默认尺寸960*276px,推荐上传同比例大小的图片</td>
        </tr>
		<tr>
		  <td>首页头图链接</td>
		  <td><input type="text" name="TopUrl" style="width:274px;" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->TopUrl);?>"/></td>
		  <td>填写http开头的链接地址</td>
		</tr>
		<tr>
		  <td>二维码提示</td>
		  <td><input type="text" name="CodeText" style="width:274px;" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->CodeText);?>"/></td>
		  <td>例如:扫一扫关注公众号</td>
		</tr>
		<tr>
		  <td>启用固定码</td>
		  <td><input type="text" name="CodeIs" class="checkbox" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->CodeIs);?>"/></td>
		  <td>启用后侧栏自动生成二维码会失效</td>
		</tr>
		<tr>
		  <td>二维码图片</td>
		  <td><input type="file" name="CodeImg" size="60">&nbsp;&nbsp;<img src="<?php echo $CodeImg; ?>" alt="logo" style="max-height: 30px;width: auto;margin-bottom: -8px;padding: 0;"></td>
		  <td>默认尺寸258*258px,推荐上传同比例大小的图片</td>
		</tr>
		<tr>
		  <td>手机端不显示友链</td>
		  <td><input type="text" name="LinkIs" class="checkbox" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->LinkIs);?>"/></td>
		  <td>开启后手机端将不显示友链模块</td>
		</tr>

		<tr>
		  <td>文章版权提示</td>
		  <td>
		  <textarea name="ArticleCody" cols="30" rows="5" style="width:274px;"><?php echo htmlspecialchars($zbp->Config('TztCard')->ArticleCody);?></textarea>
		  </td>
		  <td>版权声明的一些文字提示</td>
		</tr>
		<tr>
		  <td>显示文章摘要</td>
		  <td><input type="text" name="ArticleDesc" class="checkbox" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->ArticleDesc);?>"/></td>
		  <td>关闭后不显示文章正文摘要</td>
		</tr>
		<tr>
		  <td>列表缩略图尺寸</td>
		  <td>
			<input type="text" name="ThumbsW" style="width:140px;" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->ThumbsW);?>" placeholder="宽"/>
			<input type="text" name="ThumbsH" style="width:140px;" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->ThumbsH);?>" placeholder="高"/>
			</td>
		  <td>设置合适的尺寸</td>
		</tr>
		<tr>
		  <td>相关文章模块</td>
		  <td><input type="text" name="Related" class="checkbox" value="<?php echo htmlspecialchars($zbp->Config('TztCard')->Related);?>"/></td>
		  <td>文章正文底部相关文章</td>
		</tr>
      </table>
	  <br/>
      <input name="submit" type="Submit" class="button" style="width:180px;height:38px;" value="保存设置"/>
    </form>
  </div>
</div>
<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>
