{if $pagebar && $pagebar.PageAll > 1}
    {foreach $pagebar.buttons as $k => $v}
        {if $pagebar.PageNow==$k}
		<li class="active"><a>{$k}</a></li>
        {elseif $pagebar.PageNow+1==$k}
        <li><a href="{$v}">{$k}</a></li>
        {else}
        <li><a href="{$v}">{$k}</a></li>
        {/if}
    {/foreach}
{/if}