{* Template Name:SEO模块 *}
{php} 
    $seotitle = $zbp->Config('TztCardVip')->SiteTitle; $seousbtit = $zbp->Config('TztCardVip')->SubTitle; $seoline = $zbp->Config('TztCardVip')->SeoLine;
    
{/php}
{if $type=='article'}
{php}
    if($title=='未命名'){
        $title = TztCardVip_TransferHTML($article->Content);
    }else{
    }
{/php}
<title>{if $article.Metas.arttitle}{$article.Metas.arttitle}{else}{$title}{/if}{if $zbp->Config('TztCardVip')->SeoSetCat}{$seoline}{$article.Category.Name}{/if}{$seoline}{$seotitle}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
{php} $keywords = $description = TztCardVip_TransferHTML($article->Content,'135');{/php}
<meta name="keywords" content="{if $article.Metas.artkeywords}{$article.Metas.artkeywords}{else}{$keywords}{/if}"/>
<meta name="description" content="{if $article.Metas.artdescription}{$article.Metas.artdescription}{else}{$description}{/if}"/>
{elseif $type=='page'}
<title>{if $article.Metas.arttitle}{$article.Metas.arttitle}{else}{$title}{/if}{$seoline}{$seotitle}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
<meta name="keywords" content="{if $article.Metas.artkeywords}{$article.Metas.artkeywords}{else}{$title}{/if}"/>
{php} $description = TztCardVip_TransferHTML($article->Content,'135'); {/php}
<meta name="description" content="{if $article.Metas.artdescription}{$article.Metas.artdescription}{else}{$description}{/if}"/>
{elseif $type=='index'}
<title>{$seotitle}{if $page>'1' && $zbp->Config('TztCardVip')->SeoSetPage}{$seoline}第{$pagebar.PageNow}页{/if}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
<meta name="keywords" content="{$zbp->Config('TztCardVip')->SiteKeyWords}">
<meta name="description" content="{$zbp->Config('TztCardVip')->SiteDescriPtion}">
{elseif $type=='category'}
<title>{if $category.Metas.catetitle}{$category.Metas.catetitle}{else}{$category.Name}{/if}{$seoline}{if $page>'1' && $zbp->Config('TztCardVip')->SeoSetPage}{$seoline}第{$pagebar.PageNow}页{/if}{$seotitle}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
<meta name="keywords" content="{if $category.Metas.catekeywords}{$category.Metas.catekeywords}{else}{$category.Name}{/if}">
<meta name="description" content="{if $category.Metas.catedescription}{$category.Metas.catedescription}{else}{$category.Intro}{/if}">
{elseif $type=='tag'}
<title>{if $tag.Metas.tagtitle}{$tag.Metas.tagtitle}{else}{$tag.Name}{/if}{$seoline}{if $page>'1' && $zbp->Config('TztCardVip')->SeoSetPage}{$seoline}第{$pagebar.PageNow}页{/if}{$seotitle}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
<meta name="keywords" content="{if $tag.Metas.tagkeywords}{$tag.Metas.tagkeywords}{else}{$tag.Name}{/if}">
<meta name="description" content="{if $tag.Metas.tagdescription}{$tag.Metas.tagdescription}{else}{$tag.Intro}{/if}">
{else}
<title>{$title}{$seoline}{if $page>'1' && $zbp->Config('TztCardVip')->SeoSetPage}第{$pagebar.PageNow}页{$seoline}{/if}{$seotitle}{if $zbp->Config('TztCardVip')->SeoSetSiteSub}{$seoline}{$seousbtit}{/if}</title>
<meta name="keywords" content="{$title},{$seotitle}">
<meta name="description" content="{$title}-{$seotitle}">
{/if}
