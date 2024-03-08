<?php  /* Template Name:单个模块 */  ?>
<?php if ($module->Type=='ul') { ?>
<div id="<?php  echo $module->HtmlID;  ?>" class="tab-pane<?php if ($module->HtmlID==$ran_list_on[0]) { ?> active<?php } ?>">
    <ul class="tzt-module-list text-overflow">
        <?php  echo $module->Content;  ?>
    </ul>
</div>
<?php } ?>
<?php if ($module->Type=='div') { ?>
<div id="<?php  echo $module->HtmlID;  ?>" class="tab-pane<?php if ($module->HtmlID==$ran_list_on[0]) { ?> active<?php } ?>">
    <div class="tzt-text_tag">
        <?php  echo $module->Content;  ?>
    </div>
</div>
<?php } ?>