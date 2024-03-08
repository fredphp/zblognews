<div class="tzt-panel">
    <div class="tzt-panel_hd">
        <ul class="tzt-nav-tabs nav-tabs">
        {php}
        $ran_post_info = json_decode($zbp->Config('TztCardVip')->ArtInfoTit,true);
        $ran_list_info = json_decode($zbp->Config('TztCardVip')->ArtInfo,true);
        $ran_list_on = array_keys($ran_list_info);
        if(count((array)$ran_list_info)){
            foreach($ran_list_info as $key => $info){
                if($info){
                    if($key==$ran_list_on[0]){
                        echo '<li class="active"><a href="javascript:;" data-toggle="'.$key.'">'.$ran_post_info[$key].'</a></li>';
                    }else{
                        echo '<li><a href="javascript:;" data-toggle="'.$key.'">'.$ran_post_info[$key].'</a></li>';
                    }
                }
            }
        }
        {/php}
        </ul>
    </div>
    <div class="tzt-panel_bd">
        {template:sidebar}
    </div>
</div>