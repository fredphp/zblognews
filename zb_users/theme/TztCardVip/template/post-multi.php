{* Template Name:列表页普通文章 *}
<div class="tzt-panel_bd" id="tzt-list-box">
    {foreach $articles as $key => $article}
    {if $zbp->Config('TztCardVip')->Ad && $zbp->Config('TztCardVip')->AdList && $key==$zbp->Config('TztCardVip')->AdListNum}
    <div class="tzt-media {if !$zbp->Config('TztCardVip')->AdM} m-hodden{/if}">
        {if $zbp->Config('TztCardVip')->AdListCode}
            {$zbp->Config('TztCardVip')->AdListCode}
        {else}
            <a href="{$zbp->Config('TztCardVip')->AdListUrl}" class="tzt-media-box" target="_blank">
                <img src="{$zbp->Config('TztCardVip')->AdListImg}" alt="广告">
            </a>
        {/if}
    </div>
    {/if}

    {if $article.Category.Metas.liststyle=='2'}
    <div class="tzt-media tzt-list-box-data">
        <div class="tzt-media-box author">
            <a href="{$article.Author.Url}" class="tzt-media-box_bd avatar-img">
                <img src="{$article.Author.Avatar}" alt="{$article.Author.Name}">
            </a>
            <div class="tzt-media-box_hd">
                <h5 class="tzt-media-box_name"><a href="{$article.Author.Url}">{$article.Author.Name}</a></h5>
                <div class="tzt-media-box_cont">
                    {if $article.Title!='未命名'}<div class="margin-0"><a class="text-link" href="{$article.Url}"><i class="icon icon-url"></i> {$article.Title}</a></div>{/if}
                    <span class="cont-text">{php} $Content = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).''); $length = mb_strlen(TransferHTML($article->Content,'[nohtml]')); {/php}{$Content}{if $length > $zbp->Config('TztCardVip')->ArtListDescNum}...<a class="text-link text-btn-off" href="javascript:;">全文</a>{/if}</span>
                    {if $length > $zbp->Config('TztCardVip')->ArtListDescNum}
                    <span class="cont-text_no" style="display: none;">{php}$Content = preg_replace('/[\r\n\s]+/', ' ', TransferHTML($article->Content,'[nohtml]'));{/php} {$Content}<a class="text-link text-btn-on" href="javascript:;">收起</a></span>
                    {/if}
                    {if $article.Tags && $zbp->Config('TztCardVip')->ArtListTag}<span class="tzt-text_tag author">{foreach $article.Tags as $tag}<a href='{$tag.Url}' title='{$tag.Name}'>#{$tag.Name}</a>{/foreach}</span>{/if}
                </div>
                {if $article->Metas->video}
                <div class="tzt-media-box_vid">
                    <video src="{$article->Metas->video}" class="video_player" onplay="stopOtherMedia(this)" controls="controls"></video>
                </div>
                {/if}
                {if $article->Metas->mp3}
                <div class="tzt-media-box_mp3">
                    <audio controls>
                        <source src="{$article->Metas->mp3}" type="audio/mpeg">
                    </audio>
                </div>
                {/if}
                {if $article->Metas->coverimg}
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd tzt-col-lg-2 tzt-col-xs-2"><img src="{$article->Metas->coverimg}" data-viewer="{$article->Metas->coverimg}" alt="{$article.Title}"></div>
                </div>
                {elseif $article.AllImages}
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd{if $article.ImageCount=='1' || $article.ImageCount=='2' || $article.ImageCount=='4'} tzt-col-lg-2 tzt-col-xs-2{else} tzt-col-lg-3 tzt-col-xs-3{/if}"><img src="{TztCardVip_Thumb($article,0)}" data-viewer="{$article.AllImages[0]}" alt="{$article.Title}"></div>
                    {if $article.ImageCount>1}<div class="tzt-col-bd{if $article.ImageCount=='2' || $article.ImageCount=='4'} tzt-col-lg-2 tzt-col-xs-2{else} tzt-col-lg-3 tzt-col-xs-3{/if}"><img src="{TztCardVip_Thumb($article,1)}" data-viewer="{$article.AllImages[1]}" alt="{$article.Title}"></div>{/if}
                    {if $article.ImageCount>2}<div class="tzt-col-bd{if $article.ImageCount=='2' || $article.ImageCount=='4'} tzt-col-lg-2 tzt-col-xs-2{else} tzt-col-lg-3 tzt-col-xs-3{/if}"><img src="{TztCardVip_Thumb($article,2)}" data-viewer="{$article.AllImages[2]}" alt="{$article.Title}"></div>{/if}
                    {if $article.ImageCount>3}<div class="tzt-col-bd{if $article.ImageCount=='2' || $article.ImageCount=='4'} tzt-col-lg-2 tzt-col-xs-2{else} tzt-col-lg-3 tzt-col-xs-3{/if}"><img src="{TztCardVip_Thumb($article,3)}" data-viewer="{$article.AllImages[3]}" alt="{$article.Title}"></div>{/if}
                    {if $article.ImageCount>4}<div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="{TztCardVip_Thumb($article,4)}" data-viewer="{$article.AllImages[4]}" alt="{$article.Title}"></div>{/if}
                    {if $article.ImageCount>5}<div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="{TztCardVip_Thumb($article,5)}" data-viewer="{$article.AllImages[5]}" alt="{$article.Title}"></div>{/if}           
                </div>
                {if $article.ImageCount>6}<div class="spacing-b text-center"><a class="btn btn-width btn-mini btn-main" href="{$article.Url}">+{$article.ImageCount} 更多图片 <i class="icon icon-right"></i></a></div>{/if}
                {/if}
                
                <div class="tzt-media-box_foot">
                    {if $article.TopType}<span class="topping">置顶</span>{/if}
                    <a href="{$article.Category.Url}" class="text-link"><i class="icon icon-category"></i> {$article.Category.Name}</a>
                    <a href="{$article.Url}{if $article.CommNums}#comment{/if}" class="text-link"><i class="icon icon-feedback"></i>{if $article.CommNums} {$article.CommNums}{/if}</a>
                    {if $zbp->Config('TztCardVip')->ArtListSub3}<span><i class="icon icon-eye"></i> {$article.ViewNums}</span>{/if}
                    <span>{TztCardVip_TimeAgo($article->Time(),$zbp->Config('TztCardVip')->ArtListTime)}</span>
                    {if $user->Level=='1' && !zbp_is_mobile()}
                        <a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article->ID}" target="_blank"><i class="icon icon-edit"></i></a>
                        <a href="javascript:;" onclick="if(confirm('确定要删除吗？当前操作不可恢复！')){location.href='{$host}zb_system/cmd.php?act=ArticleDel&id={$article->ID}&csrfToken={$zbp->GetToken()}'}"><i class="icon icon-deltel"></i></a>
                    {/if} 
                </div>
            </div>
        </div>       
    </div>
    {else}
    <div class="tzt-media tzt-list-box-data">
        <div class="tzt-media-box">
            {if $article.AllImages && $zbp->Config('TztCardVip')->ArtListStyle=='1' && $article.Category.Metas.liststyle!='1'}
            <a href="{$article.Url}" title="{$article.Title}" class="tzt-media-box_bd{if !$zbp->Config('TztCardVip')->ArtListThumb} max-width{/if} left">
                <img src="{if $article->Metas->coverimg}{$article->Metas->coverimg}{else}{TztCardVip_Thumb($article,0)}{/if}" alt="{$article.Title}">
            </a>
            {/if}
            <div class="tzt-media-box_hd">
                <h3 class="tzt-media-box_title"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>
                {if $article.Tags && $zbp->Config('TztCardVip')->ArtListTag}
                <div class="tzt-text_tag media">
                    {foreach $article.Tags as $tag}<a href='{$tag.Url}' title='{$tag.Name}'>#{$tag.Name}</a>{/foreach}
                </div>
                {/if}
                {if $zbp->Config('TztCardVip')->ArtListDesc}
                    {if $article.Intro}
                    <div class="tzt-media-box_desc{if $article.Category.Metas.liststyle!='1'} m-hidden{/if}">
                        {php}$Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).'...');{/php} {$Intro}
                    </div>
                    {else}
                    <div class="tzt-media-box_desc{if $article.Category.Metas.liststyle!='2'} m-hidden{/if}">
                        {php}$Content = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).'...');{/php} {$Content}
                    </div>
                    {/if}
                {/if}
                {if $article.AllImages && $article.Category.Metas.liststyle=='1'}
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="{TztCardVip_Thumb($article,0)}" alt="{$article.Title}" data-viewer="{$article.AllImages[0]}"></div>
                    {if $article.ImageCount>1}<div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="{TztCardVip_Thumb($article,1)}" alt="{$article.Title}" data-viewer="{$article.AllImages[1]}"></div>{/if}
                    {if $article.ImageCount>2}<div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="{TztCardVip_Thumb($article,2)}" alt="{$article.Title}" data-viewer="{$article.AllImages[2]}"></div>{/if}
                </div>
                {/if}
                <div class="tzt-media-box_foot">
                    {if $article.TopType}<span class="topping">置顶</span>{/if}
                    {if $zbp->Config('TztCardVip')->ArtListSub1}<a href="{$article.Category.Url}" class="text-link"><i class="icon icon-category"></i> {$article.Category.Name}</a>{/if}
                    {if $zbp->Config('TztCardVip')->ArtListSub2}<a href="{$article.Author.Url}" class="text-link"><i class="icon icon-user"></i> {$article.Author.StaticName}</a>{/if}
                    {if $zbp->Config('TztCardVip')->ArtListSub4 && !zbp_is_mobile()}<a href="{$article.Url}{if $article.CommNums}#comment{/if}" class="text-link"><i class="icon icon-feedback"></i>{if $article.CommNums} {$article.CommNums}{/if}</a>{/if}
                    {if $zbp->Config('TztCardVip')->ArtListSub3}<span><i class="icon icon-eye"></i> {$article.ViewNums}</span>{/if}
                    {if $zbp->Config('TztCardVip')->ArtListSub5}<span>{TztCardVip_TimeAgo($article->Time(),$zbp->Config('TztCardVip')->ArtListTime)}</span>{/if}
                    {if $user->Level=='1' && !zbp_is_mobile()}
                        <a href="{$host}zb_system/cmd.php?act=ArticleEdt&id={$article->ID}" target="_blank"><i class="icon icon-edit"></i></a>
                        <a href="javascript:;" onclick="if(confirm('确定要删除吗？当前操作不可恢复！')){location.href='{$host}zb_system/cmd.php?act=ArticleDel&id={$article->ID}&csrfToken={$zbp->GetToken()}'}"><i class="icon icon-deltel"></i></a>
                    {/if} 
                </div>
            </div>
            {if $article.AllImages && $zbp->Config('TztCardVip')->ArtListStyle=='0' && $article.Category.Metas.liststyle!='1'}
            <a href="{$article.Url}" title="{$article.Title}" class="tzt-media-box_bd{if !$zbp->Config('TztCardVip')->ArtListThumb} max-width{/if}">
                <img src="{if $article->Metas->coverimg}{$article->Metas->coverimg}{else}{TztCardVip_Thumb($article,0)}{/if}" alt="{$article.Title}">
            </a>
            {/if}
        </div>
    </div>
    {/if}
    {/foreach}
</div>