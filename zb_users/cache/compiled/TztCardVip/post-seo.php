<?php  /* Template Name:SEO模块 */  ?>
<?php  
    $seotitle = $zbp->Config('TztCardVip')->SiteTitle; $seousbtit = $zbp->Config('TztCardVip')->SubTitle; $seoline = $zbp->Config('TztCardVip')->SeoLine;
    
 ?>
<?php if ($type=='article') { ?>
<?php 
    if($title=='未命名'){
        $title = TztCardVip_TransferHTML($article->Content);
    }else{
        // var_dump($title);die();
        // $title = $ttitle;
    }
 ?>
<title><?php if ($article->Metas->arttitle) { ?><?php  echo $article->Metas->arttitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?><?php if ($zbp->Config('TztCardVip')->SeoSetCat) { ?><?php  echo $seoline;  ?><?php  echo $article->Category->Name;  ?><?php } ?><?php  echo $seoline;  ?><?php  echo $seotitle;  ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<?php  $keywords = $description = TztCardVip_TransferHTML($article->Content,'135'); ?>
<meta name="keywords" content="<?php if ($article->Metas->artkeywords) { ?><?php  echo $article->Metas->artkeywords;  ?><?php }else{  ?><?php  echo $keywords;  ?><?php } ?>"/>
<meta name="description" content="<?php if ($article->Metas->artdescription) { ?><?php  echo $article->Metas->artdescription;  ?><?php }else{  ?><?php  echo $description;  ?><?php } ?>"/>
<?php }elseif($type=='page') {  ?>
<title><?php if ($article->Metas->arttitle) { ?><?php  echo $article->Metas->arttitle;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?><?php  echo $seoline;  ?><?php  echo $seotitle;  ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<meta name="keywords" content="<?php if ($article->Metas->artkeywords) { ?><?php  echo $article->Metas->artkeywords;  ?><?php }else{  ?><?php  echo $title;  ?><?php } ?>"/>
<?php  $description = TztCardVip_TransferHTML($article->Content,'135');  ?>
<meta name="description" content="<?php if ($article->Metas->artdescription) { ?><?php  echo $article->Metas->artdescription;  ?><?php }else{  ?><?php  echo $description;  ?><?php } ?>"/>
<?php }elseif($type=='index') {  ?>
<title><?php  echo $seotitle;  ?><?php if ($page>'1' && $zbp->Config('TztCardVip')->SeoSetPage) { ?><?php  echo $seoline;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<meta name="keywords" content="<?php  echo $zbp->Config('TztCardVip')->SiteKeyWords;  ?>">
<meta name="description" content="<?php  echo $zbp->Config('TztCardVip')->SiteDescriPtion;  ?>">
<?php }elseif($type=='category') {  ?>
<title><?php if ($category->Metas->catetitle) { ?><?php  echo $category->Metas->catetitle;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?><?php  echo $seoline;  ?><?php if ($page>'1' && $zbp->Config('TztCardVip')->SeoSetPage) { ?><?php  echo $seoline;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $seotitle;  ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<meta name="keywords" content="<?php if ($category->Metas->catekeywords) { ?><?php  echo $category->Metas->catekeywords;  ?><?php }else{  ?><?php  echo $category->Name;  ?><?php } ?>">
<meta name="description" content="<?php if ($category->Metas->catedescription) { ?><?php  echo $category->Metas->catedescription;  ?><?php }else{  ?><?php  echo $category->Intro;  ?><?php } ?>">
<?php }elseif($type=='tag') {  ?>
<title><?php if ($tag->Metas->tagtitle) { ?><?php  echo $tag->Metas->tagtitle;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?><?php  echo $seoline;  ?><?php if ($page>'1' && $zbp->Config('TztCardVip')->SeoSetPage) { ?><?php  echo $seoline;  ?>第<?php  echo $pagebar->PageNow;  ?>页<?php } ?><?php  echo $seotitle;  ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<meta name="keywords" content="<?php if ($tag->Metas->tagkeywords) { ?><?php  echo $tag->Metas->tagkeywords;  ?><?php }else{  ?><?php  echo $tag->Name;  ?><?php } ?>">
<meta name="description" content="<?php if ($tag->Metas->tagdescription) { ?><?php  echo $tag->Metas->tagdescription;  ?><?php }else{  ?><?php  echo $tag->Intro;  ?><?php } ?>">
<?php }else{  ?>
<title><?php  echo $title;  ?><?php  echo $seoline;  ?><?php if ($page>'1' && $zbp->Config('TztCardVip')->SeoSetPage) { ?>第<?php  echo $pagebar->PageNow;  ?>页<?php  echo $seoline;  ?><?php } ?><?php  echo $seotitle;  ?><?php if ($zbp->Config('TztCardVip')->SeoSetSiteSub) { ?><?php  echo $seoline;  ?><?php  echo $seousbtit;  ?><?php } ?></title>
<meta name="keywords" content="<?php  echo $title;  ?>,<?php  echo $seotitle;  ?>">
<meta name="description" content="<?php  echo $title;  ?>-<?php  echo $seotitle;  ?>">
<?php } ?>
