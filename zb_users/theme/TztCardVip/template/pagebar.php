{if $pagebar.PageAll < 2}<p class="spacing-t text-center">没有更多内容了</p>{/if}
{if $pagebar.PageAll > 1}
    {if $pagebar.nextbutton && $zbp->Config('TztCardVip')->ArtListLoad || $zbp->Config('TztCardVip')->ArtListLoadAuto}
        <div class="tzt-panel_bd spacing-t">
            <div class="tzt-list-load spacing-t" style="display: none;">
                <div class="infinite-scroll-request">
                    <div class="tzt-toast">
                        <i class="icon icon-reload loading"></i>
                        <p class="tips"> 正在加载...</p>
                    </div>
                </div>
                <p class="infinite-scroll-last text-center">没有更多内容了</p>
            </div>
            <div class="text-center"><a href="javascript:;" class="btn btn-mini btn-width btn-main tzt-list-more">加载更多</a></div>
        </div>
        <div class="tzt-list-next">
            {foreach $pagebar.buttons as $k => $v}{if $pagebar.PageNow+1==$k}<a class="next" href="{$v}">{$k}</a>{/if}{/foreach}
        </div>
        <script src="{$host}zb_users/theme/{$theme}/script/infinite-scroll.pkgd.min.js"></script>
        <script>
            {if $zbp->Config('TztCardVip')->ArtListLoadAuto}
                var $LoadAuto = true;
            {else}
                var $LoadAuto = false;
            {/if}
            $('#tzt-list-box').infiniteScroll({
                path: '.tzt-list-next a.next',
                append: '.tzt-list-box-data',
                history: false,
                hideNav: '.tzt-list-next',
                status: '.tzt-list-load',
                button: '.tzt-list-more',
                scrollThreshold: $LoadAuto,
            });
        </script>
    {/if}
    {if $zbp->Config('TztCardVip')->ArtListPage}
    <div class="tzt-panel_bd spacing-t">
        <ul class="tzt-pagination">
            {foreach $pagebar.buttons as $k => $v}
                {if $pagebar.PageNow==$k}
                <li class="active"><a>{$k}</a></li>
                {elseif $pagebar.PageNow+1==$k}
                <li><a href="{$v}">{$k}</a></li>
                {elseif $k == '‹‹'}
                <li><a href="{$v}">首页</a></li>
                {elseif $k == '››'}
                <li><a href="{$v}">尾页</a></li>
                {elseif $k == '‹'}
                <li><a href="{$v}">上一页</a></li>
                {/if}
            {/foreach}
            <li><a href="#">共{$pagebar.PageAll}页</a></li>
        </ul>
    </div>
    {/if}
{/if}