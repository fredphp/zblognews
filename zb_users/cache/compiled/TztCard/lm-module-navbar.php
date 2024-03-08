<li>
	<a href="<?php  echo $item->href;  ?>" target="<?php  echo $item->target;  ?>" title="<?php  echo $item->title;  ?>"><?php  echo $item->ico;  ?><?php  echo $item->text;  ?></a>
    <?php if (count($item->subs)) { ?>
    <ul class="child">
        <?php  foreach ( $item->subs as $itemSub) { ?>
        <li><a href="<?php  echo $itemSub->href;  ?>" target="<?php  echo $itemSub->target;  ?>" title="<?php  echo $itemSub->title;  ?>"><?php  echo $itemSub->ico;  ?> - <?php  echo $itemSub->text;  ?></a></li>
        <?php }   ?>
    </ul>
    <?php } ?>
</li>