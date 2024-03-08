<li>
	<a href="{$item.href}" target="{$item.target}" title="{$item.title}">{$item.ico}{$item.text}</a>
    {if count($item.subs)}
    <ul class="child">
        {foreach $item.subs as $itemSub}
        <li><a href="{$itemSub.href}" target="{$itemSub.target}" title="{$itemSub.title}">{$itemSub.ico} - {$itemSub.text}</a></li>
        {/foreach}
    </ul>
    {/if}
</li>