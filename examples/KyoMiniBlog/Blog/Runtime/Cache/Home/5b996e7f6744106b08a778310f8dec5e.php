<?php if (!defined('THINK_PATH')) exit();?>﻿<section class="widget">
  <h3 class="widget-title">最新留言</h3>
  <ul class="widget-list">
    <?php if(is_array($Comment)): foreach($Comment as $key=>$Comment): ?><li><a href="<?php echo U('/content/'.$Comment['aid']);?>"><?php echo ($Comment["content"]); ?> [<?php echo ($Comment["couname"]); ?>]</a></li><?php endforeach; endif; ?>
  </ul>
</section>