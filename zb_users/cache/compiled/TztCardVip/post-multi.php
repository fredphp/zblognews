<?php  /* Template Name:列表页普通文章 */  ?>
<div class="tzt-panel_bd" id="tzt-list-box">
    <?php  foreach ( $articles as $key => $article) { ?>
    <?php if ($zbp->Config('TztCardVip')->Ad && $zbp->Config('TztCardVip')->AdList && $key==$zbp->Config('TztCardVip')->AdListNum) { ?>
    <div class="tzt-media <?php if (!$zbp->Config('TztCardVip')->AdM) { ?> m-hodden<?php } ?>">
        <?php if ($zbp->Config('TztCardVip')->AdListCode) { ?>
            <?php  echo $zbp->Config('TztCardVip')->AdListCode;  ?>
        <?php }else{  ?>
            <a href="<?php  echo $zbp->Config('TztCardVip')->AdListUrl;  ?>" class="tzt-media-box" target="_blank">
                <img src="<?php  echo $zbp->Config('TztCardVip')->AdListImg;  ?>" alt="广告">
            </a>
        <?php } ?>
    </div>
    <?php } ?>

    <?php if ($article->Category->Metas->liststyle=='2') { ?>
    <div class="tzt-media tzt-list-box-data">
        <div class="tzt-media-box author">
            <a href="<?php  echo $article->Author->Url;  ?>" class="tzt-media-box_bd avatar-img">
                <img src="<?php  echo $article->Author->Avatar;  ?>" alt="<?php  echo $article->Author->Name;  ?>">
            </a>
            <div class="tzt-media-box_hd">
                <h5 class="tzt-media-box_name"><a href="<?php  echo $article->Author->Url;  ?>"><?php  echo $article->Author->Name;  ?></a></h5>
                <div class="tzt-media-box_cont">
                    <?php if ($article->Title!='未命名') { ?><div class="margin-0"><a class="text-link" href="<?php  echo $article->Url;  ?>"><i class="icon icon-url"></i> <?php  echo $article->Title;  ?></a></div><?php } ?>
                    <span class="cont-text"><?php  $Content = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).''); $length = mb_strlen(TransferHTML($article->Content,'[nohtml]'));  ?><?php  echo $Content;  ?><?php if ($length > $zbp->Config('TztCardVip')->ArtListDescNum) { ?>...<a class="text-link text-btn-off" href="javascript:;">全文</a><?php } ?></span>
                    <?php if ($length > $zbp->Config('TztCardVip')->ArtListDescNum) { ?>
                    <span class="cont-text_no" style="display: none;"><?php $Content = preg_replace('/[\r\n\s]+/', ' ', TransferHTML($article->Content,'[nohtml]')); ?> <?php  echo $Content;  ?><a class="text-link text-btn-on" href="javascript:;">收起</a></span>
                    <?php } ?>
                    <?php if ($article->Tags && $zbp->Config('TztCardVip')->ArtListTag) { ?><span class="tzt-text_tag author"><?php  foreach ( $article->Tags as $tag) { ?><a href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'>#<?php  echo $tag->Name;  ?></a><?php }   ?></span><?php } ?>
                </div>
                <?php if ($article->Metas->video) { ?>
                <div class="tzt-media-box_vid">
                    <video src="<?php  echo $article->Metas->video;  ?>" class="video_player" onplay="stopOtherMedia(this)" controls="controls"></video>
                </div>
                <?php } ?>
                <?php if ($article->Metas->mp3) { ?>
                <div class="tzt-media-box_mp3">
                    <audio controls>
                        <source src="<?php  echo $article->Metas->mp3;  ?>" type="audio/mpeg">
                    </audio>
                </div>
                <?php } ?>
                <?php if ($article->Metas->coverimg) { ?>
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd tzt-col-lg-2 tzt-col-xs-2"><img src="<?php  echo $article->Metas->coverimg;  ?>" data-viewer="<?php  echo $article->Metas->coverimg;  ?>" alt="<?php  echo $article->Title;  ?>"></div>
                </div>
                <?php }elseif($article->AllImages) {  ?>
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd<?php if ($article->ImageCount=='1' || $article->ImageCount=='2' || $article->ImageCount=='4') { ?> tzt-col-lg-2 tzt-col-xs-2<?php }else{  ?> tzt-col-lg-3 tzt-col-xs-3<?php } ?>"><img src="<?php  echo TztCardVip_Thumb($article,0);  ?>" data-viewer="<?php  echo $article->AllImages[0];  ?>" alt="<?php  echo $article->Title;  ?>"></div>
                    <?php if ($article->ImageCount>1) { ?><div class="tzt-col-bd<?php if ($article->ImageCount=='2' || $article->ImageCount=='4') { ?> tzt-col-lg-2 tzt-col-xs-2<?php }else{  ?> tzt-col-lg-3 tzt-col-xs-3<?php } ?>"><img src="<?php  echo TztCardVip_Thumb($article,1);  ?>" data-viewer="<?php  echo $article->AllImages[1];  ?>" alt="<?php  echo $article->Title;  ?>"></div><?php } ?>
                    <?php if ($article->ImageCount>2) { ?><div class="tzt-col-bd<?php if ($article->ImageCount=='2' || $article->ImageCount=='4') { ?> tzt-col-lg-2 tzt-col-xs-2<?php }else{  ?> tzt-col-lg-3 tzt-col-xs-3<?php } ?>"><img src="<?php  echo TztCardVip_Thumb($article,2);  ?>" data-viewer="<?php  echo $article->AllImages[2];  ?>" alt="<?php  echo $article->Title;  ?>"></div><?php } ?>
                    <?php if ($article->ImageCount>3) { ?><div class="tzt-col-bd<?php if ($article->ImageCount=='2' || $article->ImageCount=='4') { ?> tzt-col-lg-2 tzt-col-xs-2<?php }else{  ?> tzt-col-lg-3 tzt-col-xs-3<?php } ?>"><img src="<?php  echo TztCardVip_Thumb($article,3);  ?>" data-viewer="<?php  echo $article->AllImages[3];  ?>" alt="<?php  echo $article->Title;  ?>"></div><?php } ?>
                    <?php if ($article->ImageCount>4) { ?><div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="<?php  echo TztCardVip_Thumb($article,4);  ?>" data-viewer="<?php  echo $article->AllImages[4];  ?>" alt="<?php  echo $article->Title;  ?>"></div><?php } ?>
                    <?php if ($article->ImageCount>5) { ?><div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="<?php  echo TztCardVip_Thumb($article,5);  ?>" data-viewer="<?php  echo $article->AllImages[5];  ?>" alt="<?php  echo $article->Title;  ?>"></div><?php } ?>           
                </div>
                <?php if ($article->ImageCount>6) { ?><div class="spacing-b text-center"><a class="btn btn-width btn-mini btn-main" href="<?php  echo $article->Url;  ?>">+<?php  echo $article->ImageCount;  ?> 更多图片 <i class="icon icon-right"></i></a></div><?php } ?>
                <?php } ?>
                
                <div class="tzt-media-box_foot">
                    <?php if ($article->TopType) { ?><span class="topping">置顶</span><?php } ?>
                    <a href="<?php  echo $article->Category->Url;  ?>" class="text-link"><i class="icon icon-category"></i> <?php  echo $article->Category->Name;  ?></a>
                    <a href="<?php  echo $article->Url;  ?><?php if ($article->CommNums) { ?>#comment<?php } ?>" class="text-link"><i class="icon icon-feedback"></i><?php if ($article->CommNums) { ?> <?php  echo $article->CommNums;  ?><?php } ?></a>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub3) { ?><span><i class="icon icon-eye"></i> <?php  echo $article->ViewNums;  ?></span><?php } ?>
                    <span><?php  echo TztCardVip_TimeAgo($article->Time(),$zbp->Config('TztCardVip')->ArtListTime);  ?></span>
                    <?php if ($user->Level=='1' && !zbp_is_mobile()) { ?>
                        <a href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" target="_blank"><i class="icon icon-edit"></i></a>
                        <a href="javascript:;" onclick="if(confirm('确定要删除吗？当前操作不可恢复！')){location.href='<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleDel&id=<?php  echo $article->ID;  ?>&csrfToken=<?php  echo $zbp->GetToken();  ?>'}"><i class="icon icon-deltel"></i></a>
                    <?php } ?> 
                </div>
            </div>
        </div>       
    </div>
    <?php }else{  ?>
    <div class="tzt-media tzt-list-box-data">
        <div class="tzt-media-box">
            <?php if ($article->AllImages && $zbp->Config('TztCardVip')->ArtListStyle=='1' && $article->Category->Metas->liststyle!='1') { ?>
            <a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" class="tzt-media-box_bd<?php if (!$zbp->Config('TztCardVip')->ArtListThumb) { ?> max-width<?php } ?> left">
                <img src="<?php if ($article->Metas->coverimg) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo TztCardVip_Thumb($article,0);  ?><?php } ?>" alt="<?php  echo $article->Title;  ?>">
            </a>
            <?php } ?>
            <div class="tzt-media-box_hd">
                <h3 class="tzt-media-box_title"><a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>"><?php  echo $article->Title;  ?></a></h3>
                <?php if ($article->Tags && $zbp->Config('TztCardVip')->ArtListTag) { ?>
                <div class="tzt-text_tag media">
                    <?php  foreach ( $article->Tags as $tag) { ?><a href='<?php  echo $tag->Url;  ?>' title='<?php  echo $tag->Name;  ?>'>#<?php  echo $tag->Name;  ?></a><?php }   ?>
                </div>
                <?php } ?>
                <?php if ($zbp->Config('TztCardVip')->ArtListDesc) { ?>
                    <?php if ($article->Intro) { ?>
                    <div class="tzt-media-box_desc<?php if ($article->Category->Metas->liststyle!='1') { ?> m-hidden<?php } ?>">
                        <?php $Intro = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).'...'); ?> <?php  echo $Intro;  ?>
                    </div>
                    <?php }else{  ?>
                    <div class="tzt-media-box_desc<?php if ($article->Category->Metas->liststyle!='2') { ?> m-hidden<?php } ?>">
                        <?php $Content = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),$zbp->Config('TztCardVip')->ArtListDescNum)).'...'); ?> <?php  echo $Content;  ?>
                    </div>
                    <?php } ?>
                <?php } ?>
                <?php if ($article->AllImages && $article->Category->Metas->liststyle=='1') { ?>
                <div class="tzt-col tzt-media-box_imglist viewer">
                    <div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="<?php  echo TztCardVip_Thumb($article,0);  ?>" alt="<?php  echo $article->Title;  ?>" data-viewer="<?php  echo $article->AllImages[0];  ?>"></div>
                    <?php if ($article->ImageCount>1) { ?><div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="<?php  echo TztCardVip_Thumb($article,1);  ?>" alt="<?php  echo $article->Title;  ?>" data-viewer="<?php  echo $article->AllImages[1];  ?>"></div><?php } ?>
                    <?php if ($article->ImageCount>2) { ?><div class="tzt-col-bd tzt-col-lg-3 tzt-col-xs-3"><img src="<?php  echo TztCardVip_Thumb($article,2);  ?>" alt="<?php  echo $article->Title;  ?>" data-viewer="<?php  echo $article->AllImages[2];  ?>"></div><?php } ?>
                </div>
                <?php } ?>
                <div class="tzt-media-box_foot">
                    <?php if ($article->TopType) { ?><span class="topping">置顶</span><?php } ?>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub1) { ?><a href="<?php  echo $article->Category->Url;  ?>" class="text-link"><i class="icon icon-category"></i> <?php  echo $article->Category->Name;  ?></a><?php } ?>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub2) { ?><a href="<?php  echo $article->Author->Url;  ?>" class="text-link"><i class="icon icon-user"></i> <?php  echo $article->Author->StaticName;  ?></a><?php } ?>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub4 && !zbp_is_mobile()) { ?><a href="<?php  echo $article->Url;  ?><?php if ($article->CommNums) { ?>#comment<?php } ?>" class="text-link"><i class="icon icon-feedback"></i><?php if ($article->CommNums) { ?> <?php  echo $article->CommNums;  ?><?php } ?></a><?php } ?>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub3) { ?><span><i class="icon icon-eye"></i> <?php  echo $article->ViewNums;  ?></span><?php } ?>
                    <?php if ($zbp->Config('TztCardVip')->ArtListSub5) { ?><span><?php  echo TztCardVip_TimeAgo($article->Time(),$zbp->Config('TztCardVip')->ArtListTime);  ?></span><?php } ?>
                    <?php if ($user->Level=='1' && !zbp_is_mobile()) { ?>
                        <a href="<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleEdt&id=<?php  echo $article->ID;  ?>" target="_blank"><i class="icon icon-edit"></i></a>
                        <a href="javascript:;" onclick="if(confirm('确定要删除吗？当前操作不可恢复！')){location.href='<?php  echo $host;  ?>zb_system/cmd.php?act=ArticleDel&id=<?php  echo $article->ID;  ?>&csrfToken=<?php  echo $zbp->GetToken();  ?>'}"><i class="icon icon-deltel"></i></a>
                    <?php } ?> 
                </div>
            </div>
            <?php if ($article->AllImages && $zbp->Config('TztCardVip')->ArtListStyle=='0' && $article->Category->Metas->liststyle!='1') { ?>
            <a href="<?php  echo $article->Url;  ?>" title="<?php  echo $article->Title;  ?>" class="tzt-media-box_bd<?php if (!$zbp->Config('TztCardVip')->ArtListThumb) { ?> max-width<?php } ?>">
                <img src="<?php if ($article->Metas->coverimg) { ?><?php  echo $article->Metas->coverimg;  ?><?php }else{  ?><?php  echo TztCardVip_Thumb($article,0);  ?><?php } ?>" alt="<?php  echo $article->Title;  ?>">
            </a>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <?php }   ?>
</div>