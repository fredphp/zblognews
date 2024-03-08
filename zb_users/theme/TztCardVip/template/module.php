{* Template Name:单个模块 *}
{if $module.Type=='ul'}
<div id="{$module.HtmlID}" class="tab-pane{if $module.HtmlID==$ran_list_on[0]} active{/if}">
    <ul class="tzt-module-list text-overflow">
        {$module.Content}
    </ul>
</div>
{/if}
{if $module.Type=='div'}
<div id="{$module.HtmlID}" class="tab-pane{if $module.HtmlID==$ran_list_on[0]} active{/if}">
    <div class="tzt-text_tag">
        {$module.Content}
    </div>
</div>
{/if}