{foreach $tags as $tag}
<li class="tags"><a href="{$tag.Url}" title="{$tag.Count}{$msg.about}“{$tag.Name}”" class="tag kico-hash">{$tag.Name} <span>{$tag.Count}</span></a></li>
{/foreach}