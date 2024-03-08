<?php if ($pagebar->PageAll < 2) { ?><p class="spacing-t text-center">没有更多内容了</p><?php } ?>
<?php if ($pagebar->PageAll > 1) { ?>
    <?php if ($pagebar->nextbutton && $zbp->Config('TztCardVip')->ArtListLoad || $zbp->Config('TztCardVip')->ArtListLoadAuto) { ?>
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
            <?php  foreach ( $pagebar->buttons as $k => $v) { ?><?php if ($pagebar->PageNow+1==$k) { ?><a class="next" href="<?php  echo $v;  ?>"><?php  echo $k;  ?></a><?php } ?><?php }   ?>
        </div>
        <script src="<?php  echo $host;  ?>zb_users/theme/<?php  echo $theme;  ?>/script/infinite-scroll.pkgd.min.js"></script>
        <script>
            <?php if ($zbp->Config('TztCardVip')->ArtListLoadAuto) { ?>
                var $LoadAuto = true;
            <?php }else{  ?>
                var $LoadAuto = false;
            <?php } ?>
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
    <?php } ?>
    <?php if ($zbp->Config('TztCardVip')->ArtListPage) { ?>
    <div class="tzt-panel_bd spacing-t">
        <ul class="tzt-pagination">
            <?php  foreach ( $pagebar->buttons as $k => $v) { ?>
                <?php if ($pagebar->PageNow==$k) { ?>
                <li class="active"><a><?php  echo $k;  ?></a></li>
                <?php }elseif($pagebar->PageNow+1==$k) {  ?>
                <li><a href="<?php  echo $v;  ?>"><?php  echo $k;  ?></a></li>
                <?php }elseif($k == '‹‹') {  ?>
                <li><a href="<?php  echo $v;  ?>">首页</a></li>
                <?php }elseif($k == '››') {  ?>
                <li><a href="<?php  echo $v;  ?>">尾页</a></li>
                <?php }elseif($k == '‹') {  ?>
                <li><a href="<?php  echo $v;  ?>">上一页</a></li>
                <?php } ?>
            <?php }   ?>
            <li><a href="#">共<?php  echo $pagebar->PageAll;  ?>页</a></li>
        </ul>
    </div>
    <?php } ?>
<?php } ?>