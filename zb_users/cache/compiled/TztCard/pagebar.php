<?php if ($pagebar && $pagebar->PageAll > 1) { ?>
    <?php  foreach ( $pagebar->buttons as $k => $v) { ?>
        <?php if ($pagebar->PageNow==$k) { ?>
		<li class="active"><a><?php  echo $k;  ?></a></li>
        <?php }elseif($pagebar->PageNow+1==$k) {  ?>
        <li><a href="<?php  echo $v;  ?>"><?php  echo $k;  ?></a></li>
        <?php }else{  ?>
        <li><a href="<?php  echo $v;  ?>"><?php  echo $k;  ?></a></li>
        <?php } ?>
    <?php }   ?>
<?php } ?>